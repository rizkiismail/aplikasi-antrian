<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{url('select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('datatables/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .bg-dark-blue{
            background-color: #0e4cad;
            color: white;
        }
    </style>
</head>

<body>
        @include('layouts.navbar_admin')
        
        @yield('breadcrumb')
                
        @yield('content')
                
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('select2/dist/js/select2.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('datatables/jszip.min.js')}}"></script>
    <script src="{{url('datatables/buttons.html5.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
    @yield('script')
</body>

</html>
