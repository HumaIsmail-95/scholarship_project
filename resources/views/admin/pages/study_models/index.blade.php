@extends('layouts.admin')
@section('title', 'Study Model')
@section('links')
    <link href="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/dist/css/pages/bootstrap-switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Study Model</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Study Model</li>
                    </ol>
                    @can('create-study-modal')
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                            data-bs-toggle="modal" data-bs-target="#addStudyModelModal"><i class="fa fa-plus-circle"></i> Create
                            StudyModel</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Study Model List</h4>
                        {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>StudyModel</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_id">
                                    @foreach ($studyModels as $studyModel)
                                        <tr id='row_{{ $studyModel->id }}' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"> {{ $studyModel->name }} </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $studyModel->description }} </td>
                                            <td id="td-id-1" class="td-class-1"> <span
                                                    class="badge {{ $studyModel->status ? 'bg-success' : 'bg-danger' }}">{{ $studyModel->status ? 'active' : 'in-active' }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('update-study-modal')
                                                        <button class="btn btn-dark"
                                                            onclick="openEditModal({{ json_encode($studyModel) }})"> <i
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
                                                        @can('delete-study-modal')
                                                            <a class="dropdown-item"
                                                                href="javascript:openDeleteDialog({{ $studyModel->id }})"> <i
                                                                    class="fas fa-trash"></i> Delete</a>
                                                        @endcan
                                                        {{-- @can('view-study-modal')
                                                            <a class="dropdown-item"
                                                                href="javascript:openViewDialog({{ json_encode($studyModel) }})">
                                                                <i class="fas fa-eye"></i> View</a>
                                                        @endcan --}}
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
                        {{ $studyModels->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="addStudyModelModal" class="modal" tabindex="-1" studyModel="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add StudyModel</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form class="floating-labels" id="studyModel-form" method="post" action="javascript:;"
                    onsubmit="submitStudyModel()">
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
                                    <label class="form-label" for="name">Description<span class="text-danger">*</span>
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
                            StudyModel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" studyModel="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" studyModel="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" value="-1" id="deleteID">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete StudyModel
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this StudyModel?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                        onclick="deleteStudyModel()">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit --}}
    <div class="modal fade" id="editModalStudyModel">
        <div class="modal-dialog modal-dialog-centered" studyModel="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit StudyModel</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-hidden="true"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-valide" id="edit-study-modal-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="-1" id="studyModel_id">
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
                    <button type="button" id="button-update" onclick="editStudyModel(this)"
                        class="btn btn-danger waves-effect waves-light text-white">Edit
                        StudyModel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- view --}}
    <div class="modal fade" id="viewModalStudyModel">
        <div class="modal-dialog modal-dialog-centered" studyModel="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View StudyModel</h5>
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

        function submitStudyModel() {


            var form = $('#studyModel-form')[0];
            console.log('form ', form);
            $("#button-save").text('Loading...');


            const myFormData = new FormData(form);
            console.log(' studyModels', myFormData);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/study-models", // the endpoint
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
                    $("#button-save").text("Add StudyModel");
                    showToaster('success', 'Success', data.message);
                    document.getElementById("studyModel-form").reset();
                    const RLOE = JSON.stringify(data.studyModel)
                    var string =
                        `<tr id="row_${data.studyModel.id}">
                           <td id="td-id-1" class="td-class-1">${data.studyModel.name} </td>
                           <td id="td-id-1" class="td-class-1">${data.studyModel.description} </td>
                           <td id="td-id-1" class="td-class-1"><span class="badge ${data.studyModel.status?'bg-success':'bg-danger'}">${data.studyModel.status?'active':'in-active'} </td>
                            <td>
                                <div class="btn-group">
                                    @can('edit-study-modal')
                                    <button type="button" class="btn btn-dark"  id="btnGroupDrop${data.studyModel.id}" onclick='openEditModal(${RLOE})'> <i
                                            class=" fas fa-pencil-alt"></i> Edit</button>
                                    @endcan
                                    <button type="button"
                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        @can('delete-study-modal')
                                        <a class="dropdown-item"  href="javascript:openDeleteDialog(${data.studyModel.id});"> <i
                                                class="fas fa-trash"></i> Delete</a>
                                        @endcan

                                    </div>
                                </div>
                            </td>
                       </tr>`
                    $("#table_id").append(string);
                    $('#addStudyModelModal').modal('hide');






                },
                error: function(error) {
                    $(form)
                    $("#button-save").prop("disabled", false);
                    $("#button-save").text("Add StudyModel");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error)
                    }
                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        function editStudyModel() {
            var form = $('#edit-study-modal-form')[0];
            $("#button-update").text('Loading...');
            var studyModel_id = form.studyModel_id.value;
            console.log('studyModel id ', studyModel_id);
            const myFormData = new FormData(form);
            const formDataObj = {};
            myFormData.forEach((value, key) => (formDataObj[key] = value));
            console.log(formDataObj);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/study-models/" + studyModel_id, // the endpoint
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
                    $("#button-update").text("Edit StudyModel");

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);

                    showToaster('success', 'Success', data.message);

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);
                    const RLOE = JSON.stringify(data.studyModel)
                    $("#row_" + data.studyModel.id).remove();
                    var string =
                        `<tr id="row_${data.studyModel.id}">
                           <td id="td-id-1" class="td-class-1">${data.studyModel.name} </td>
                           <td id="td-id-1" class="td-class-1">${data.studyModel.description} </td>
                           <td id="td-id-1" class="td-class-1"><span class="badge ${data.studyModel.status?'bg-success':'bg-danger'}">${data.studyModel.status?'active':'in-active'} </td>
                            <td>
                                <div class="btn-group">
                                    @can('edit-study-modal')
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
                                       @can('delete-study-modal')
                                       <a class="dropdown-item"
                                        href="javascript:openDeleteDialog(${data.studyModel.id});"> <i
                                                class="fas fa-trash"></i> Delete</a>
                                       @endcan

                                    </div>

                                </div>
                            </td>
                       </tr>
                       `
                    $("#table_id").append(string);
                    $('#editModalStudyModel').modal('hide');
                    // location.reload()

                },
                error: function(error) {
                    $(form)
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit StudyModel");
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

        function deleteStudyModel() {
            $("#button-delete").text('Loading...');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "/admin/study-models/" + $("#deleteID").val(), // the endpoint
                type: "DELETE", // http method
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#button-delete").prop("disabled", false);
                    $("#button-delete").text("Yes");
                    $('.alert-success').html(data.success).fadeIn('slow');
                    document.getElementById("row_" + $("#deleteID").val()).remove();
                    swal({
                        title: "",
                        text: data.message,
                        icon: "success",
                    });
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

        function openEditModal(studyModel) {

            document.getElementById('studyModel_id').value = studyModel.id;
            document.getElementById('edit_name').value = studyModel.name;
            document.getElementById('edit_description').value = studyModel.description;
            document.getElementById('edit_status').checked = studyModel.status == 1 ? true : false;
            console.log('studyModel', studyModel, document.getElementById('edit_status').checked);
            $("#editModalStudyModel").modal('show')
        }

        function openViewDialog(studyModel) {
            document.getElementById('view_name').value = studyModel.name;
            document.getElementById('view_description').value = studyModel.description;
            document.getElementById('view_status').value = studyModel.status == 1 ? 'Active' : 'Inactive';

            $("#viewModalStudyModel").modal('show')
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
