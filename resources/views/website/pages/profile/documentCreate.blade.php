<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="">
            <label for="document" class="form-label mt-2">CV/Resume </label>
            <input type="file" id="resume" name="resume" class="dropify" :value="{{ old('resume') }}" />
            @error('resume')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div id="resume_text" class="text-danger"></div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="">
            <label for="document" class="form-label mt-2">Experience Letter
            </label>
            <input type="file" id="exp_letter" name="exp_letter" class="dropify" :value="{{ old('exp_letter') }}" />
            @error('exp_letter')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div id="exp_letter_text" class="text-danger"></div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="">
            <label for="document" class="form-label mt-2">Recommendation Letter
            </label>
            <input type="file" id="recomendation" name="recomendation" class="dropify"
                :value="{{ old('recomendation') }}" />
            @error('recomendation')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div id="recomendation_text" class="text-danger"></div>
        </div>

    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="">
            <label for="document" class="form-label mt-2">Other Document </label>
            <input type="file" id="other" name="other" class="dropify" :value="{{ old('other') }}" />
            @error('other')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div id="other_text" class="text-danger"></div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-content-center flex-wrap ">
        <p class="mb-0 mt-2 ">
            In order to proceed, please now ensure you understand and accept all
            applicable terms and then check the boxes below:
        </p>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="declaration" name="declaration" checked>
            <label class="form-check-label" for="declaration">I declare that the
                information given in the application is true, complete and accurate
                and
                no data requested has been omitted.</label>
            <div id="declaration_text" class="text-danger"></div>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="accept" name="accept" checked>
            <label class="form-check-label" for="accept"> I accept the terms of
                this Fair Processing Notice and the UniApp Privacy Notice which
                supplements it.</label>
            <div id="accept_text" class="text-danger"></div>
        </div>
    </div>
</div>
