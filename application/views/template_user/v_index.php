<!-- Page Wrapper -->
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Selamat Datang, <?= $this->session->userdata('nama_lengkap')?></h1>
            </div>

            <!-- Content Row -->
            <div class="row">
              <!-- LOW Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h3 font-weight-bold text-info text-uppercase mb-1">LOW</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800"><?= $data_low?></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-car fa-2x text-info"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Medium Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h3 font-weight-bold text-success text-uppercase mb-1">Medium</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data_medium?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-car fa-2x text-success"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- HOT Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h3 font-weight-bold text-primary text-uppercase mb-1">HOT</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $data_hot?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-car fa-2x text-primary"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card out standing -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h3 font-weight-bold text-secondary text-uppercase mb-1">Out Standing</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">100</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-car fa-2x text-secondary"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- SPK Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-red shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h3 font-weight-bold text-red text-uppercase mb-1">SPK</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">80</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-car fa-2x text-red"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- DO Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h3 font-weight-bold text-warning text-uppercase mb-1">DO</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">100</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-car fa-2x text-warning"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Content Row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->