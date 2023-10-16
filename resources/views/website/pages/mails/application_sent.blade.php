<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        .wrapper {
            padding: 50;
            margin: 10px auto;
            width: 80%;

        }

        .image-wrapper {
            text-align: center;
            padding: 30px 10px;
            background-color: rgba(127, 201, 238, 0.565);

            border-bottom: 4px solid rgb(92, 188, 235)
        }

        .image-wrapper img {
            width: 120px;
        }

        .text-body {
            background-color: whitesmoke;
            padding: 30px 30px;
        }

        .text-footer {
            background-color: rgb(101, 101, 101);
            color: white;
            text-align: center;
            margin: 0px;
            padding: 30px 30px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="image-wrapper">
            <img src="{{ $mailData['logo'] }}" alt="">

        </div>
        <div class="text-body">
            <p>Hi {{ $mailData['name'] }},</p>
            <p>Your application for the {{ $mailData['course'] }} has been successfuly sent to
                {{ $mailData['university'] }}</p>
            <br />
            <br />
            <br />
            regards,
            Admin
        </div>
        <div class="text-footer">
            <p>All rights are reserved by {{ $mailData['companyName'] }}</p>
        </div>
    </div>
    {{-- <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
    Your Applcation is sent successfully to {{ $mailData['uni_name'] }} for the {{ $mailData['course'] }}. --}}
</body>

</html>
