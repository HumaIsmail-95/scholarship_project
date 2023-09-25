@extends('layouts.admin')
@section('title', 'View Package')
@section('links')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Package</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Package</li>
                    </ol>
                    @can('list-subscription')
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                class="fa fa-list"></i>
                            Package List</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Package </h4>
                        <div class="row">
                            <div class="col-lg-6  col-md-6 col-sm-12">
                                <label class="form-label" for="name">Package Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter a name.." value="{{ $subscription_package->name }}" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6  col-md-6 col-sm-12">
                                <label class="form-label" for="duration">Package Duration <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex">
                                    <input type="number" class="form-control" id="duration" name="duration"
                                        placeholder="Enter a duration.." value="{{ $subscription_package->duration }}"
                                        required>
                                    <select name="type" class="form-select" id="type" required>
                                        <option value="{{ $subscription_package->type }}">
                                            {{ $subscription_package->type }}
                                        </option>
                                    </select>
                                </div>
                                @error('duration')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6  col-md-6 col-sm-12">
                                <label class="form-label" for="duration">Amount Fee ($)<span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="Enter a price" value="{{ $subscription_package->price }}" required
                                    step=".01">
                                @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                <label class="form-label" for="name">Description<span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" name="description" placeholder="description" id="description" cols="30"
                                    rows="5">{{ $subscription_package->description }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>

                        {{-- <div class="col-12 my-2">
                                <button type="submit" class="btn btn-info waves-effect waves-light text-white">View
                                    Package</button>
                            </div> --}}

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
