 <section class="content-header">
      <h1>
       User
        <small>data User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">user </a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>



   
    <!-- Main content -->
    <section class="content">
        
          <div class="box">
            <div class="box-header witd-border">
              <h3 class="box-title">User</h3>
              <div class="pull-right">
                 <a href="<?= site_url('User/add')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"> create new data</i></a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                  <td style="width:5%;">#NO</td>
                  <th>USERNAME</th>
                  <th>NAME</th>
                  <th>PASSWORD</th>
                  <th>LEVEL</th>
                  <th>ALAMAT</th>
                  <th style="width:5%;">pilihan</th>
                </tr>
                    </thead>
                    <?php $no=1;
                     foreach ($row->result() as $key => $data) {  ?>
                    <tr>
                    <td><?=$no++?>.</td>
                      <td><?=$data->username?></td>
                        <td><?=$data->name?></td>
                          <td><?=$data->password?></td>
                            <td><?=$data->level == 1 ? 'manager' : 'admin'?></td>
                            <td><?=$data->address?></td>
                            <td>
                             <a href="<?=site_url('User/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                             <a href="<?=site_url('User/delete/'.$data->user_id)?>" onclick="return confirm('apakah yakin akan di hapus')" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
                            </td>
                    </tr>
                    
                    <?php } ?>
              </table>
            </div>  
          </div>
    </section>
  
    
   