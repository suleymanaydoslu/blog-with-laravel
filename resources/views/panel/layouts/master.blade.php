<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Simple Blog</title>

    @include('panel.blocks.head')
</head>

<body>

<div id="wrapper">

    @include('panel.blocks.navbar')

    <div id="page-wrapper">

        <div class="container-fluid">

            @yield('content')
        </div>

    </div>

</div>

    @include('panel.blocks.scripts')

</body>

</html>
