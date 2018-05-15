<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAJ | @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}"/>
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}"/>
    <link rel="stylesheet" href="{!! asset('css/dataTables/datatables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/chosen/bootstrap-chosen.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/blueimp/css/blueimp-gallery.min.css') !!}">


</head>
<body>
<!-- Wrapper-->
<div id="wrapper">
    <!-- Navigation -->
@include('layouts.navigation')
<!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">
        <!-- Page wrapper -->
    @include('layouts.topnavbar')
    <!-- Main view  -->
    @yield('content')
    <!-- Footer -->
        @include('layouts.footer')
    </div>
    <!-- End page wrapper-->
</div>
<!-- End wrapper-->

<script src="{!! asset('js/jquery-3.1.1.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/dataTables/datatables.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/chosen/chosen.jquery.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/blueimp/jquery.blueimp-gallery.min.js') !!}" type="text/javascript"></script>

@section('scripts')
@show

</body>
</html>
