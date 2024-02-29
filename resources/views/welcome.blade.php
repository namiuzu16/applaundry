<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>APP Laundry</title>

    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this page -->
    <link href="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') }}">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

    <div id="wrapper">
        @include('sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('topbar')
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

             <!-- Footer -->
             <footer class="sticky-footer bg-white">
                 <div class="container my-auto">
                     <div class="copyright text-center my-auto">
                        <span>Copyright & copy; Namiuzu Nafa 2023</span>
                     </div>
                 </div>
            </footer>
            <!-- End of Footer -->
            
        </div>
    </div>
    

     <!-- Bootstrap core JavaScript-->
     <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
     <!-- Core plugin JavaScript-->
     <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
 
     <!-- Custom scripts for all pages-->
     <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

     <!-- Page level plugins -->
     <script src="{{ asset('sbadmin2/vendor/chart.js/Chart.min.js') }}"></script>

     <!-- Page level custom scripts -->
     <script src="{{ asset('sbadmin2/js/demo/datatables-demo.js') }}"></script>
     
     <!-- Page level custom scripts -->
     <script src="{{ asset('sbadmin2/js/demo/chart-area-demo.js') }}"></script>
     <script src="{{ asset('sbadmin2/js/demo/chart-pie-demo.js') }}"></script>

     <!-- Page level plugins -->
     <script src="{{ asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/js/demo/datatables-demo.js') }}"></script>
    

     

    @include('sweetalert::alert')
 
</body>
</html>
@yield('script')