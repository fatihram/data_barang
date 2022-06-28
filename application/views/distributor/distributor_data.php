 <section class="content-header">
      <h1>
        Distributor
        <small>pemasok data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Distributor barang</a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>

     
   
    <!-- Main content -->
    <section class="content">
     <?php $this->load->view('flash_messages');?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Distributor</h3>
              <div class="pull-right">
                 <a href="<?= site_url('Distributor/add')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"> create new data</i></a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                  <th style="width:5%;">#NO</th>
                  <th>NAME</th>
                  <th>PHONE</th>
                  <th>ADDRESS</th>
                  <th>DESCRIPTION</th>
                   <!-- <th>IMAGE</th> -->
                  <th style="width:5%;">pilihan</th>
                </tr>
                     </thead>
                    <?php $no=1;
                    foreach ($row->result() as $key => $data) { ?>
                    <tr>
                    <td><?=$no++?>.</td>
                     <td><?=$data->name?></td>
                        <td><?=$data->phone?></td>
                         <td><?=$data->address?></td>
                         <td><?=$data->description?></td>
                        <!-- <td>
                          <?php if($data->image != null) { ?>
                        <img src="<?= base_url('image/distributor/'.$data->image)?>" style="width: 100px" ></td>
                          <?php } ?>
                          </td> -->

                          
                          <td>
                           <a href="<?= site_url('Distributor/edit/'.$data->distributor_id);?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                           
                           <a href="<?= site_url('Distributor/delete/'.$data->distributor_id);?>" onclick=" return confirm('yakin data akan di hapus')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                         </td>
                       
                    </tr>
                    <?php } ?>
              </table>
            </div>  
          </div>
    </section>


