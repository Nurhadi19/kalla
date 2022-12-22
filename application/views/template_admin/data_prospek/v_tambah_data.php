          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Header Of Data Prospekan -->
            <div class="card shadow p-4">
              <div class="header">
                <h4 class="font-weight-bold text-center text-gray-800">Tambah Prospekan</h4>
                <hr />
              </div>
              <form action="<?= base_url()?>dashboard_admin/admin/aksi_tambah_data" method="POST">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tr>
                      <td style="width: 200px; vertical-align: middle">ID User</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="id_user" value="<?= $this->session->userdata('id_user')?>" readonly/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">ID Jabatan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="jabatan" value="<?= $this->session->userdata('jabatan')?>" readonly/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Nama Customer</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="nama_customer" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Media</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="media" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Alamat</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="alamat" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Sumber Prospek</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select class="form-control" name="sumber_prospek">
                          <?php
                            foreach($nama_lengkap as $nama)
                            {?>
                              <option value="<?= $nama->nama_lengkap?>"><?= $nama->nama_lengkap?></option>
                            <?php }?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Model Kendaraan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="model_kendaraan" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Type Kendaraan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="type_kendaraan" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Status Prospek</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select class="form-control" name="status_prospek">
                          <option value="Low">Low</option>
                          <option value="Medium">Medium</option>
                          <option value="Hot">Hot</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle" rowspan="2">Keterangan Prospek</td>
                      <td style="width: 40px; vertical-align: middle">Tanggal</td>
                      <td><input type="date" class="form-control" name="tanggal_prospek" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 40px; vertical-align: middle">Keterangan</td>
                      <td><input type="text" class="form-control" name="keterangan_prospek" required/></td>
                    </tr>
                  </table>
                </div>
                <button class="btn btn-success" type="submit"><i class="fas fa-plus mr-2"></i>Tambah</button>
              </form>
            </div>
          </div>
        </div>
        <!-- End of Main Content -->
