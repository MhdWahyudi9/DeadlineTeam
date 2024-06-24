
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png"/>
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            @if(session('status'))
                <div class="alert alert-danger">
                    {{session('message')}}
                </div>
            @endif
            <div class="auth-form-transparent text-left p-5 text-center">
              <img src="../../images/faces/face13.jpg" class="lock-profile-img" alt="img">
              <form action="{{route('login')}}" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend ">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0 " name="username" id="username" placeholder="Username" required>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password"  id="password" placeholder="Password"  required>                        
                  </div>
                </div>
                
                <div class="my-3">
                  <button type="submit" class="btn btn-primary mr-2 form-control">Simpan</button>
                </div>
                
                <div class="text-center mt-4 font-weight- text-light">
                  Don't have an account? <a href="register" class="text-light">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
