@extends('layouts.admin')
@section('title', 'Applications')
@section('links')
    <link rel="stylesheet" href="{{ asset('admin/assets/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link href="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/dist/css/pages/bootstrap-switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Applications</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Applications</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Applications List</h4>
                        {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Course Name</th>
                                        <th>Student Name</th>
                                        <th>Intake</th>
                                        <th>occupation</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_id">
                                    @foreach ($applications as $application)
                                        <tr id='row_{{ $application->id }}' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"><img src="{{ $application->image_url }}"
                                                    width="50" alt="" srcset=""> </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $application->course->name }} </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $application->student->name }}
                                            </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $application->intake }}
                                            </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $application->occupation }}
                                            </td>
                                            @php
                                                $color = 'bg-info';
                                                $status = 'Pending';
                                                if ($application->status == 0) {
                                                    $status = 'Pending';
                                                    $color = 'bg-info';
                                                } elseif ($application->status == 1) {
                                                    $color = 'bg-success';
                                                    $status = 'Approved';
                                                } elseif ($application->status == 2) {
                                                    $color = 'bg-danger';
                                                    $status = 'Blocked';
                                                } elseif ($application->status == 3) {
                                                    $color = 'bg-warning';
                                                    $status = 'Closed';
                                                }
                                            @endphp
                                            <td id="td-id-1" class="td-class-1"> <span
                                                    class="badge {{ $color }}">{{ $status }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('update-application')
                                                        <button class="btn btn-dark"
                                                            onclick="openEditModal({{ json_encode($application) }})"> <i
                                                                class=" fas fa-pencil-alt"></i>
                                                            Edit</button>
                                                    @endcan
                                                    @can('view-application')
                                                        <a class="btn btn-dark "
                                                            href="{{ route('admin.applications.view', $application->id) }}">
                                                            <i class=" fas fa-eye"></i>
                                                        </a>
                                                    @endcan

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="pagination justify-content-center">
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="editModalApplication">
        <div class="modal-dialog modal-dialog-centered" application="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    <form class="form-valide" id="edit-application-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="-1" id="application_id">
                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-validation">
                            <div class="form-group row">

                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name">Status <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" id="edit_status" class="form-select">
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Blocked</option>
                                        <option value="3">Closed</option>

                                    </select>
                                    <div id="edit_status_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name">Comment <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" name="comment" id="edit_comment" cols="30" rows="10"></textarea>
                                    <div id="edit_comment_text" class="text-danger errors"></div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-hidden="true">Close</button>
                    <button type="button" id="button-update" onclick="editApplication(this)"
                        class="btn btn-primary waves-effect waves-light text-white">Edit
                        Application</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('scripts')

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


        function editApplication() {
            var form = $('#edit-application-form')[0];
            $("#button-update").text('Loading...');
            var application_id = form.application_id.value;
            console.log('application id ', application_id);
            const myFormData = new FormData(form);
            const formDataObj = {};
            myFormData.forEach((value, key) => (formDataObj[key] = value));
            console.log(formDataObj);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/applications/" + application_id, // the endpoint
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
                    $("#button-update").text("Edit Application");

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);

                    showToaster('success', 'Success', data.message);

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);
                    const RLOE = JSON.stringify(data.application)

                    $('#editModalApplication').modal('hide');
                    location.reload()

                },
                error: function(error) {
                    $(form)
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit Application");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error, 'edit')
                    }

                    showToaster('error', 'Error', errorMessage);

                },
            });
        }



        function openEditModal(application) {

            document.getElementById('application_id').value = application.id;
            document.getElementById('edit_comment').value = application.comment;
            $("#editModalApplication").modal('show')
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
