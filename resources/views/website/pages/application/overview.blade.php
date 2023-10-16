@extends('layouts.userPanel')
@section('links')
@endsection
@section('title', 'Overviews')
@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Over View</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Application List</h4>
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-mobile-responsive="true" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Course </th>
                                        <th>Institution </th>
                                        <th>Applied At </th>
                                        <th>Intake</th>
                                        {{-- <th>Intake</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="table_id">
                                    @foreach ($applications as $application)
                                        <tr id='' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"> {{ Auth::user()->name }} </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $application->course->name }} </td>
                                            <td id="td-id-1" class="td-class-1">
                                                {{ $application->course->university->name }} </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $application->created_at }} </td>
                                            <td id="td-id-1" class="td-class-1"> {{ $application->intake }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination justify-content-center">
                            {{ $applications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
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
    </script>

@endsection
