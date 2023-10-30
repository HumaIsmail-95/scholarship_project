@extends('layouts.admin')
@section('title', 'Cities')
@section('links')
    <link rel="stylesheet" href="{{ asset('admin/assets/node_modules/dropify/dist/css/dropify.min.css') }}">
@endsection
@section('content')
    <script>
        function replaceImage(image, id) {
            imageElement = document.getElementById('cityImage_' + id)
            if (image === "") {
                imageElement.src = "{{ asset('admin/images/placeholder.jpg') }}";

            } else {
                imageElement.src = image
            }
        }
    </script>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Cities</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">cities</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cities List</h4>
                        {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_id">
                                    @foreach ($cities as $city)
                                        <tr id='row_{{ $city->id }}' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"> {{ $city->cityName }} </td>
                                            <td id="td-id-1" class="td-class-1">
                                                <img src="" src="{{ $city->image_url }}"
                                                    onerror="replaceImage('{{ $city->image_url }}','{{ $city->id }}')"
                                                    id="cityImage_{{ $city->id }}" width="150" height="150"
                                                    alt="" srcset="">

                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('update-city')
                                                        <button class="btn btn-dark"
                                                            onclick="openEditModal({{ json_encode($city) }})"> <i
                                                                class=" fas fa-pencil-alt"></i>
                                                            Edit</button>
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
                        {{ $cities->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- edit --}}
    <div class="modal fade" id="editModalcity">
        <div class="modal-dialog modal-dialog-centered" city="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit city</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    <form class="form-valide" id="edit-city-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="-1" id="city_id">
                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-validation">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <p id="edit_name"></p>
                                </div>
                                <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                    <label for="Logo" class="form-label">Set image</label>
                                    <input type="file" id="edit_image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <img src="" id="image_edit" alt="" width="150" height="150"
                                        srcset="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-hidden="true">Close</button>
                    <button type="button" id="button-update" onclick="editcity(this)"
                        class="btn btn-primary waves-effect waves-light text-white">Edit
                        city</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')

    <script src="{{ asset('admin/assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
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



        function editcity() {
            var form = $('#edit-city-form')[0];
            $("#button-update").text('Loading...');
            var city_id = form.city_id.value;
            console.log('city id ', city_id);
            const myFormData = new FormData(form);
            const formDataObj = {};
            myFormData.forEach((value, key) => (formDataObj[key] = value));
            console.log(formDataObj);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/cities/" + city_id, // the endpoint
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
                    $("#button-update").text("Edit city");

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);

                    showToaster('success', 'Success', data.message);

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);
                    const RLOE = JSON.stringify(data.city)

                    $('#editModalcity').modal('hide');
                    location.reload()

                },
                error: function(error) {
                    $(form)
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit city");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error, 'edit')
                    }

                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        function openEditModal(city) {

            document.getElementById('city_id').value = city.id;
            document.getElementById('edit_name').innerHTML = city.cityName;
            document.getElementById('image_edit').src = city.image_url;
            var imageElement = document.getElementById("image_edit");

            imageElement.onerror = function() {
                imageElement.src = "{{ asset('admin/images/placeholder.jpg') }}";
            };
            $("#editModalcity").modal('show')
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
