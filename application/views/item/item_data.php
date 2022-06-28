   <section class="content-header">
      <h1>
       Item-data
        <small>Item-data data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Item-data </a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>



    
   
    <!-- Main content -->
    <section class="content">
      <?php $this->load->view('flash_messages') ?>
          <div class="box">
            <div class="box-header witd-border">
              <h3 class="box-title">Item-data</h3>
              <div class="pull-right">
                 <a href="<?= site_url('Item/add')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus">  New data</i></a>
               
                   <a href="<?= site_url('Item/exportexcel')?>" class="btn btn-success btn-sm"><i class="fa  fa-file-excel-o">  Export excel</i></a>
                     <a href="<?= site_url('Item/exportpdf')?>" class="btn btn-success btn-sm"><i class="fa   fa-file-pdf-o">  Export pdf</i></a>
                     <a href="<?= site_url('Item/print')?>" class="btn btn-success btn-sm"><i class="fa   fa-print">  print data</i></a>
                  
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                  <td style="width:5%;">#NO</td>
                  <th>Kode barang</th>
                       <th>nama barang</th>
                            <th>kategori barang</th>
                              <th>price</th>
                                <th>unit</th>
                                  <th>stock</th>
                                   <th>gudang</th>
                                      <th>nama distributor</th>  
                                        <th>image</th>          
                  <th style="width:5%;">pilihan</th>
                </tr>
                    </thead>
                          <!-- <?php   $no=1;
                            foreach ($row->result() as $key => $data) { ?>
                              <tr>
                                  <td><?=$no++?>.</td>
                                   <td>
                            <?=$data->barcode?><br>
                            <hr>
                            <a href="<?=site_url('Item/barcode_qrcode/'.$data->item_id) ?>" class="btn btn-info btn-xs "><i class="fa fa-barcode"> Generator</i></a> 
                          </td>
                                    <td><?=$data->name?></td>
                                     <td><?=$data->categori_name?></td>
                                    <td><?=$data->price?></td>
                                    <td><?=$data->unit_name?></td>
                                    <td><?=$data->stock?></td>
                                    <td><?=$data->gudang_name?></td>
                                    <td><?=$data->distributor_name?></td>
                                     <td>
                                      <?php if ($data->image != null) { ?>
                                        <img src="<?=base_url('image/product/'.$data->image)?>" style="width:100px">
                                           <?php } ?>
                                    <td>
                                                   <a href="<?=site_url('Item/edit/'.$data->item_id)?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                       <a href="<?=site_url('Item/delete/'.$data->item_id)?>" onclick="return confirm('yakin data akan di hapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                             </td>
                              </tr>
                
                        <?php } ?>
                  -->
              </table>
            </div>  
          </div>
    </section>



    
   <script>
 $(document).ready(function() {
        $('#table1').DataTable({
             "processing": true,
             "serverSide": true,
             "ajax": {

               "url": "<?=site_url('Item/get_ajax')?>",
               "type": "POST",
             },

             "columnDefs": [
               {
                 "targets": [5],
                 "ClassName": 'text-center',
               },

               {
                 "targets": [7,8],
                 "orderable": false,
               },

             ]

        })
 }) 
</script>




  
    
   