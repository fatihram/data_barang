   <section class="content-header">
      <h1>
       Gudang-data
        <small>gudang-data data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">gudang-data </a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>


 
    
   
    <!-- Main content -->
    <section class="content">
      <?php $this->load->view('flash_messages') ?>
          <div class="box">
            <div class="box-header witd-border">
              <h3 class="box-title">gudang-data</h3>
              <div class="pull-right">
                 <a href="<?= site_url('Gudang/add')?>" class="btn btn-success btn-sm"><i class="fa fa-plus">  new data</i></a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                  <td style="width:5%;">#NO</td>
                  <th>Nama Gudang</th>
                    <th>Kode Gudang</th>
                  <th style="width:5%;">pilihan</th>
                </tr>
                    </thead>
                          <?php  $no=1;
                          
                          foreach ($row->result() as $key => $data) { ?>
                                      <tr>
                                             <td><?=$no++?>.</td>
                                             <td><?=$data->name?></td>
                                                  <td><?=$data->kode_gudang?></td>

                                                  
                                             <td>
                                                   <a href="<?= site_url('Gudang/edit/'.$data->gudang_id);?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                      <a href="<?=site_url('Gudang/delete/'.$data->gudang_id)?>" onclick="return confirm('yakin data akan di hapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                             </td>

                                            
                                      </tr>
                          <?php }  ?>
              </table>
            </div>  
          </div>
    </section>
  
    
   