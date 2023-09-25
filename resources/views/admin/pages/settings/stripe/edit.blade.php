@extends('layouts.admin')
@section('title', 'Edit Strip Keys')
@section('links')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Strip Keys</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Strip Keys</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Strip Keys </h4>
                        <form action="{{ route('admin.stripe.setting.update') }}" method="POST" id="course_form"
                            enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Strip Keys Name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="stripe_public_key"
                                        name="stripe_public_key" placeholder="Enter a public key.."
                                        value="{{ $stripePublicKey }}" required>
                                    @error('stripe_public_key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Strip Keys Name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="stripe_secret_key"
                                        name="stripe_secret_key" placeholder="Enter a secret key.."
                                        value="{{ $stripeSecretKey }}" required>
                                    @error('stripe_secret_key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                    Strip Keys</button>
                            </div>
                        </form>

                    </div>
                    {{-- <div class="pagination justify-content-center">
                        {{ $studyModels->links() }}
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
    <script>
        let addRow = 0

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
