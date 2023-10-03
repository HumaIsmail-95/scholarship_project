<div class="row my-2">
    <div class="col-lg-6 col-md-6 col-sm-12  ">
        <div class="row border m-1">
            <input type="hidden" value="{{ Auth::user()->id }}" id="user_id">
            <input type="hidden" value="edit" name="method">
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Title <span class="text-danger">*</span>
                </label>
                {{-- <input type="text" class="form-control" id="name" name="name"
                    placeholder="Enter a name.." :value="{{ $student->name }}"> --}}
                <select name="title" class="form-select" id="title">
                    <option value="1" @if ($student->title == 1) selected @endif>Mr</option>
                    <option value="2" @if ($student->title == 2) selected @endif>Mrs</option>
                    <option value="3" @if ($student->title == 3) selected @endif>Ms</option>
                </select>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="title_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Name <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name.."
                    value="{{ $student->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="name_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">Sur Name <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="sur_name" name="sur_name"
                    placeholder="Enter a sur name.." value="{{ $student->sur_name }}">
                @error('sur_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="sur_name_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">Email <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter a email.."
                    value="{{ $student->email }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="email_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Mobile Number <span class="text-danger">*</span>
                </label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter a mobile.."
                    value="{{ $student->mobile }}" />
                @error('mobile')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="mobile_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Alternative Mobile <span class="text-danger">*</span>
                </label>
                <input type="tel" class="form-control" id="alternative_modile" name="alternative_modile"
                    placeholder="Enter a alternative mobile.." value="{{ $student->alternative_modile }}">
                @error('alternative_modile')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="alternative_modile_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Gender <span class="text-danger">*</span>
                </label>
                <select name="gender" class="form-select" id="gender">
                    <option value="1" @if ($student->gender == 1) selected @endif>Male</option>
                    <option value="2" @if ($student->gender == 2) selected @endif>Female</option>
                    <option value="3" @if ($student->gender == 3) selected @endif>Other</option>
                </select>
                @error('gender')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="gender_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Date of birth <span class="text-danger">*</span>
                </label>
                <input class="form-control" type="date" value="{{ $student->d_o_b }}" name="d_o_b"
                    id="example-date-input">
                @error('d_o_b')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="d_o_b_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Personal Identification
                    <span class="text-danger">*</span>
                </label>
                <select name="id_type" class="form-select" id="id_type">
                    <option value="1" @if ($student->id_type == 1) selected @endif>Passport</option>
                    <option value="2" @if ($student->id_type == 2) selected @endif>National Id</option>
                </select>
                @error('id_type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="id_type_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">National Id Number /
                    PAssport
                    Number <span class="text-danger">*</span>
                </label>
                <input class="form-control" type="text" value="{{ $student->id_number }}" name="id_number">
                @error('id_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="id_number_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12 col-md-12  col-sm-12 mb-2">
                <h4 class="card-title">Attach Document</h4>
                <label for="Logo" class="form-label">National Id Number /
                    PAssport
                    Number (scan copy)</label>
                <input type="file" id="id_document" name="id_document" class="dropify" value="" />
                @foreach ($student->studentGalleries as $gallery)
                    @if ($gallery->type == 'id_card')
                        <p class="mb-0 mt-2">Selected File</p>
                        <p>{{ $gallery->image_name }}</p>
                    @endif
                @endforeach
                @error('id_document')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="id_document_text" class="text-danger"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="row border m-1">
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Nationality (As per
                    passport) <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="nationality" name="nationality"
                    placeholder="Enter a nationality.." value="{{ $student->nationality }}">
                @error('nationality')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="nationality_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Schengen visa holder?
                    <span class="text-danger">*</span>
                </label>
                <select name="visa_holder" class="form-select" id="visa_holder">
                    <option value="0" @if ($student->visa_holder == 0) selected @endif>No</option>
                    <option value="1" @if ($student->visa_holder == 1) selected @endif>Yes</option>
                </select>
                @error('visa_holder')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="visa_holder_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">Address of Living <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Enter Address of Living.." value="{{ $student->address }}">
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="address_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">City / Town <span class="text-danger"></span>
                </label>
                <input type="text" class="form-control" id="city" name="city"
                    placeholder="Enter a city.." value="{{ $student->city }}">
                @error('city')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="city_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Postal Code <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="post_code" name="post_code"
                    placeholder="Enter a post code.." value="{{ $student->post_code }}">
                @error('post_code')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="post_code_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Province / State <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="state" name="state"
                    placeholder="Enter a state.." value="{{ $student->state }}">
                @error('state')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="state_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">Country <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="country" name="country"
                    placeholder="Enter a country.." value="{{ $student->country }}">
                @error('country')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="country_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">Travel History *
                    <span class="text-danger">*</span>
                </label>
                <select name="travel_history" class="form-select" id="travel_history"
                    onchange="disableTravelFields()">
                    <option value="1" @if ($student->travel_history == 1) selected @endif>Yes, I traveled</option>
                    <option value="0" @if ($student->travel_history == 0) selected @endif>Not traveled yet
                    </option>
                </select>

                @error('travel_history')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="travel_history_text" class="text-danger"></div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                <label class="form-label" for="name">My Travel History <span class="text-danger">*</span>
                </label>
                <input class="form-control" type="text" value="{{ $student->traveled_to }}" name="traveled_to"
                    id="traveled_to">
                @error('traveled_to')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="traveled_to_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12 col-md-12  col-sm-12  mb-2">
                <h4 class="card-title">Attach Document</h4>
                <label for="Logo" class="form-label">Proof of Travel Document*
                </label>
                <input type="file" id="travel_document" name="travel_document" class="dropify" value="" />
                @foreach ($student->studentGalleries as $gallery)
                    @if ($gallery->type == 'travel_proof')
                        <p class="mb-0 mt-2">Selected File</p>
                        <p>{{ $gallery->image_name }}</p>
                    @endif
                @endforeach
                @error('travel_document')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="travel_document_text" class="text-danger"></div>
            </div>

        </div>
    </div>
</div>
