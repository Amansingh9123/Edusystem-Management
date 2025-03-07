<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="student_assets/assets/img/favicon.png" rel="icon">
    <link href="student_assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="student_assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="student_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="student_assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="student_assets/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="student_assets/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="student_assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="student_assets/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="student_assets/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Hello!!</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <!-- End Notification Icon -->

                    <!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">
                    
                    

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="student_assets/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        @if(!empty(session()->has('login_name')))
                        
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{session()->get('login_name')}}</span>
                        
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{session()->get('login_name')}}</h6>
                          

                        @endif
                        </li>
                        <!-- <div>
              
            </div> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{url('/student_logout')}}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>

    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{url('/student_dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- End Components Nav -->

            <!-- End Forms Nav -->

            <!-- End Tables Nav -->

            <!-- End Charts Nav -->

            <!-- End Icons Nav -->



            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('/student_profile')}}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>STUDENT DASHBOARD</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

@if(isset($course))

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        @foreach($course as $info)
                        <div class="col-xxl-4 ">
                        <div class="card info-card sales-card">

                

                              <div class="card-body">
                                <h5 class="card-title">Course Name</h5>

                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{$info->course_name}}</h6>
                                    

                                  </div>
                        </div>
                      </div>

                    </div>
            </div>
                    @endforeach
                </div>
               
            </div><!-- End Left side columns -->



            </div>
        </section>
        
        @endif







    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="student_assets/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="student_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="student_assets/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="student_assets/assets/vendor/echarts/echarts.min.js"></script>
    <script src="student_assets/assets/vendor/quill/quill.min.js"></script>
    <script src="student_assets/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="student_assets/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="student_assets/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="student_assets/assets/js/main.js"></script>

</body>

</html>