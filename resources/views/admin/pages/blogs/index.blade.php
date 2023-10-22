@extends('layouts.admin')
@section('title', 'Blogs List')
@section('links')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Blogs</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ol>
                    @can('create-blog')
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                class="fa fa-plus-circle"></i> Create
                            Blogs</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blogs List</h4>
                    </div>
                    <div class="table-responsive">
                        <table data-bs-toggle="table" data-mobile-responsive="true" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>heading</th>
                                    <th>Sub heading</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="table_id">
                                @foreach ($blogs as $blog)
                                    <tr id='row_{{ $blog->id }}' class="tr-class-1">
                                        <td id="td-id-1" class="td-class-1"> {{ $blog->heading }} </td>
                                        <td id="td-id-1" class="td-class-1"> {{ $blog->sub_heading }} </td>
                                        <td>
                                            <div class="btn-group">
                                                @can('edit-blog')
                                                    <a class="btn btn-dark" href="{{ route('admin.blogs.show', $blog->id) }}">
                                                        <i class=" fas fa-pencil-alt"></i>
                                                        Edit</a>
                                                @endcan
                                                <button type="button"
                                                    class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @can('delete-blog')
                                                        <a class="dropdown-item"
                                                            href="javascript:openDeleteDialog({{ $blog->id }})"> <i
                                                                class="fas fa-trash"></i> Delete</a>
                                                    @endcan
                                                    {{-- @can('view-blog')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.blogs.show', $blog->id) }}"> <i
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
                        {{ $blogs->links() }}
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Blog
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Blog?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                        onclick="deleteBlog()">Yes</button>
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

        function openDeleteDialog(id) {
            $("#deleteID").val(id);
            $("#deleteModal").modal('show');
        }

        function deleteBlog() {
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
