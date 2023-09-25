@extends('layouts.admin')
@section('title', 'Users')
@section('links')
    {{-- <link href="{{ asset('admin/dist/css/pages/floating-label.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Users</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                    @can('create-user')
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                            data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fa fa-plus-circle"></i> Create
                            User</button>
                    @endcan

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users List</h4>
                        {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_id">
                                    @foreach ($users as $user)
                                        <tr id='row_{{ $user->id }}' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"> {{ $user->name }} </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('edit-user')
                                                        <a class="btn btn-dark"
                                                            href="{{ route('admin.users.edit', $user->id) }}"> <i
                                                                class=" fas fa-pencil-alt"></i>
                                                            Edit</a>
                                                    @endcan
                                                    <button type="button"
                                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @can('delete-user')
                                                            <a class="dropdown-item"
                                                                href="javascript:openDeleteDialog({{ $user->id }})"> <i
                                                                    class="fas fa-trash"></i> Delete</a>
                                                        @endcan
                                                        @can('user-role-permission')
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.users.roles.permissions', $user->id) }}">
                                                                <i class=" fas fa-key"></i> Attach role & permissions</a>
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="addUserModal" class="modal" tabindex="-1" user="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form class="floating-labels" id="user-form" method="post" action="javascript:;" onsubmit="submitUser()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-validation">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="name" name="name"
                                        placeholder="Enter a name.." :value="old('name')">
                                    <div id="name_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="email" name="email"
                                        placeholder="Enter a email.." :value="old('email')">
                                    <div id="email_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Password <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="password" name="password"
                                        placeholder="Enter a password.." :value="old('password')">
                                    <div id="password_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Confirm Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Enter a confirm_password.."
                                        :value="old('password_confirmation')">
                                    <div id="password_confirmation_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Type <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="">Select Type</option>
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                    </select>
                                    <div id="type_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    @foreach ($roles as $role)
                                        <div class="d-flex flex-col">
                                            <label class="inline-flex items-center mt-3">
                                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                                    name="roles[]" value="{{ $role->id }}"><span
                                                    class="ml-2 text-gray-700">{{ $role->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="button-save"
                            class="btn btn-danger waves-effect waves-light text-white">Add
                            User</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" user="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" value="-1" id="deleteID">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this User?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                        onclick="deleteUser()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    {{-- view --}}
    <div class="modal fade" id="viewModalUser">
        <div class="modal-dialog modal-dialog-centered" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form class="form-valide" id="view-user-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center p-2">
                                <img id="view_image_preview" src="{{ url('images/profile/default_image.png') }}"
                                    alt="" width="120" class="rounded-circle border border-dark" />
                            </div>
                        </div>
                        <div class="form-validation">
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <label class=" col-form-label" id="view_name" for="">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <label class="col-lg-4 col-form-label" id="view_guard_name" for="">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('admin/dist/js/pages/jasny-bootstrap.js') }}"></script> --}}
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

        function submitUser() {
            var form = $('#user-form')[0];
            console.log('form ', form);
            $("#button-save").text('Loading...');


            const myFormData = new FormData(form);
            console.log(' users', myFormData);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/users", // the endpoint
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
                    $("#button-save").text("Add User");
                    showToaster('success', 'Success', data.message);
                    document.getElementById("user-form").reset();
                    const RLOE = JSON.stringify(data.user)
                    var string =
                        `<tr id="row_${data.user.id}">
                           <td id="td-id-1" class="td-class-1">${data.user.name} </td>
                            <td>
                                <div class="btn-group">
                                    @can('edit-user')
                                    <button type="button" class="btn btn-dark"  id="btnGroupDrop${data.user.id}" onclick='openEditModal(${RLOE})'> <i
                                            class=" fas fa-pencil-alt"></i> Edit</button>
                                    @endcan

                                    <button type="button"
                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        @can('delete-user')
                                        <a class="dropdown-item"  href="javascript:openDeleteDialog(${data.user.id});"> <i
                                                class="fas fa-trash"></i> Delete</a>
                                        @endcan
                                        @can('view-user')
                                        <a class="dropdown-item" href="javascript:void(0)"  onclick="openViewModal(${data.user})"> <i
                                                class="fas fa-eye"></i> View</a>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                       </tr>`
                    $("#table_id").append(string);
                    $('#addUserModal').modal('hide');






                },
                error: function(error) {
                    $(form)
                    $("#button-save").prop("disabled", false);
                    $("#button-save").text("Add User");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error)
                    }
                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        // function editUser() {
        //     var form = $('#edit-user-form')[0];
        //     $("#button-update").text('Loading...');
        //     user_id = form.user_id.value;
        //     console.log('user id ', user_id);
        //     const myFormData = new FormData(form);
        //     const formDataObj = {};
        //     myFormData.forEach((value, key) => (formDataObj[key] = value));
        //     console.log(formDataObj);
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        //         },
        //         url: "/admin/users/" + user_id, // the endpoint
        //         type: "POST", // http method
        //         processData: false,
        //         contentType: false,
        //         data: myFormData,
        //         beforeSend: function() {
        //             $(form)
        //             $('.backend-error-text').text('')
        //             $("#button-update").prop("disabled", true);

        //         },
        //         success: function(data) {
        //             $("#button-update").prop("disabled", false);
        //             $("#button-update").text("Edit User");

        //             $(form)
        //                 .find('[type="button"]')
        //                 .prop("disabled", false);

        //             showToaster('success', 'Success', data.message);

        //             $(form)
        //                 .find('[type="button"]')
        //                 .prop("disabled", false);
        //             const RLOE = JSON.stringify(data.user)
        //             $("#row_" + data.user.id).remove();
        //             var string =
        //                 `<tr id="row_${data.user.id}">
    //                    <td id="td-id-1" class="td-class-1">${data.user.name} </td>
    //                                 <td>
    //                                     <div class="btn-group">
    //                                        @can('edit-user')
    //                                         <button class="btn btn-dark"
    //                                             onclick='openEditModal(${RLOE})'> <i
    //                                                     class=" fas fa-pencil-alt"></i>
    //                                                 Edit</button>
    //                                        @endcan
    //                                         <button type="button"
    //                                             class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
    //                                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    //                                             <span class="sr-only">Toggle Dropdown</span>
    //                                         </button>
    //                                         <div class="dropdown-menu">
    //                                             @can('delete-user')
    //                                             <a class="dropdown-item"
    //                                             href="javascript:openDeleteDialog(${data.user.id});"> <i
    //                                                     class="fas fa-trash"></i> Delete</a>
    //                                             @endcan
    //                                         </div>
    //                                     </div>
    //                                 </td>
    //                </tr>
    //                `
        //             $("#table_id").append(string);
        //             $('#editModalUser').modal('hide');


        //         },
        //         error: function(error) {
        //             $(form)
        //             $("#button-update").prop("disabled", false);
        //             $("#button-update").text("Edit User");
        //             var errorMessage = error.statusText;
        //             if (error.status == 422) {
        //                 errorMessage = handleValidationErrors(error, 'edit')
        //             }

        //             showToaster('error', 'Error', errorMessage);

        //         },
        //     });
        // }


        function openDeleteDialog(id) {
            $("#deleteID").val(id);
            $("#deleteModal").modal('show');
        }

        function deleteUser() {
            $("#button-delete").text('Loading...');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "/admin/users/" + $("#deleteID").val(), // the endpoint
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

        // function openEditModal(user) {
        //     document.getElementById('edit_name').value = user.name;
        //     document.getElementById('edit_email').value = user.email;
        //     document.getElementById('edit_password').value = user.passowrd;
        //     document.getElementById('edit_type').value = user.type;
        //     document.getElementById('user_id').value = user.id;


        //     $("#editModalUser").modal('show')
        // }

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
