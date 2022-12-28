<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Supervisor - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="<?= base_url()?>assets/css/sb-admin-2.css" rel="stylesheet" />

    <!-- Kalla CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/kalla.css">
  </head>

  <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
      <a href="#" class="navbar-brand mr-auto">
        <img src="<?= base_url()?>assets/img/logo.png" alt="logo perusahaan" class="logo_perusahaan">
      </a>
      <h4 class="nama_team text-grey-900">Victory Team</h4>
    </nav>
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-2">Login Page</h1>
                    <p class="text-gray-900">Management Prospekan</p>
                  </div>
                  <form class="user" action="<?= base_url()?>login/aksi_login" method="POST">
                    <div class="form-group">
                      <label for="Account">Account</label>
                      <input type="text" class="form-control form-control-user mb-3" id="Account" aria-describedby="emailHelp" placeholder="Enter Your Account Here..." name="username" required/>
                    </div>
                    <div class="form-group">
                      <label for="Password">Password</label>
                      <input type="password" class="form-control form-control-user mb-5" id="Password" placeholder="Enter Your Password Here..." name="password" required/>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block"> Login </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>assets//jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>

    <?php if($this->session->flashdata('alert') == TRUE):?>
    <script>
        Swal.fire({title: 'ERROR',text: '<?= $this->session->flashdata('alert') ?>',icon: 'error',confirmButtonText: 'OK'})
    </script>
    <?php endif ?>
  </body>
</html>
