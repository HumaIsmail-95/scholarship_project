<div class="row ">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="">
            <h3 class="">Education</h3>
            @foreach ($professionalData['education'] as $index => $edu)
                <div class="border" id="row">
                    <div class="row  m-1 py-2">
                        <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                            <label class="form-label" for="name">Start Date <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="date" value="{{ $edu->start }}" name="start[]"
                                id="start_0">
                            @error('start')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="start_0_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                            <label class="form-label" for="name">End Date <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="date" value="{{ $edu->end }}" name="end[]"
                                id="end_0">
                            @error('end')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="end_0_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                            <label class="form-label" for="name">Program Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="program_name_0" name="program_name[]"
                                placeholder="Enter a program name.." value="{{ $edu->program_name }}">
                            @error('program_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="program_name_0_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                            <label class="form-label" for="name">Institution Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="institute_name_0" name="institute_name[]"
                                placeholder="Enter a Institution name.." value="{{ $edu->institute_name }}">
                            @error('institute_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="institute_name_0_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                            <label class="form-label" for="name">Grade <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="grade_0" name="grade[]"
                                placeholder="Enter a Institution name.." value="{{ $edu->grade }}">
                            @error('grade')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="grade_0_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-sm-12">
                            {{-- <h4 class="card-title">Attach Document</h4> --}}
                            @php
                                foreach ($edu->educationGalleries as $gal) {
                                    if ($gal->type == 'transcript') {
                                        $transcript = $gal;
                                    }
                                    if ($gal->type == 'certificate') {
                                        $certificate = $gal;
                                    }
                                }
                            @endphp
                            <label for="document" class="form-label">Transcript</label>
                            <input type="file" id="transcript_0" name="transcript[]" class="dropify"
                                value="{{ isset($transcript->image_url) ? $transcript->image_url : '' }}"
                                data-default-file="{{ isset($transcript->image_url) ? $transcript->image_url : '' }}" />
                            <a href="{{ isset($transcript->image_url) ? $transcript->image_url : '' }}"
                                download="newfilename">{{ isset($transcript->image_url) ? $transcript->image_name : '' }}</a>

                            @error('transcript[]')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="transcript_0_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-sm-12">
                            {{-- <h4 class="card-title">Attach Document</h4> --}}
                            <label for="document" class="form-label">Certificate</label>
                            <input type="file" id="certificate_0" name="certificate[]" class="dropify"
                                value="{{ isset($certificate->image_url) ? $certificate->image_url : '' }}"
                                data-default-file="{{ isset($certificate->image_url) ? $certificate->image_url : '' }}"
                                download />
                            <a href="{{ isset($certificate->image_url) ? $certificate->image_url : '' }}"
                                download="newfilename">{{ isset($certificate->image_url) ? $certificate->image_name : '' }}</a>

                            @error('certificate[]')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="certificate_0_text" class="text-danger"></div>
                        </div>
                    </div>
                    @if ($index > 0)
                        <button class="btn btn-danger" id="DeleteRow" type="button">
                            <i class="bi bi-trash"></i> Delete</button>
                    @endif
                </div>
            @endforeach

        </div>
        <div id="newinput"></div>

        <div class="col-12 my-2 justify-content-right">
            <button type="button" class="btn btn-info waves-effect waves-light text-white" button id="rowAdder">Add
                Row</button>

        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="row">
            <h3>Professional Experiences</h3>
            <div class=" m-1 py-2">
                <div class="row">
                    <div class="col-12  ">

                        <input type="checkbox" name="experience_check" id="experience_check"
                            onclick="experienceForm()">
                        <label class="form-label" for="name">
                            I don’t have any professional experience
                        </label>
                    </div>
                </div>

                @foreach ($professionalData['experience'] as $index => $experience)
                    <div class="border" id="rowExp">
                        <div class="row ">
                            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                                <label class="form-label" for="name">Joining Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="date" value="{{ $experience->joining }}"
                                    name="joining[]" id="joining_0">
                                @error('joining')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div id="joining_0_text" class="text-danger"></div>
                            </div>
                            <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                                <label class="form-label" for="name">End Date <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="date" value="{{ $experience->ending }}"
                                    name="ending[]" id="ending_0">
                                @error('ending')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div id="ending_0_text" class="text-danger"></div>
                            </div>
                            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                <label class="form-label" for="name">Employer Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="employer_name_0"
                                    name="employer_name[]" placeholder="Enter a employer name.."
                                    value="{{ $experience->employer_name }}">
                                @error('employer_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div id="employer_name_0_text" class="text-danger"></div>
                            </div>
                            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                <label class="form-label" for="name">Location
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="location_0" name="location[]"
                                    placeholder="Enter a location name.." value="{{ $experience->location }}">
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div id="location_0_text" class="text-danger"></div>
                            </div>
                            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                <label class="form-label" for="name">Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="title_0" name="title[]"
                                    placeholder="Enter a Institution name.." value="{{ $experience->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div id="title_0_text" class="text-danger"></div>
                            </div>
                            <div class="col-lg-12 col-md-12  col-sm-12">
                                {{-- <h4 class="card-title">Attach Document</h4> --}}
                                <label for="document" class="form-label">Duties</label>
                                <textarea class="form-control" name="duties[]" id="duties_0" cols="30" rows="10">{{ $experience->duties }}</textarea>
                                <div id="duties_0_text" class="text-danger"></div>
                            </div>
                        </div>
                        @if ($index > 0)
                            <button class="btn btn-danger" id="DeleteRowExp" type="button">
                                <i class="bi bi-trash"></i> Delete</button>
                        @endif
                    </div>
                @endforeach
            </div>
            <div id="newinputExp"></div>

            <div class="col-12 my-2">
                <button type="button" class="btn btn-info waves-effect waves-light text-white" button
                    id="rowAdder_exp">Add Row</button>

            </div>

        </div>
    </div>
</div>
