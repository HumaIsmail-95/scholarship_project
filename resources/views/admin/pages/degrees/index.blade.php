@extends('layouts.admin')
@section('title', 'Degrees')
@section('links')
    <link href="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/dist/css/pages/bootstrap-switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Degrees</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Degrees</li>
                    </ol>
                    @can('create-degree')
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                            data-bs-toggle="modal" data-bs-target="#addDegreeModal"><i class="fa fa-plus-circle"></i> Create
                            Degree</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Degrees List</h4>
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
                                    @foreach ($degrees as $degree)
                                        <tr id='row_{{ $degree->id }}' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"> {{ $degree->name }} </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $degree->discipline->name }} </td>
                                            <td id="td-id-1" class="td-class-1"> <span
                                                    class="badge {{ $degree->status ? 'bg-success' : 'bg-danger' }}">{{ $degree->status ? 'active' : 'in-active' }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('update-degree')
                                                        <button class="btn btn-dark"
                                                            onclick="openEditModal({{ json_encode($degree) }})"> <i
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
                                                        @can('delete-degree')
                                                            <a class="dropdown-item"
                                                                href="javascript:openDeleteDialog({{ $degree->id }})"> <i
                                                                    class="fas fa-trash"></i> Delete</a>
                                                        @endcan
                                                        @can('view-degree')
                                                            <a class="dropdown-item"
                                                                href="javascript:openViewDialog({{ json_encode($degree) }})">
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
                        {{ $degrees->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="addDegreeModal" class="modal" tabindex="-1" degree="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Degree</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form class="floating-labels" id="degree-form" method="post" action="javascript:;"
                    onsubmit="submitDegree()">
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
                                    <label class="form-label" for="name">Discipline Name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <select name="discipline_id" id="discipline_id" class="form-select">
                                        <option value="">Select Discipline</option>
                                        @foreach ($disciplines as $discipline)
                                            <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="discipline_id_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name">Description<span
                                            class="text-danger">*</span>
                                    </label>
                                    <textarea name="description" class="form-control" id="description" cols="10" rows="4"
                                        :value="old('description')"></textarea>
                                    <div id="description_text" class="text-danger errors"></div>
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
                            Degree</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" degree="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" degree="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" value="-1" id="deleteID">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Degree
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Degree?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                        onclick="deleteDegree()">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit --}}
    <div class="modal fade" id="editModalDegree">
        <div class="modal-dialog modal-dialog-centered" degree="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Degree</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-hidden="true"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-valide" id="edit-degree-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="-1" id="degree_id">
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
                                    <label class="form-label" for="name">Discipline Name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <select name="discipline_id" id="edit_discipline_id" class="form-select">
                                        <option value="">Select Discipline</option>
                                        @foreach ($disciplines as $discipline)
                                            <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="edit_discipline_id_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name">Description<span
                                            class="text-danger">*</span>
                                    </label>
                                    <textarea name="description" class="form-control" id="edit_description" cols="10" rows="4"
                                        :value="old('description')"></textarea>
                                    <div id="edit_description_text" class="text-danger errors"></div>
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
                    <button type="button" id="button-update" onclick="editDegree(this)"
                        class="btn btn-primary waves-effect waves-light text-white">Edit
                        Degree</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- view --}}
    <div class="modal fade" id="viewModalDegree">
        <div class="modal-dialog modal-dialog-centered" degree="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Degree</h5>
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
                                        <label class="form-label" for="name">Discipline Name <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="name form-control" id="view_discipline"
                                            name="discipline" placeholder="Enter a name.." readonly>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="name">Description<span
                                                class="text-danger">*</span>
                                        </label>
                                        <textarea name="description" class="form-control" id="view_description" cols="10" rows="4" readonly></textarea>
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
    <script src="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
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

        function submitDegree() {


            var form = $('#degree-form')[0];
            console.log('form ', form);
            $("#button-save").text('Loading...');


            const myFormData = new FormData(form);
            console.log(' degrees', myFormData);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/degrees", // the endpoint
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
                    $("#button-save").text("Add Degree");
                    showToaster('success', 'Success', data.message);
                    document.getElementById("degree-form").reset();
                    const RLOE = JSON.stringify(data.degree)
                    var string =
                        `<tr id="row_${data.degree.id}">
                           <td id="td-id-1" class="td-class-1">${data.degree.name} </td>
                           <td id="td-id-1" class="td-class-1">${data.degree.discipline.name} </td>
                           <td id="td-id-1" class="td-class-1"><span class="badge ${data.degree.status?'bg-success':'bg-danger'}">${data.degree.status?'active':'in-active'} </td>
                            <td>
                                <div class="btn-group">
                                    @can('edit-degree')
                                    <button type="button" class="btn btn-dark"  id="btnGroupDrop${data.degree.id}" onclick='openEditModal(${RLOE})'> <i
                                            class=" fas fa-pencil-alt"></i> Edit</button>
                                    @endcan
                                    <button type="button"
                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        @can('delete-degree')
                                        <a class="dropdown-item"  href="javascript:openDeleteDialog(${data.degree.id});"> <i
                                                class="fas fa-trash"></i> Delete</a>
                                        @endcan
                                        @can('view-degree')
                                        <a class="dropdown-item" href="javascript:void(0)"  onclick="openViewModal(${data.degree})"> <i
                                                class="fas fa-eye"></i> View</a>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                       </tr>`
                    $("#table_id").append(string);
                    $('#addDegreeModal').modal('hide');
                    location.reload()
                },
                error: function(error) {
                    $(form)
                    $("#button-save").prop("disabled", false);
                    $("#button-save").text("Add Degree");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error)
                    }
                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        function editDegree() {
            var form = $('#edit-degree-form')[0];
            $("#button-update").text('Loading...');
            var degree_id = form.degree_id.value;
            console.log('degree id ', degree_id);
            const myFormData = new FormData(form);
            const formDataObj = {};
            myFormData.forEach((value, key) => (formDataObj[key] = value));
            console.log(formDataObj);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/degrees/" + degree_id, // the endpoint
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
                    $("#button-update").text("Edit Degree");

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);

                    showToaster('success', 'Success', data.message);

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);
                    const RLOE = JSON.stringify(data.degree)

                    $('#editModalDegree').modal('hide');
                    location.reload()

                },
                error: function(error) {
                    $(form)
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit Degree");
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

        function deleteDegree() {
            $("#button-delete").text('Loading...');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "/admin/degrees/" + $("#deleteID").val(), // the endpoint
                type: "DELETE", // http method
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#button-delete").prop("disabled", false);
                    $("#button-delete").text("Yes");
                    $('.alert-success').html(data.success).fadeIn('slow');
                    document.getElementById("row_" + $("#deleteID").val()).remove();
                    // swal({
                    //     title: "",
                    //     text: data.message,
                    //     icon: "success",
                    // });
                    showToaster('success', 'Success', data.message);

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

        function openEditModal(degree) {

            document.getElementById('degree_id').value = degree.id;
            document.getElementById('edit_name').value = degree.name;
            document.getElementById('edit_discipline_id').value = degree.discipline_id;
            document.getElementById('edit_description').value = degree.description;
            document.getElementById('edit_status').checked = degree.status == 1 ? true : false;
            console.log('degree', degree, document.getElementById('edit_status').checked);
            $("#editModalDegree").modal('show')
        }

        function openViewDialog(degree) {
            document.getElementById('view_name').value = degree.name;
            document.getElementById('view_discipline').value = degree.discipline.name;
            document.getElementById('view_description').value = degree.description;
            document.getElementById('view_status').value = degree.status == 1 ? 'Active' : 'Inactive';

            $("#viewModalDegree").modal('show')
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
