 <section class="content-header">
      <h1>
        Sales
        <small>Sales data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Sales barang</a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>

    
   
    <!-- Main content -->
    <section class="content">
    <?php $this->load->view('flash_messages');?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sales</h3>
              <div class="pull-right">
                 <a href="<?= site_url('Sales/add')?>" class="btn btn-success btn-sm"><i class="fa fa-plus">  new data</i></a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                  <th style="width:5%;">#NO</th>
                  <th>Kode sales</th>
                  <th>NAME</th>
                  <th>Jenis kelamin</th>
                  <th>Alamat</th>
                  <th>Handphone</th>
                  <th style="width:5%;">pilihan</th>
               
                </tr>
                    </thead>
                     <?php   $no=1;
                      foreach ($row->result() as $key => $data) { ?>
                            <tr>
                               <td><?=$no++?></td>
                               <td><?=$data->kode_sales?></td>
                               <td><?=$data->name?></td>
                               <td><?=$data->gender?></td>
                               <td><?=$data->alamat?></td>
                               <td><?=$data->handphone?></td>
                            
                               <td>
                               <a href="<?=site_url('Sales/edit/'.$data->sales_id)?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                <a href="<?=site_url('Sales/delete/'.$data->sales_id)?>" onclick="return confirm('Yakin Data Akan Di Hapus')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                               </td>
                              
                            </tr>
                     <?php } ?>
              </table>
            </div>  
          </div>
    </section>


