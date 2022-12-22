          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Header Of Data Prospekan -->
            <div class="card shadow p-4">
              <div class="header">
                <h4 class="font-weight-bold text-center text-gray-800">Tambah User</h4>
                <hr />
              </div>
              <form action="<?= base_url()?>dashboard_admin/admin/aksi_tambah_user" method="POST" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Jabatan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select name="jabatan" class="form-control">
                          <option value="Supervisor">Supervisor</option>
                          <option value="Sales">Sales</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Nama Lengkap</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="nama_lengkap" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Username</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="username" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Password</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="password" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Foto Profil</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <input type="file" class="custom-input-file" name="foto_profil" id="foto"/>
                      </td>
                    </tr>
                  </table>
                </div>
                <button class="btn btn-success" type="submit"><i class="fas fa-edit mr-2"></i>Tambah</button>
              </form>
            </div>
          </div>
        </div>
        <!-- End of Main Content -->
