          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Header Of Data Prospekan -->
            <div class="card shadow p-4">
              <div class="header">
                <h4 class="font-weight-bold text-center text-gray-800">Menu Prospekan</h4>
                <hr />
              </div>
              <div class="body">
                <form action="#">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pencarianNama">Pencarian Nama</label>
                        <select name="nama-sales" id="pencarianNama" class="form-control">
                          <option value="1">Nama Sales 1</option>
                          <option value="1">Nama Sales 2</option>
                          <option value="1">Nama Sales 3</option>
                          <option value="1">Nama Sales 4</option>
                          <option value="1">Nama Sales 5</option>
                          <option value="1">Nama Sales 6</option>
                          <option value="1">Nama Sales 7</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="periodeBulan">Periode Bulan</label>
                        <select name="nama-sales" id="periodeBulan" class="form-control">
                          <option value="1">Januari</option>
                          <option value="2">Februari</option>
                          <option value="3">Maret</option>
                          <option value="4">April</option>
                          <option value="5">Mei</option>
                          <option value="6">Juni</option>
                          <option value="7">Juli</option>
                          <option value="8">Agustus</option>
                          <option value="9">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group-append">
                          <button class="btn btn-outline-success" type="button">Search<i class="fas fa-search fa-sm ml-2"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="row mt-3">
                  <div class="menu ml-auto mr-3 mb-2">
                    <a href="<?= base_url()?>dashboard_users/users/tambah_data_prospek" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> Tambah Data Prospekan </a>
                  </div>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-success text-white">
                          <tr role="row" class="text-center">
                            <th rowspan="2" class="align-middle">No.</th>
                            <th rowspan="2" class="align-middle">Nama Customer</th>
                            <th rowspan="2" class="align-middle">Media</th>
                            <th rowspan="2" class="align-middle">Alamat</th>
                            <th rowspan="2" class="align-middle">Sumber Prospek</th>
                            <th rowspan="2" class="align-middle">Model Kendaraan</th>
                            <th rowspan="2" class="align-middle">Type Kendaraan</th>
                            <th rowspan="2" class="align-middle">Status Prospek</th>
                            <th colspan="2" class="align-middle">Keterangan Prospek</th>
                            <th rowspan="2" class="align-middle" width="100">Aksi</th>
                          </tr>
                          <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="body-preview">
                          <?php 
                          $i = 1;
                          foreach($data_prospek as $data)
                          
                          {?>
                          <tr>
                            <td><?= $i++?></td>
                            <td><?= $data->nama_customer ?></td>
                            <td><?= $data->media ?></td>
                            <td><?= $data->alamat ?></td>
                            <td><?= $data->sumber_prospek ?></td>
                            <td><?= $data->model_kendaraan ?></td>
                            <td><?= $data->type_kendaraan ?></td>
                            <td><?= $data->status_prospek ?></td>
                            <td><?= $data->tanggal_prospek ?></td>
                            <td><?= $data->keterangan_prospek ?></td>
                            <td style="vertical-align: middle">
                              <a href="<?= base_url('dashboard_users/users/edit_data/'.$data->id_data)?>" class="btn btn-warning btn-sm btn-edit mb-2"> <i class="fas fa-edit"></i> Edit Data </a>
                            </td>
                          
                          </tr>
                          
                          
                          
                          <?php }?>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col">
                          <?= $pagination?>
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
