<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    {{--    <link href="{{asset("/storage/CSS/bootstrap5.css")}}" rel="stylesheet">--}}
</head>
<body class="container">

<h1>Storage</h1>

{{--<div class="row">--}}
{{--    <a href="/create" class="btn btn-primary mt-4">Create</a>--}}
{{--    <a href="/delete" class="btn btn-danger mt-4">Delete</a>--}}
{{--</div>--}}

<div class="row">
    <form action="/upload" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="form-group">
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-4 mb-4">Upload</button>
    </form>
</div>

<div class="row">
    <img class="img-fluid w-25 h-25"
         src="{{asset("/storage/images/a7nUuibk0DaFrTJLfhYfceRARzxU3V7DVD4UHPrT.jpg")}}">
    {{--         src="{{asset("/images/october/frKNQffdpUkpTPuSejxqzhNZyfeBA9MlwCpVusfD.jpg")}}">--}}
</div>

</body>
</html>
