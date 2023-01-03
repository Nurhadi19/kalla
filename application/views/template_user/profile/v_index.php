  <div class="container-fluid">
    <h3>My Profile</h3>
    <div class="card mt-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?= base_url()?>assets/img/foto_profil/<?= $profile->foto_profil?>" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Nama Lengkap : <b><?= $profile->nama_lengkap?></b></h5>
            <p class="card-text">Jabatan : <b><?= $profile->jabatan?></b></p>
            <p class="card-text">Username : <b><?= $profile->username?></b></p>
            <a href="<?= base_url()?>dashboard_users/profile/edit_profile/" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i> Edit Profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>