          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Header Of Data Prospekan -->
            <div class="card shadow p-4">
              <div class="header">
                <h4 class="font-weight-bold text-center text-gray-800">Edit User</h4>
                <hr />
              </div>
              <form action="<?= base_url()?>dashboard_admin/admin/aksi_edit_user" method="POST" enctype="multipart/form-data">
                <div class="table-responsive">
                  <?php foreach($user as $data){?>
                  <table class="table table-bordered">
                  <input type="hidden" class="form-control" name="id_user" value="<?= $data->id_user?>" required/>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">ID User</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="number" class="form-control" name="id_user" value="<?= $data->id_user?>"/ readonly></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Jabatan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select name="jabatan" class="form-control">
                          <option value="Supervisor" <?= ($data->jabatan == "Supervisor" ? 'selected' : '')?> >Supervisor</option>
                          <option value="Sales" <?= ($data->jabatan == "Sales" ? 'selected' : '')?>>Sales</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Nama Lengkap</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="nama_lengkap" value="<?= $data->nama_lengkap?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Username</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="username" value="<?= $data->username?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Foto Profil</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <img src="<?= base_url()?>assets/img/foto_profil/<?= $data->foto_profil?>" width="100">
                        <input type="hidden" name="foto_lama" class="form-group" value="<?= $data->foto_profil?>">
                        <input type="file" name="foto_profil" class="form-group">
                      </td>
                    </tr>
                  </table>
                </div>
                <button class="btn btn-success" type="submit"><i class="fas fa-edit mr-2"></i>Edit</button>
              </form>
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- End of Main Content -->
