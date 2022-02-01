<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="lrvl/example-app/resources/css/app.css" rel="stylesheet" type="text/css" >
    <title>@ t e Z Z t o b o t</title>
</head>
<body>
<div class="align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow shadow p-3 mb-5 bg-white head">
    <h5 class="my-0 mr-md-auto font-weight-light bot_text"><a href="https://t.me/tezztobot" target="_blank" class="link-dark">@ t e Z Z t o b o t</a></h5>
    <div class="head_two">
        <a class="btn btn-outline-primary admin" href="https://test.vanilla.in.ua/">Home</a>
        <img src="lrvl/example-app/public/rb.png" class="bot">
    </div>
</div>

<?php
//    foreach ($mesdata as $md){
//        $disp = $md['message'];
//    }
//?>
<div class="wrapper">
<h2>/start message</h2>
    <form class="needs-validation form3" action="{{ route('form1') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="message">Hello text <span class="text-muted">(after '/start' command)</span></label>
            @foreach($mesdata as $disp)
            <textarea name="message" class="form-control form2" id="message" placeholder="{{ $disp->message ?? '' }}"></textarea>
            @endforeach
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
        <br><br>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



    </form>
</div>




</body>
</html>
