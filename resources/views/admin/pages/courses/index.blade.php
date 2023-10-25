@extends('layouts.admin')
@section('title', 'Courses List')
@section('links')
    <link href="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/pages/bootstrap-switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Courses</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ol>
                    @can('create-course')
                        <a href="{{ route('admin.courses.create') }}"
                            class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                            Courses</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Courses List</h4>
                    </div>
                    <div class="table-responsive">
                        <table data-bs-toggle="table" data-mobile-responsive="true" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="table_id">
                                @foreach ($courses as $course)
                                    <tr id='row_{{ $course->id }}' class="tr-class-1">
                                        <td id="td-id-1" class="td-class-1"> {{ $course->name }} </td>
                                        <td>
                                            <div class="btn-group">
                                                @can('edit-course')
                                                    <a class="btn btn-dark"
                                                        href="{{ route('admin.courses.edit', $course->id) }}">
                                                        <i class=" fas fa-pencil-alt"></i>
                                                        Edit</a>
                                                @endcan
                                                <button type="button"
                                                    class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @can('delete-course')
                                                        <a class="dropdown-item"
                                                            href="javascript:openDeleteDialog({{ $course->id }})"> <i
                                                                class="fas fa-trash"></i> Delete</a>
                                                    @endcan
                                                    {{-- @can('view-course')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.courses.show', $course->id) }}"> <i
                                                                class="fas fa-eye"></i> View</a>
                                                    @endcan --}}
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" user="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" value="-1" id="deleteID">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Course
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Course?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                        onclick="deleteCourse()">Yes</button>
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

        function openDeleteDialog(id) {
            $("#deleteID").val(id);
            $("#deleteModal").modal('show');
        }

        function deleteCourse() {
            $("#button-delete").text('Loading...');
            console.log($("#deleteID").val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "/admin/courses/" + $("#deleteID").val(), // the endpoint
                type: "DELETE", // http method
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#button-delete").prop("disabled", false);
                    $("#button-delete").text("Yes");
                    $('.alert-success').html(data.success).fadeIn('slow');
                    document.getElementById("row_" + $("#deleteID").val()).remove();

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
    </script>

@endsection
