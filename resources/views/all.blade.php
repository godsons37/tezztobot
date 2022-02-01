<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="lrvl/example-app/resources/css/app.css" rel="stylesheet" type="text/css" >
    <title>@ B O T</title>
</head>
<body>
{{--@yield('php')--}}
<div class="wrapper">
@foreach($data as $dat)
    <div class="alert alert-info">
        @if(($dat->name) == 'dvsfdvdfd')
            test
        @endif
        {{ $dat->name }}
        <p>{{ $dat->id }}</p>
    </div>
    @endforeach

</div>




</body>
</html>
