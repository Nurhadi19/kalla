          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Header Of Data Prospekan -->
            <div class="card shadow p-4">
              <div class="header">
                <h4 class="font-weight-bold text-center text-gray-800">Edit Prospekan</h4>
                <hr />
              </div>
              <form action="<?= base_url()?>dashboard_users/users/aksi_edit_data" method="POST">
                <div class="table-responsive">
                  <?php foreach($prospek as $data){?>
                  <table class="table table-bordered">
                  <input type="hidden" class="form-control" name="id_data" value="<?= $data->id_data?>" required/>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">ID User</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="number" class="form-control" name="id_user" value="<?= $data->id_user?>" readonly/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">ID Jabatan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="jabatan" value="<?= $data->jabatan?>" readonly/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Nama Customer</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="nama_customer" value="<?= $data->nama_customer?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Media</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="media" value="<?= $data->media?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Alamat</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="alamat" value="<?= $data->alamat?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Sumber Prospek</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama_lengkap')?>" name="sumber_prospek" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Model Kendaraan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="model_kendaraan" value="<?= $data->model_kendaraan?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Type Kendaraan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="type_kendaraan" value="<?= $data->type_kendaraan?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Status Prospek</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select class="form-control" name="status_prospek">
                          <option value="Low" <?= ($data->status_prospek == "Low" ? 'selected' : '')?> >Low</option>
                          <option value="Medium" <?= ($data->status_prospek == "Medium" ? 'selected' : '')?> >Medium</option>
                          <option value="Hot" <?= ($data->status_prospek == "Low" ? 'selected' : '')?> >Hot</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle" rowspan="2">Keterangan Prospek</td>
                      <td style="width: 40px; vertical-align: middle">Tanggal</td>
                      <td><input type="date" class="form-control" name="tanggal_prospek" value="<?= $data->tanggal_prospek?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 40px; vertical-align: middle">Keterangan</td>
                      <td><input type="text" class="form-control" value="<?= $data->keterangan_prospek?>" name="keterangan_prospek" required/></td>
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
