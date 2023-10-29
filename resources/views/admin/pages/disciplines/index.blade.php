@extends('layouts.admin')
@section('title', 'Disciplines')
@section('links')
    <link href="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin/assets/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link href="{{ asset('admin/dist/css/pages/bootstrap-switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Disciplines</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Disciplines</li>
                    </ol>
                    @can('create-discipline')
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                            data-bs-toggle="modal" data-bs-target="#addDisciplineModal"><i class="fa fa-plus-circle"></i> Create
                            Discipline</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Disciplines List</h4>
                        {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Discipline</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_id">
                                    @foreach ($disciplines as $discipline)
                                        <tr id='row_{{ $discipline->id }}' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"> {{ $discipline->name }} </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $discipline->description }} </td>
                                            <td id="td-id-1" class="td-class-1"> <span
                                                    class="badge {{ $discipline->status ? 'bg-success' : 'bg-danger' }}">{{ $discipline->status ? 'active' : 'in-active' }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('update-discipline')
                                                        <button class="btn btn-dark"
                                                            onclick="openEditModal({{ json_encode($discipline) }})"> <i
                                                                class=" fas fa-pencil-alt"></i>
                                                            Edit</button>
                                                    @endcan

                                                    <button type="button"
                                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @can('delete-discipline')
                                                            <a class="dropdown-item"
                                                                href="javascript:openDeleteDialog({{ $discipline->id }})"> <i
                                                                    class="fas fa-trash"></i> Delete</a>
                                                        @endcan
                                                        @can('view-discipline')
                                                            <a class="dropdown-item"
                                                                href="javascript:openViewDialog({{ json_encode($discipline) }})">
                                                                <i class="fas fa-eye"></i> View</a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="pagination justify-content-center">
                        {{ $disciplines->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="addDisciplineModal" class="modal" tabindex="-1" discipline="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Discipline</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form class="floating-labels" id="discipline-form" method="post" action="javascript:;"
                    onsubmit="submitDiscipline()" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-validation">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="name" name="name"
                                        placeholder="Enter a name.." :value="old('name')">
                                    <div id="name_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name">Description
                                    </label>
                                    <textarea name="description" class="form-control" id="description" cols="10" rows="4"
                                        :value="old('description')"></textarea>
                                    <div id="description_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                    <label for="Logo" class="form-label">Set image </label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="bt-switch">
                                        <div class="m-b-30">
                                            <label class="form-label" for="name">Status
                                            </label>
                                            <input type="checkbox" name="status" checked data-on-color="success"
                                                data-off-color="danger" data-on-text="Active" data-off-text="In-active">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="button-save"
                            class="btn btn-danger waves-effect waves-light text-white">Add
                            Discipline</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" discipline="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" discipline="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" value="-1" id="deleteID">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Discipline
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Discipline?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                        onclick="deleteDiscipline()">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit --}}
    <div class="modal fade" id="editModalDiscipline">
        <div class="modal-dialog modal-dialog-centered" discipline="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Discipline</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-hidden="true"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-valide" id="edit-discipline-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="-1" id="discipline_id">
                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-validation">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="edit_name" name="name"
                                        placeholder="Enter a name.." value="">
                                    <div id="edit_name_text" class="text-danger"></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name">Description
                                    </label>
                                    <textarea name="description" class="form-control" id="edit_description" cols="10" rows="4"
                                        :value="old('description')"></textarea>
                                    <div id="edit_description_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                    <label for="Logo" class="form-label">Set image</label>
                                    <input type="file" id="edit_image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <img src="" id="image_edit" width="150" height="150" alt=""
                                        srcset="">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="m-b-30">
                                        <label class="form-label" for="name">Status
                                        </label>
                                        <input type="checkbox" value="1" name="status" id="edit_status"
                                            data-on-color="success" data-off-color="danger" data-on-text="Active"
                                            data-off-text="In-active">

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-hidden="true">Close</button>
                    <button type="button" id="button-update" onclick="editDiscipline(this)"
                        class="btn btn-primary waves-effect waves-light text-white">Edit
                        Discipline</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- view --}}
    <div class="modal fade" id="viewModalDiscipline">
        <div class="modal-dialog modal-dialog-centered" discipline="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Discipline</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-hidden="true"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="view_table_id">
                        <tbody>
                            <div class="form-validation">
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="name form-control" id="view_name" name="name"
                                            placeholder="Enter a name.." readonly>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="name">Description<span
                                                class="text-danger">*</span>
                                        </label>
                                        <textarea name="description" class="form-control" id="view_description" cols="10" rows="4" readonly></textarea>
                                    </div>
                                    <div class="col-12">
                                        <img src="" id="image_view" alt="" width="150"
                                            height="150" srcset="">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="name">Status
                                        </label>
                                        <input type="text" class="name form-control" id="view_status"
                                            name="view_status" placeholder="Enter a name.." readonly>
                                        {{-- <input type="checkbox" id="view_status" name="view_status"> --}}
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        var radioswitch = function() {
            var bt = function() {
                $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioState")
                }), $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                }), $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                })
            };
            return {
                init: function() {
                    bt()
                }
            }
        }();
        $(document).ready(function() {
            radioswitch.init()
        });
    </script>
    <script>
        function showToaster(icon, heading, text) {
            $.toast({
                heading: heading,
                text: text,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: icon,
                hideAfter: 3500,
                stack: 6
            });
        }

        function submitDiscipline() {


            var form = $('#discipline-form')[0];
            console.log('form ', form);
            $("#button-save").text('Loading...');


            const myFormData = new FormData(form);
            console.log(' disciplines', myFormData);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/disciplines", // the endpoint
                type: "POST", // http method
                processData: false,
                contentType: false,
                data: myFormData,
                beforeSend: function() {
                    $(form)
                    $('.backend-error-text').text('')
                    $("#button-save").prop("disabled", true);

                },
                success: function(data) {


                    $("#button-save").prop("disabled", false);
                    $("#button-save").text("Add Discipline");
                    showToaster('success', 'Success', data.message);
                    document.getElementById("discipline-form").reset();
                    const RLOE = JSON.stringify(data.discipline)
                    var string =
                        `<tr id="row_${data.discipline.id}">
                           <td id="td-id-1" class="td-class-1">${data.discipline.name} </td>
                           <td id="td-id-1" class="td-class-1">${data.discipline.description} </td>
                           <td id="td-id-1" class="td-class-1"><span class="badge ${data.discipline.status?'bg-success':'bg-danger'}">${data.discipline.status?'active':'in-active'} </td>
                            <td>
                                <div class="btn-group">
                                    @can('edit-discipline')
                                    <button type="button" class="btn btn-dark"  id="btnGroupDrop${data.discipline.id}" onclick='openEditModal(${RLOE})'> <i
                                            class=" fas fa-pencil-alt"></i> Edit</button>
                                    @endcan
                                    <button type="button"
                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        @can('delete-discipline')
                                        <a class="dropdown-item"  href="javascript:openDeleteDialog(${data.discipline.id});"> <i
                                                class="fas fa-trash"></i> Delete</a>
                                        @endcan
                                        @can('view-discipline')
                                        <a class="dropdown-item" href="javascript:void(0)"  onclick="openViewModal(${data.discipline})"> <i
                                                class="fas fa-eye"></i> View</a>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                       </tr>`
                    $("#table_id").append(string);
                    $('#addDisciplineModal').modal('hide');
                    location.reload();





                },
                error: function(error) {
                    $(form)
                    $("#button-save").prop("disabled", false);
                    $("#button-save").text("Add Discipline");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error)
                    }
                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        function editDiscipline() {
            var form = $('#edit-discipline-form')[0];
            $("#button-update").text('Loading...');
            var discipline_id = form.discipline_id.value;
            console.log('discipline id ', discipline_id);
            const myFormData = new FormData(form);
            const formDataObj = {};
            myFormData.forEach((value, key) => (formDataObj[key] = value));
            console.log(formDataObj);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/disciplines/" + discipline_id, // the endpoint
                type: "POST", // http method
                processData: false,
                contentType: false,
                data: myFormData,
                beforeSend: function() {
                    $(form)
                    $('.backend-error-text').text('')
                    $("#button-update").prop("disabled", true);

                },
                success: function(data) {
                    console.log('data', data);
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit Discipline");

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);

                    showToaster('success', 'Success', data.message);

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);
                    const RLOE = JSON.stringify(data.discipline)
                    $("#row_" + data.discipline.id).remove();
                    var string =
                        `<tr id="row_${data.discipline.id}">
                           <td id="td-id-1" class="td-class-1">${data.discipline.name} </td>
                           <td id="td-id-1" class="td-class-1">${data.discipline.description} </td>
                           <td id="td-id-1" class="td-class-1"><span class="badge ${data.discipline.status?'bg-success':'bg-danger'}">${data.discipline.status?'active':'in-active'} </td>
                            <td>
                                <div class="btn-group">
                                    @can('edit-discipline')
                                    <button class="btn btn-dark"
                                        onclick='openEditModal(${RLOE})'> <i
                                                class=" fas fa-pencil-alt"></i>
                                            Edit</button>
                                    @endcan
                                    <button type="button"
                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                       @can('delete-discipline')
                                       <a class="dropdown-item"
                                        href="javascript:openDeleteDialog(${data.discipline.id});"> <i
                                                class="fas fa-trash"></i> Delete</a>
                                       @endcan
                                       @can('view-discipline')
                                        <a class="dropdown-item"
                                            href="javascript:openViewDialog(${data.discipline})"> <i
                                                class="fas fa-eye"></i> View</a>
                                    @endcan
                                    </div>

                                </div>
                            </td>
                       </tr>
                       `
                    $("#table_id").append(string);
                    $('#editModalDiscipline').modal('hide');
                    location.reload()

                },
                error: function(error) {
                    $(form)
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit Discipline");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error, 'edit')
                    }

                    showToaster('error', 'Error', errorMessage);

                },
            });
        }


        function openDeleteDialog(id) {
            $("#deleteID").val(id);
            $("#deleteModal").modal('show');
        }

        function deleteDiscipline() {
            $("#button-delete").text('Loading...');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "/admin/disciplines/" + $("#deleteID").val(), // the endpoint
                type: "DELETE", // http method
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#button-delete").prop("disabled", false);
                    $("#button-delete").text("Yes");
                    $('.alert-success').html(data.success).fadeIn('slow');
                    document.getElementById("row_" + $("#deleteID").val()).remove();
                    showToaster('success', 'Success', data.message);
                    // location.reload();
                    $('#deleteModal').modal('hide');
                },
                error: function(error) {
                    $("#button-delete").prop("disabled", false);
                    $("#button-delete").text("Yes");
                    alert(error);

                    showToaster('error', 'Error', error);

                },
            });
        }

        function openEditModal(discipline) {

            document.getElementById('discipline_id').value = discipline.id;
            document.getElementById('edit_name').value = discipline.name;
            document.getElementById('edit_description').value = discipline.description;
            document.getElementById('edit_status').checked = discipline.status == 1 ? true : false;
            document.getElementById('image_edit').src = discipline.image_url;
            var imageElement = document.getElementById("image_edit");

            imageElement.onerror = function() {
                imageElement.src = "{{ asset('admin/images/placeholder.jpg') }}";
            };
            console.log('discipline', discipline, document.getElementById('edit_status').checked);
            $("#editModalDiscipline").modal('show')
        }

        function openViewDialog(discipline) {
            document.getElementById('view_name').value = discipline.name;
            document.getElementById('view_description').value = discipline.description;
            document.getElementById('view_status').value = discipline.status == 1 ? 'Active' : 'Inactive';
            document.getElementById('image_view').src = discipline.image_url;
            var imageElement = document.getElementById("image_view");

            imageElement.onerror = function() {
                // Set a placeholder image if the original image is not found
                imageElement.src = "{{ asset('admin/images/placeholder.jpg') }}";
            };
            $("#viewModalDiscipline").modal('show')
        }

        function handleValidationErrors(error, type = 'create') {
            let errors = error.responseJSON.errors;
            var errorMessage = error.responseJSON.message
            var element = '';
            $.each(errors, function(key, item) {
                element = key.split('.')
                if (element.length > 1) {
                    element = `${element[0]}_${element[1]}`
                } else {
                    element = `${element}`
                }
                // dataAttr = $(element).closest('.tab').data('id')
                // $(`.step-${dataAttr}`).addClass('backend-error')
                if (type == 'edit') {
                    console.log('edit', element);
                    $(`#edit_${element}_text`).text(item[0])
                } else if (type == 'create') {
                    $(`#${element}_text`).text(item[0])
                }
            });

            return errorMessage;
        }
    </script>

@endsection
