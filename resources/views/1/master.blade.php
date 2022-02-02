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
    <h5 class="my-0 mr-md-auto font-weight-light bot_text"><a href="https://t.me/tezztobot" target="_blank"  class="link-dark">@ t e Z Z t o b o t</a></h5>
        <div class="head_two">
            <a class="btn btn-outline-primary admin" href="https://test.vanilla.in.ua/admin">Admin panel</a>
            <img src="lrvl/example-app/public/rb.png" class="bot">
        </div>
</div>
@yield('php')
<div class="wrapper">

    <h2>iTemsGoogleDocsParsing</h2>

    @foreach($data as $dat)
        @if(($dat->availability) > 0)
    <div class="card mb-4 box-shadow itemcard">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $dat->name }}</h4>
        </div>
        <div class="card-body">
            <img src="{{ $dat->img }}" class="img" alt="">
            <ul class="list-unstyled mt-3 mb-4">
                <li>{{ $dat->desc }}</li>
                <li><small class="text-muted">availible: </small>{{ $dat->qty }}</li>
                <li><small class="text-muted">на складі: </small>{{ $dat->availability }}</li>
            </ul>
            <h1 class="card-title pricing-card-title">{{ $dat->price }} <small class="text-muted">₴</small></h1>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary butt">buy now</button>
        </div>
    </div>

        @else
            <div class="card mb-4 box-shadow itemcard itemcard2 shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $dat->name }}</h4>
                </div>
                <div class="card-body">
                    <img src="{{ $dat->img }}" class="img" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>{{ $dat->desc }}</li>
                        <li><small class="text-muted">кількість: </small>{{ $dat->qty }}</li>
                        <li><small class="text-muted">на складі: </small>{{ $dat->availability }}</li>
                    </ul>
                    <h1 class="card-title pricing-card-title">{{ $dat->price }} <small class="text-muted">₴</small></h1>
                    <button type="button" class="btn btn-lg butt2">немає</button>
                </div>
            </div>
        @endif
    @endforeach
</div>




</body>
</html>
