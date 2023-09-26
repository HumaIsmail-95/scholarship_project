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
    <style>
        body {
            display: flex;
            justify-content: center;
        }

        .chatbot-container {
            width: 500px;
            margin: 0 auto;
            background-color: #f5f5f5;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #chatbot {
            background-color: #f5f5f5;
            border: 1px solid #eef1f5;
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        #header {
            background-color: darkslategrey;
            color: #ffffff;
            padding: 20px;
            font-size: 1em;
            font-weight: bold;
        }

        message-container {
            background: #ffffff;
            width: 100%;
            display: flex;
            align-items: center;
        }


        #conversation {
            height: 500px;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        @keyframes message-fade-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chatbot-message {
            display: flex;
            align-items: flex-start;
            position: relative;
            font-size: 16px;
            line-height: 20px;
            border-radius: 20px;
            word-wrap: break-word;
            white-space: pre-wrap;
            max-width: 100%;
            padding: 0 15px;
        }

        .user-message {
            justify-content: flex-end;
        }


        .chatbot-text {
            background-color: white;
            color: #333333;
            font-size: 1.1em;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #input-form {
            display: flex;
            align-items: center;
            border-top: 1px solid #eef1f5;
        }

        #input-field {
            flex: 1;
            height: 60px;
            border: 1px solid #eef1f5;
            border-radius: 4px;
            padding: 0 10px;
            font-size: 14px;
            transition: border-color 0.3s;
            background: #ffffff;
            color: #333333;
            border: none;
        }

        .send-icon {
            margin-right: 10px;
            cursor: pointer;
        }

        #input-field:focus {
            border-color: #333333;
            outline: none;
        }

        #submit-button {
            background-color: transparent;
            border: none;
        }

        p[sentTime]:hover::after {
            content: attr(sentTime);
            position: absolute;
            top: -3px;
            font-size: 14px;
            color: gray;
        }

        .chatbot p[sentTime]:hover::after {
            left: 15px;
        }

        .user-message p[sentTime]:hover::after {
            right: 15px;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="preloader"></div>
        <!-- preloader -->

        <div class="chatbot-container">
            <div id="header">
                <h1>Chatbot</h1>
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
    <script>
        // Get chatbot elements
        const chatbot = document.getElementById('chatbot');
        const conversation = document.getElementById('conversation');
        const inputForm = document.getElementById('input-form');
        const inputField = document.getElementById('input-field');

        // Add event listener to input form
        inputForm.addEventListener('submit', function(event) {
            // Prevent form submission
            event.preventDefault();

            // Get user input
            const input = inputField.value;

            // Clear input field
            inputField.value = '';
            const currentTime = new Date().toLocaleTimeString([], {
                hour: '2-digit',
                minute: "2-digit"
            });

            // Add user input to conversation
            let message = document.createElement('div');
            message.classList.add('chatbot-message', 'user-message');
            message.innerHTML = `<p class="chatbot-text" sentTime="${currentTime}">${input}</p>`;
            conversation.appendChild(message);

            // Generate chatbot response
            const response = generateResponse(input);

            // Add chatbot response to conversation
            message = document.createElement('div');
            message.classList.add('chatbot-message', 'chatbot');
            message.innerHTML = `<p class="chatbot-text" sentTime="${currentTime}">${response}</p>`;
            conversation.appendChild(message);
            message.scrollIntoView({
                behavior: "smooth"
            });
        });

        // Generate chatbot response function
        function generateResponse(input) {
            // Add chatbot logic here
            const responses = [
                "Hello, how can I help you today? 😊",
                "I'm sorry, I didn't understand your question. Could you please rephrase it? 😕",
                "I'm here to assist you with any questions or concerns you may have. 📩",
                "I'm sorry, I'm not able to browse the internet or access external information. Is there anything else I can help with? 💻",
                "What would you like to know? 🤔",
                "I'm sorry, I'm not programmed to handle offensive or inappropriate language. Please refrain from using such language in our conversation. 🚫",
                "I'm here to assist you with any questions or problems you may have. How can I help you today? 🚀",
                "Is there anything specific you'd like to talk about? 💬",
                "I'm happy to help with any questions or concerns you may have. Just let me know how I can assist you. 😊",
                "I'm here to assist you with any questions or problems you may have. What can I help you with today? 🤗",
                "Is there anything specific you'd like to ask or talk about? I'm here to help with any questions or concerns you may have. 💬",
                "I'm here to assist you with any questions or problems you may have. How can I help you today? 💡",
            ];

            // Return a random response
            return responses[Math.floor(Math.random() * responses.length)];
        }
    </script>
    @yield('scripts')
</body><!-- End of .page_wrapper -->

</html>
