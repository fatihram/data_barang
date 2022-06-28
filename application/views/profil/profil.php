<section class="content-header">
      <h1>
        Profile data
        <small>Profile data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Profile data </a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>
<section class="content">
      <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url()?>assets/backend/dist/img/avatar5.png" alt="User profile picture">
              <h3 class="profile-username text-center"><?=$this->fungsi->user_login()->name?></h3>
              <p class="text-muted text-center"></p>
             <div class="box-body">

                 <strong><i class="fa fa-user margin-r-5"></i> name</strong>
              <p><?=$this->fungsi->user_login()->name?></p>
              <hr>
              
             <strong><i class="fa fa-book fa-user margin-r-5"></i> level</strong>
              <p><?=$this->fungsi->user_login()->level == '1' ? 'admin' : 'user'?></p>
              <hr>
              

                <strong><i class="fa  fa-map-marker margin-r-5"></i> alamat</strong>
              <p><?=$this->fungsi->user_login()->address?></p>
              <hr>
         
              <strong><i class="fa fa-file-text-o margin-r-5"></i> quets</strong>
              <p>30 hari dengan javascript rasanya bagai 1 bulan.</p>
            </div>
          </div>
            </div>
          </div>

    </section>


   

    

  
          