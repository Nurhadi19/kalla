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
                      <td style="width: 200px; vertical-align: middle">Nama Sales</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="nama_sales" value="<?= $data->nama_sales?>" readonly/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Nama Customer</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="nama_customer" value="<?= $data->nama_customer?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Media</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select name="media" class="form-control">
                          <option value="Visit" <?= ($data->media == "Visit" ? 'selected' : '')?>>Visit</option>
                          <option value="Telepon" <?= ($data->media == "Telepon" ? 'selected' : '')?>>Telepon</option>
                          <option value="WhatsApp" <?= ($data->media == "WhatsApp" ? 'selected' : '')?>>WhatsApp</option>
                          <option value="Messenger Facebook" <?= ($data->media == "Messenger Facebook" ? 'selected' : '')?>>Messenger Facebook</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Alamat</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="alamat" value="<?= $data->alamat?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">No. Hp</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td><input type="text" class="form-control" name="no_hp" value="<?= $data->no_hp?>" required/></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Sumber Prospek</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select class="form-control" name="sumber_prospek">
                          <option value="Canvasing" <?= ($data->sumber_prospek == "Canvasing" ? 'selected' : '')?>>Canvasing</option>
                          <option value="Reference" <?= ($data->sumber_prospek == "Reference" ? 'selected' : '')?>>Reference</option>
                          <option value="Repeat Order" <?= ($data->sumber_prospek == "Repeat Order" ? 'selected' : '')?>>Repeat Order</option>
                          <option value="Media Sosial" <?= ($data->sumber_prospek == "Media Sosial" ? 'selected' : '')?>>Media Sosial</option>
                          <option value="Public Display" <?= ($data->sumber_prospek == "Public Display" ? 'selected' : '')?>>Public Display</option>
                          <option value="Walk In" <?= ($data->sumber_prospek == "Walk In" ? 'selected' : '')?>>Walk In</option>
                          <option value="Test Drive" <?= ($data->sumber_prospek == "Test Drive" ? 'selected' : '')?>>Test Drive</option>
                          <option value="Database" <?= ($data->sumber_prospek == "Database" ? 'selected' : '')?>>Database</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 200px; vertical-align: middle">Model Kendaraan</td>
                      <td style="width: 40px; vertical-align: middle">:</td>
                      <td>
                        <select name="model_kendaraan" class="form-control">
                          <option value="1" <?= ($data->id_model_kendaraan == 1 ? 'selected' : '')?>>Agya</option>
                          <option value="2" <?= ($data->id_model_kendaraan == 2 ? 'selected' : '')?>>Alphard/Vellfire</option>
                          <option value="3" <?= ($data->id_model_kendaraan == 3 ? 'selected' : '')?>>Avanza</option>
                          <option value="4" <?= ($data->id_model_kendaraan == 4 ? 'selected' : '')?>>Calya</option>
                          <option value="5" <?= ($data->id_model_kendaraan == 5 ? 'selected' : '')?>>Camry</option>
                          <option value="6" <?= ($data->id_model_kendaraan == 6 ? 'selected' : '')?>>C-HR</option>
                          <option value="7" <?= ($data->id_model_kendaraan == 7 ? 'selected' : '')?>>Corolla Altis</option>
                          <option value="8" <?= ($data->id_model_kendaraan == 8 ? 'selected' : '')?>>Dyna</option>
                          <option value="9" <?= ($data->id_model_kendaraan == 9 ? 'selected' : '')?>>Fortuner 4x2</option>
                          <option value="10" <?= ($data->id_model_kendaraan == 10 ? 'selected' : '')?>>Fortuner 4x4</option>
                          <option value="11" <?= ($data->id_model_kendaraan == 11 ? 'selected' : '')?>>FT86</option>
                          <option value="12" <?= ($data->id_model_kendaraan == 12 ? 'selected' : '')?>>Hiace</option>
                          <option value="13" <?= ($data->id_model_kendaraan == 13 ? 'selected' : '')?>>Hilux DC</option>
                          <option value="14" <?= ($data->id_model_kendaraan == 14 ? 'selected' : '')?>>Hilux SC</option>
                          <option value="15" <?= ($data->id_model_kendaraan == 15 ? 'selected' : '')?>>Innova</option>
                          <option value="16" <?= ($data->id_model_kendaraan == 16 ? 'selected' : '')?>>Rush</option>
                          <option value="17" <?= ($data->id_model_kendaraan == 17 ? 'selected' : '')?>>Sienta</option>
                          <option value="18" <?= ($data->id_model_kendaraan == 18 ? 'selected' : '')?>>Vios</option>
                          <option value="19" <?= ($data->id_model_kendaraan == 19 ? 'selected' : '')?>>Voxy</option>
                          <option value="20" <?= ($data->id_model_kendaraan == 20 ? 'selected' : '')?>>Yaris</option>
                          <option value="21" <?= ($data->id_model_kendaraan == 21 ? 'selected' : '')?>>Raize</option>
                          <option value="22" <?= ($data->id_model_kendaraan == 22 ? 'selected' : '')?>>Veloz</option>
                        </select>
                      </td>
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
                          <option value="Hot" <?= ($data->status_prospek == "Hot" ? 'selected' : '')?> >Hot</option>
                          <option value="DO" <?= ($data->status_prospek == "DO" ? 'selected' : '')?> >DO</option>
                          <option value="SPK" <?= ($data->status_prospek == "SPK" ? 'selected' : '')?> >SPK</option>
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
