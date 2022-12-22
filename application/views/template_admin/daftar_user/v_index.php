          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Header Of Data Prospekan -->
            <div class="card shadow p-4">
              <div class="header">
                <h4 class="font-weight-bold text-center text-gray-800">Daftar User</h4>
                <hr />
              </div>
              <div class="body">
                <div class="row mt-3">
                  <div class="menu ml-auto mr-3 mb-2">
                    <a href="<?= base_url()?>dashboard_admin/admin/tambah_user" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> Tambah User </a>
                  </div>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-success text-white">
                          <tr role="row" class="text-center">
                            <th rowspan="2" class="align-middle">No.</th>
                            <th rowspan="2" class="align-middle">Nama Lengkap</th>
                            <th rowspan="2" class="align-middle">Jabatan</th>
                            <th rowspan="2" class="align-middle">Username</th>
                            <th rowspan="2" class="align-middle">Foto</th>
                            <th rowspan="2" class="align-middle">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="body-preview">
                          <?php 
                          $i = 1;
                          foreach($user as $data)
                          
                          {?>
                          <tr>
                            <td><?= $i++?></td>
                            <td><?= $data->nama_lengkap ?></td>
                            <td><?= $data->jabatan ?></td>
                            <td><?= $data->username ?></td>
                            <td class="align-middle text-center">
                              <img src="<?= base_url()?>assets/img/foto_profil/<?= $data->foto_profil?>" width="80">
                            </td>
                            <td class="align-middle text-center">
                              <a href="<?= base_url('dashboard_admin/admin/edit_user/'.$data->id_user)?>" class="btn btn-warning btn-sm btn-edit mb-2"> <i class="fas fa-edit"></i> Edit User </a>
                              <br>
                              <a href="<?= base_url('dashboard_admin/admin/hapus_user/'.$data->id_user)?>" class="btn btn-danger btn-sm btn-hapus"> <i class="fas fa-trash"></i> Hapus User </a>
                            </td>
                          
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col">
                         <!--Tampilkan pagination-->
                         <?php echo $pagination; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Main Content -->
