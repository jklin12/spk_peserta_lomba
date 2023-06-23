 <!doctype html>

 <html>

 <head>
     @include('includes.head')
     @stack('css')
 </head>

 <body id="page-top">

     <!-- Page Wrapper -->
     <div id="wrapper">

         <!-- Sidebar -->
         @include('includes.sidebar')
         <!-- End of Sidebar -->

         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">

             <!-- Main Content -->
             <div id="content" style="background-image: url({{URL::asset('assets/img/home-bg.png') }});background-size: cover;background-repeat: no-repeat;">

                 <!-- Topbar -->
                 @include('includes.header')
                 <!-- End of Topbar -->

                 <!-- Begin Page Content -->
                 <div class="container-fluid" >

                     <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                         <h1 class="h3 mb-0 text-dark">Dashboard <small>{{ config('site.name')}}</small></h1>

                     </div>


                 </div>
                 <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->

             <!-- Footer --> 
             <!-- End of Footer -->

         </div>
         <!-- End of Content Wrapper -->

     </div>
     <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
         <i class="fas fa-angle-up"></i>
     </a>

     <!-- Logout Modal-->
     @include('includes.logout-modal')

     <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

     <!-- Core plugin JavaScript-->
     <script src="{{ URL::asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

     <!-- Custom scripts for all pages-->
     <script src="{{ URL::asset('assets/js/sb-admin-2.min.js') }}"></script>



     <script>
         $(document).ready(function() {
             $('#nav-home').addClass('active')
         })
     </script>

 </body>

 </html>