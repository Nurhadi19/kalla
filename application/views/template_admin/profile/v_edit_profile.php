  <div class="container-fluid">
    <h4>Edit Profile</h4>
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url()?>dashboard_admin/profile/aksi_edit_profile" enctype="multipart/form-data" method="POST">
          <input type="hidden" value="<?= $profile->id_user?>" name="id_user">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Nama Lengkap :</label>
              <input type="text" class="form-control" name="nama_lengkap" value="<?= $profile->nama_lengkap?>" readonly>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jabatan :</label>
              <input type="text" class="form-control" name="jabatan" value="<?= $profile->jabatan?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Username : </label>
              <input type="text" class="form-control" name="username" value="<?= $profile->username?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Password :</label>
              <input type="text" class="form-control" name="password">
              <p>*kosongkan jika tidak ingin mengganti password</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Foto Profil</label>
              <br>
              <input type="hidden" name="foto_lama" value="<?= $profile->foto_profil?>">
              <img src="<?= base_url()?>assets/img/foto_profil/<?= $profile->foto_profil?>" width="200">
              <input type="file" name="foto_profil">
            </div>
          </div>
          <button type="sumbit" class="btn mt-3 btn-success"><i class="fas fa-edit"></i> Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>