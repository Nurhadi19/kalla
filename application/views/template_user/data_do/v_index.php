          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Header Of Data Report -->
            <div class="card shadow p-4">
              <div class="header">
                <h4 class="font-weight-bold text-center text-gray-800">Data DO</h4>
                <hr />
              </div>
              <div class="body">
                <form action="#">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="pencarianNama">Pencarian Nama</label>
                        <input type="text" value="<?= $this->session->userdata('nama_lengkap')?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="keteranganProspek">Keterangan Prospek</label>
                        <select name="keteranganProspek" id="keteranganProspek" class="form-control">
                          <option value="1">Low</option>
                          <option value="2">Medium</option>
                          <option value="3">Hot</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="">
                          <button class="btn btn-outline-success" type="button">Search<i class="fas fa-search fa-sm ml-2"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="row mt-3">
                  <div class="menu ml-auto mr-2 mb-2">
                    <a href="<?= base_url()?>dashboard_admin/admin/export_excel" class="btn btn-sm mr-1 btn-info"><i class="fas fa-download"></i> Download Report </a>
                  </div>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-success text-white">
                          <tr role="row" class="text-center">
                            <th rowspan="2" class="align-middle">No.</th>
                            <th rowspan="2" class="align-middle">Nama Sales</th>
                            <th rowspan="2" class="align-middle">Nama Customer</th>
                            <th rowspan="2" class="align-middle">Media</th>
                            <th rowspan="2" class="align-middle">Alamat</th>
                            <th rowspan="2" class="align-middle">No. HP</th>
                            <th rowspan="2" class="align-middle">Sumber Prospek</th>
                            <th rowspan="2" class="align-middle">Model Kendaraan</th>
                            <th rowspan="2" class="align-middle">Type Kendaraan</th>
                            <th rowspan="2" class="align-middle">Status Prospek</th>
                            <th colspan="2" class="align-middle">Keterangan Prospek</th>
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
                            <td><?= $data->nama_sales?></td>
                            <td><?= $data->nama_customer ?></td>
                            <td><?= $data->media ?></td>
                            <td><?= $data->alamat ?></td>
                            <td><?= $data->no_hp ?></td>
                            <td><?= $data->sumber_prospek ?></td>
                            <td><?= $data->nama_model_kendaraan ?></td>
                            <td><?= $data->type_kendaraan ?></td>
                            <td><?= $data->status_prospek ?></td>
                            <td><?= $data->tanggal_prospek ?></td>
                            <td><?= $data->keterangan_prospek ?></td>
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