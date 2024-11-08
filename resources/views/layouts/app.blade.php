<!-- resources/views/layouts/app.blade.php -->

<html>
<head>
    <meta charset="utf-8">

    <title>Test</title>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script-- src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script-->

    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        @yield('content')
    </div>

    {{--@if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif--}}

</body>
</html>
