<div class="row">

    <div class="col-12">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="native_english" id="native_english"
                @if ($testLanguage->native_english == 1) checked @endif>
            <label class="form-check-label" for="native_english">
                I am a Native English Speaker</label>
        </div>
    </div>

</div>
@php
    foreach ($testLanguage->testGalleries as $testGal) {
        if ($testGal->type == 'ielts') {
            $ielts = $testGal;
        } elseif ($testGal->type == 'toelf') {
            $toelf = $testGal;
        } elseif ($testGal->type == 'pearson') {
            $pearson = $testGal;
        } elseif ($testGal->type == 'moi') {
            $moi = $testGal;
        }
    }
    
@endphp
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="row border m-1">
            <h4 class="mb-0 mt-2">IELTS</h4>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">Score <span class="text-danger">*</span>
                </label>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
                <input type="text" class="form-control" id="ielts_score" name="ielts_score"
                    placeholder="Enter a ielts score.." value="{{ $testLanguage->ielts_score }}">

                @error('ielts_score')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="ielts_score_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                {{-- <h4 class="card-title">Attach Document</h4> --}}
                <label for="document" class="form-label">Documents </label>
                <input type="file" id="ielts" name="ielts" class="dropify"
                    value="{{ isset($ielts->image_url) ? $ielts->image_url : '' }}"
                    data-default-file="{{ isset($ielts->image_url) ? $ielts->image_url : '' }}" />
                <a href="{{ isset($ielts->image_url) ? $ielts->image_url : '' }}"
                    download="newfilename">{{ isset($ielts->image_url) ? $ielts->image_name : '' }}</a>

                @error('ielts')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="ielts_text" class="text-danger"></div>
            </div>
        </div>
        <div class="row border m-1">
            <h4 class="mb-0 mt-2">TOEFL</h4>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">Score <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="toelf_score" name="toelf_score"
                    placeholder="Enter a ielts score.." value="{{ $testLanguage->toelf_score }}">
                @error('toelf_score')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="toelf_score_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                {{-- <h4 class="card-title">Attach Document</h4> --}}
                <label for="document" class="form-label">Documents </label>
                <input type="file" id="toelf" name="toelf" class="dropify"
                    value="{{ isset($toelf->image_url) ? $toelf->image_url : '' }}"
                    data-default-file="{{ isset($toelf->image_url) ? $toelf->image_url : '' }}" />
                <a href="{{ isset($toelf->image_url) ? $toelf->image_url : '' }}"
                    download="newfilename">{{ isset($toelf->image_url) ? $toelf->image_name : '' }}</a>

                @error('toelf')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="toelf_text" class="text-danger"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="row border m-1">
            <h4 class="mb-0 mt-2">Pearson (PTE)</h4>
            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                <label class="form-label" for="name">Score <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="pearson_score" name="pearson_score"
                    placeholder="Enter a pearson score.." value="{{ $testLanguage->pearson_score }}">
                @error('pearson_score')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="pearson_score_text" class="text-danger"></div>
            </div>
            <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                <h4 class="card-title">Attach Document</h4>
                <label for="document" class="form-label">Documents </label>
                <input type="file" id="pearson" name="pearson" class="dropify"
                    value="{{ isset($pearson->image_url) ? $pearson->image_url : '' }}"
                    data-default-file="{{ isset($pearson->image_url) ? $pearson->image_url : '' }}" />
                <a href="{{ isset($pearson->image_url) ? $pearson->image_url : '' }}"
                    download="newfilename">{{ isset($pearson->image_url) ? $pearson->image_name : '' }}</a>

                @error('pearson')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="pearson_text" class="text-danger"></div>
            </div>
        </div>
        <div class="row border m-1">
            <h4>Medium Of Instruction (MOI)</h4>
            <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                <p>A medium of instruction is a language used in teaching at your
                    University.</p>
                {{-- <h4 class="card-title">Attach Document</h4> --}}
                <label for="document" class="form-label">Documents </label>
                <input type="file" id="moi" name="moi" class="dropify"
                    value="{{ isset($moi->image_url) ? $moi->image_url : '' }}"
                    data-default-file="{{ isset($moi->image_url) ? $moi->image_url : '' }}" />
                <a href="{{ isset($moi->image_url) ? $moi->image_url : '' }}"
                    download="newfilename">{{ isset($moi->image_url) ? $moi->image_name : '' }}</a>

                @error('moi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="moi_text" class="text-danger"></div>
            </div>
        </div>
    </div>
</div>
