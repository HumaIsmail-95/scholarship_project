<div class="row">
    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row p-t-10 p-b-10">
                    <!-- Column -->
                    <div class="col p-r-0">
                        <h3 class="font-light">Profile Set</h3>
                        @if (Auth::user()->profile_percentage < 100)
                            <h6 class="mb-0">Set Your Profile</h6>
                        @else
                            <h6 class="mb-0"> You are all set</h6>
                        @endif
                    </div>
                    <!-- Column -->
                    <div class="col text-end align-self-center">
                        <div data-label="20%" class="css-bar m-b-0 css-bar-primary css-bar-20">
                            @php
                                $edu = Auth::user()->education;
                                $pro = Auth::user()->personal;
                                $test = Auth::user()->test;
                                $doc = Auth::user()->document;
                                $percent = ($edu + $pro + $test + $doc) * 25;
                            @endphp
                            <p class="mb-0 {{ Auth::user()->profile_percentage == 100 ? 'text-success' : 'text-danger' }}"
                                style="font-size:40px">{{ $percent }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h3 class="font-light">Step 1</h3>
                                <h6 class="text-muted">
                                    @if (Auth::user()->personal)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class=" fas fa-times-circle text-danger"></i>
                                    @endif
                                    Personal Info
                                </h6>
                            </div>
                            <!-- Column -->
                            <div class="col text-end align-self-center">
                                <div data-label="20%" class="css-bar m-b-0 css-bar-primary css-bar-20">
                                    <i class=" fas fa-user-circle {{ Auth::user()->personal ? 'text-success' : 'text-danger' }}"
                                        style="font-size: 40px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h3 class="font-light">Step 2</h3>
                                <h6 class="text-muted">
                                    @if (Auth::user()->education)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class=" fas fa-times-circle text-danger"></i>
                                    @endif
                                    Education
                                </h6>
                            </div>
                            <!-- Column -->
                            <div class="col text-end align-self-center">
                                <div data-label="30%" class="css-bar m-b-0 css-bar-danger css-bar-20">
                                    <i class=" fas fa-book  {{ Auth::user()->education ? 'text-success' : 'text-danger' }}"
                                        style="font-size: 40px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h3 class="font-light">Step 3</h3>
                                <h6 class="text-muted">
                                    @if (Auth::user()->test)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class=" fas fa-times-circle text-danger"></i>
                                    @endif
                                    Tests & Lang.
                                </h6>
                            </div>
                            <!-- Column -->
                            <div class="col text-end align-self-center">
                                <div data-label="40%" class="css-bar m-b-0 css-bar-warning css-bar-40">
                                    <i class="fas fa-language  {{ Auth::user()->test ? 'text-success' : 'text-danger' }}"
                                        style="font-size: 40px;"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-t-10 p-b-10">
                            <!-- Column -->
                            <div class="col p-r-0">
                                <h3 class="font-light">Step 4</h3>

                                <h6 class="text-muted">
                                    @if (Auth::user()->document)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class=" fas fa-times-circle text-danger"></i>
                                    @endif
                                    Documents
                                </h6>
                            </div>
                            <!-- Column -->
                            <div class="col text-end align-self-center">
                                <div data-label="60%" class="css-bar m-b-0 css-bar-info css-bar-60">
                                    <i class=" fas fa-paperclip  {{ Auth::user()->document ? 'text-success' : 'text-danger' }}"
                                        style="font-size: 40px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
