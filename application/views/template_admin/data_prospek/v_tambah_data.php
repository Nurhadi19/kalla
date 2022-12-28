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
                      <td style="width: 200px; vertical-align: middle">Nama Sales</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select name="nama_sales" class="form-control">
                          <?php
                            foreach($nama_lengkap as $nama)
                            {?>
                              <option value="<?= $nama->nama_lengkap?>"><?= $nama->nama_lengkap?></option>
                          <?php }?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Nama Customer</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="nama_customer" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Media</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select name="media" class="form-control">
                          <option value="Visit">Visit</option>
                          <option value="Telepon">Telepon</option>
                          <option value="WhatsApp">WhatsApp</option>
                          <option value="Messenger Facebook">Messenger Facebook</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Alamat</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="alamat" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">No. Hp</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="no_hp" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Sumber Prospek</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select class="form-control" name="sumber_prospek">
                          <option value="Canvasing">Canvasing</option>
                          <option value="Reference">Reference</option>
                          <option value="Repeat Order">Repeat Order</option>
                          <option value="Media Sosial">Media Sosial</option>
                          <option value="Public Display">Public Display</option>
                          <option value="Walk In">Walk In</option>
                          <option value="Test Drive">Test Drive</option>
                          <option value="Database">Database</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Model Kendaraan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select name="model_kendaraan" class="form-control">
                          <option value="1">Agya</option>
                          <option value="2">Alphard/Vellfire</option>
                          <option value="3">Avanza</option>
                          <option value="4">Calya</option>
                          <option value="5">Camry</option>
                          <option value="6">C-HR</option>
                          <option value="7">Corolla Altis</option>
                          <option value="8">Dyna</option>
                          <option value="9">Fortuner 4x2</option>
                          <option value="10">Fortuner 4x4</option>
                          <option value="11">FT86</option>
                          <option value="12">Hiace</option>
                          <option value="13">Hilux DC</option>
                          <option value="14">Hilux SC</option>
                          <option value="15">Innova</option>
                          <option value="16">Rush</option>
                          <option value="17">Sienta</option>
                          <option value="18">Vios</option>
                          <option value="19">Voxy</option>
                          <option value="20">Yaris</option>
                          <option value="21">Raize</option>
                          <option value="22">Veloz</option>
                        </select>
                      </td>
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
