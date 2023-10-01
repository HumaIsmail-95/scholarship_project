<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('website/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('website/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/chatBot.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/css/custom.css') }}" rel="stylesheet">
    @yield('styles')

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="preloader"></div>
        <!-- preloader -->

        <div class="chatbot-container">
            <div id="header">
                <h5 class="text-white">Sarah </h5>
            </div>
            <div id="chatbot">
                <div id="conversation">
                    <div class="chatbot-message">
                        <p class="chatbot-text">Hi! 👋 it's great to see you!</p>
                    </div>
                </div>
                <form id="input-form">
                    <message-container>
                        <input id="input-field" type="text" placeholder="Type your message here">
                        <button id="submit-button" type="submit">
                            <img class="send-icon" src="send-message.png" alt="">
                        </button>
                    </message-container>

                </form>
            </div>

        </div>

        <script src="chatbot.js"></script>
        @include('website.include.header')

        @include('website.include.mobile_menu')

        @yield('content')


        @include('website.include.footer')



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="far fa-long-arrow-up"></span>
        </button>
        <button id="toggle-chatbot" class="message-btn">
            <span class="far fa-robot"></span>

        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('website/assets/js/jquery.js') }} "></script>
    <script src="{{ asset('website/assets/js/popper.min.js') }} "></script>
    <script src="{{ asset('website/assets/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('website/assets/js/owl.js') }} "></script>
    <script src="{{ asset('website/assets/js/wow.js') }} "></script>
    <script src="{{ asset('website/assets/js/validation.js') }} "></script>
    <script src="{{ asset('website/assets/js/jquery.fancybox.js') }} "></script>
    <script src="{{ asset('website/assets/js/appear.js') }} "></script>
    <script src="{{ asset('website/assets/js/scrollbar.js') }} "></script>
    <script src="{{ asset('website/assets/js/jquery.nice-select.min.js') }} "></script>

    <!-- main-js -->
    <script src="{{ asset('website/assets/js/script.js') }}"></script>
    <script src="{{ asset('website/assets/js/chatBot.js') }}"></script>
    @yield('scripts')
</body><!-- End of .page_wrapper -->

</html>
