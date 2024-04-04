<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="admin_assets/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Form Basics</title>
  <link href="admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="admin_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="admin_assets/css/ruang-admin.min.css" rel="stylesheet">
</head>
@if(!Session::has('admindata'))
  <script type="text/javascript">
    window.location.href="{{url('/admin_login')}}";
  </script>
  @endif
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="admin_assets/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Student</span>
        </a>
        <div id="collapseBootstrap" class="collapse " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{url('/view_student')}}">View Student</a>
            <a class="collapse-item" href="{{url('/view_enrolled_student')}}">Enrolled Student</a>
            
           
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Course</span>
        </a>
        <div id="collapseForm" class="collapse show" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
          <a class="collapse-item " href="{{url('/add_course')}}">Add Course</a>
          <a class="collapse-item active" href="{{url('/fetch_course')}}">View Course</a>

          </div>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Faculty</span>
        </a>
        <div id="collapseTable" class="collapse " aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{url('/add_faculty')}}">Add Faculty</a>
            <a class="collapse-item " href="{{url('/view_faculty')}}">View Facalty</a>
          </div>
        </div>
      </li>
      
      
      
      
      
      
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
            
           
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                
                <span class="ml-2 d-none d-lg-inline text-white small">Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
           
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Add New Course
              </li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add New Course</h6>
                </div>
                <div class="card-body">
                  

                  <form method="post" action="{{url('/update_course')}}" enctype="multipart/form-data">
                  @if(session('message'))
                  {{session('message')}}
                  @endif
                    @csrf
                    <input type="hidden" name="hidden_id" value="{{$edit_course->id}}" >
                    <div class="form-group">
                      <label for="exampleInputEmail1">Course Name</label>
                      <input type="text" class="form-control"  name="course_name"id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{$edit_course->course_name}}"  >
                      
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Course Price</label>
                      <input type="text" class="form-control"  name="course_price" id="exampleInputPassword1" value="{{$edit_course->course_price}}"  >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Course Duration</label>
                      <input type="text" class="form-control"  name="course_duration" id="exampleInputPassword1" value="{{$edit_course->course_duration}}"  >
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Course Description</label>
                     <input type="text" class="form-control" name="course_description" id="exampleInputPassword1" value="{{$edit_course->course_description}}">
                    </div>
                    
                    
                     <div class="form-group">
                      <label for="exampleInputPassword1">Upload Course Image</label>
                      <input type="file" class="form-control" name="course_image" id="exampleInputPassword1"  >
                      <img src="course_images/{{$edit_course->course_image}}" height="70px" width="70px">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Choose one</label>
                        <select name="popular" class="form-control">
                            <option value="popular" @if($edit_course->popular == 'popular') selected @endif>Popular</option>
                            <option value="not-popular" @if($edit_course->popular == 'not-popular') selected @endif>Not Popular</option>
                        </select>
                    </div>

                    
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                  
                </div>
              </div>

              <!-- Form Sizing -->
              
              </div>

              <!-- Horizontal Form -->
              
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="{{url('/admin_logout')}}" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="admin_assets/vendor/jquery/jquery.min.js"></script>
  <script src="admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="admin_assets/js/ruang-admin.min.js"></script>

</body>

</html>