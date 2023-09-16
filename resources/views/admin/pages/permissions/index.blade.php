@extends('layouts.admin')
@section('title', 'Permissions')
@section('links')
    <link href="{{ asset('admin/dist/css/pages/floating-label.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Permissions</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Permissions</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                        data-bs-toggle="modal" data-bs-target="#addPermissionModal"><i class="fa fa-plus-circle"></i> Create
                        Permission</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bootstrap Simple Table</h4>
                        <h6 class="card-subtitle mb-3">Simple table example</h6>
                        <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                            class="table table-striped">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>Name</th>
                                    <th>Stars</th>
                                    <th>Forks</th>
                                    <th>Description</th>
                                </tr> <!-- end row -->
                            </thead>
                            <tbody>
                                <!-- start row -->
                                <tr id="tr-id-1" class="tr-class-1">
                                    <td id="td-id-1" class="td-class-1"> bootstrap-table </td>
                                    <td>526</td>
                                    <td>122</td>
                                    <td>An extended Bootstrap table with radio, checkbox, sort, pagination, and
                                        other added features. (supports twitter bootstrap v2 and v3) </td>
                                </tr> <!-- end row -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- add role --}}
        <h4 class="card-title">Responsive model</h4>
        <!-- sample modal content -->
        <div id="addPermissionModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Permission</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="floating-labels m-t-40">
                                            <div class="form-group m-b-40">
                                                <input type="text" class="form-control input-lg" id="input8"><span
                                                    class="bar"></span>
                                                <label for="input8">Large Input</label>
                                            </div>
                                            <div class="form-group m-b-40">
                                                <input type="text" class="form-control input-sm" id="input9"><span
                                                    class="bar"></span>
                                                <label for="input9">Small Input</label>
                                            </div>
                                            <div class="form-group has-warning m-b-40">
                                                <input type="text" class="form-control" id="input10"><span
                                                    class="bar"></span>
                                                <label for="input10">Warning State</label>
                                            </div>
                                            <div class="form-group has-success m-b-40">
                                                <input type="text" class="form-control" id="input11"><span
                                                    class="bar"></span>
                                                <label for="input11">Success State</label>
                                            </div>
                                            <div class="form-group has-error has-danger m-b-40">
                                                <input type="text" class="form-control" id="input12"><span
                                                    class="bar"></span>
                                                <label for="input12">Error State</label>
                                            </div>
                                            <div class="form-group has-warning has-feedback m-b-40">
                                                <input type="text" class="form-control form-control-warning"
                                                    id="input13"><span class="bar"></span>
                                                <label for="input13">Warning State With Feedback</label>
                                            </div>
                                            <div class="form-group has-success has-feedback m-b-40">
                                                <input type="text" class="form-control form-control-success"
                                                    id="input14"><span class="bar"></span>
                                                <label for="input14">Success State With Feedback</label>
                                            </div>
                                            <div class="form-group has-danger has-error has-feedback m-b-5">
                                                <input type="text" class="form-control form-control-danger"
                                                    id="input15"><span class="bar"></span>
                                                <label for="input15">Error State With Feedback</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light text-white">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/dist/js/pages/jasny-bootstrap.js') }}"></script>
@endsection
