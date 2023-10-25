@extends('layouts.website')
@section('title', 'Subscriptions')
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Subscription Packages</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Subscription Packages</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- pricing-section -->
    <section class="pricing-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <span>Pricing Table</span>
                <h2>No Any Hidden Charge Select <br />Your Pricing Plan</h2>
            </div>
            <div class="row clearfix">
                @php
                    $key = 0;
                @endphp
                @foreach ($packages as $package)
                    @php
                        $key += 1;
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-one @if ($key / 2 == 1) active @endif">
                            <div class="pricing-table">
                                <div class="teble-header">
                                    <p>{{ $package->name }}</p>
                                    <h2>${{ $package->price }} <span>/ {{ $package->program_no }} prg</span></h2>
                                </div>
                                <div class="table-content">
                                    <ul class="list clearfix">
                                        <li>{{ $package->program_no }} Programs</li>
                                        <li class="{{ $package->coaching ? '' : 'light' }}">Coaching</li>
                                    </ul>
                                </div>
                                <div class="table-footer">
                                    @if (Auth::user())
                                        @if (Auth::user() && Auth::user()->subscription == 0)
                                            {{-- <a
                                       href="{{ Auth::user() ? route('addSubscription', $package->id) : route('login') }}">Register
                                       Now</a> --}}
                                            <a type="button" class=""
                                                onclick="openPaymentModal({{ json_encode($package) }})">
                                                Subscribe Now
                                            </a>
                                        @elseif (Auth::user()->subscription)
                                            {{-- <a href="javascript:void()">Subscribed
                                   </a> --}}
                                        @endif
                                    @else
                                        <a href="{{ route('login', 'subscription-packages') }}">Register
                                            Now</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageModalLabel">Pay through Stripe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{ route('stripePost') }}" method="post" class="require-validation"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <input type="hidden" id="package_id" name="package_id" value="">
                        <input type="hidden" id="price" name="price" value="">
                        <input type="hidden" id="program_no" name="program_no" value="">

                        <div class='form-group required'>
                            <label class='control-label'>Name on Card</label> <input class='form-control' size='4'
                                type='text' value="huma">
                        </div>

                        <div class='form-group card required'>
                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                class='form-control card-number' min='16' type='text' value="4242424242424242">
                        </div>

                        <div class="d-flex">
                            <div class='col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4' value="123"
                                    type='text'>
                            </div>
                            <div class='col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2' value="02"
                                    type='text'>
                            </div>
                            <div class='col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4' value="2025"
                                    type='text'>
                            </div>
                        </div>

                        <div class='col-md-12 error form-group hide' style="display:none">
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.</div>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-dark" data-dismiss="modal">Close</a>
                            <button type="submit" id="btn_submit" class="btn btn-success">Pay
                                Now ( <span id="span_price"></span> )</button>
                        </div>
                        <div class="alert  error text-danger ">
                        </div>
                        <div class="alert  success text-success ">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        function openPaymentModal(package) {
            console.log(' i m hereopenPaymentModal123123123', package);
            document.getElementById('price').value = package.price;
            document.getElementById('package_id').value = package.id;

            document.getElementById('program_no').value = package.program_no;
            console.log('package', package.price);
            document.getElementById('span_price').innerHTML = package.price;
            $("#packageModal").modal('show')
        }
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                $("#btn_submit").prop("disabled", true);
                $("#btn_submit").text("Loading");
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {

                console.log('status', status, response);
                if (response.error) {
                    $("#btn_submit").prop("disabled", false);
                    $("#btn_submit").text('Pay Now');
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                    $('.error').text(response.error.message)

                } else {
                    /* token contains id, last4, and card type */
                    $('.error').text('')
                    $("#btn_submit").text('Payed');
                    $('.success').text('Payed successfully')
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

@endsection
