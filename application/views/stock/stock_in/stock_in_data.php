<section class="content-header">
      <h1>
     Stock
        <small>Stock data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Stock</a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <?php $this->load->view('flash_messages');?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Stock</h3>
              <div class="pull-right">
                 <a href="<?= site_url('Stock/exportExcel')?>" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                 <a href="<?= site_url('Stock/exportPdf')?>" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> Export pdf</a>
                 <a href="<?= site_url('Stock/in/add')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"> add stock in</i></a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                  <th style="width:5%;">#NO</th>
                  <th>barcode</th>
                  <th>Produck item</th>
                  <th>Qty</th>
                  <th>date</th>
                  <th style="width:5%;">pilihan</th>
                </tr>
                     </thead>
                      <?php  $no=1;
                      foreach ($row as $key => $data) {  ?>
                      <tr>
                                 <td><?=$no++?></td>
                                  <td><?=$data->barcode?></td>
                                    <td class="text-center"><?=$data->item_name?></td>
                                       <td class="text-right"><?=$data->qty?></td>
                                          <td class="text-center"><?=indo_date($data->date)?></td>
                                       <td>
                                         <a id="set_dtl" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                                            data-barcode="<?=$data->barcode?>"
                                                data-detail="<?=$data->detail?>"
                                         ><i class="fa fa-eye">detail</i> </a>
                                         <a href="<?=site_url('Stock/in/delete/'.$data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('yakin data akan di hapus?')" class="btn btn-warning btn-xs"><i class="fa fa-trash">delete</i> </a>
                                        </td>
                                        </tr>
                     <?php } ?>
              </table>
            </div>  
          </div>
   </section>


 <div class="modal fade" id="modal-detail">
          <div class="modal-dialog modal-sm modal-info">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">detail stock in</h4>
              </div>
              <div class="modal-body table-responsive">
                 <table class="table table-bordered no-margin">
                   <tbody>
                   <tr>
                           <th>barcode</th>
                           <td><span id="barcode"></span></td>
                   </tr>
                    <tr>
                           <th>detail</th>
                           <td><span id="detail"></span></td>
                   </tr>
                   </tbody>
                 </table>
              </div>
            </div>
          </div>
        </div>
      


  <script>
 $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
                       var barcode = $(this).data('barcode');
                         var detail = $(this).data('detail');
                       $( '#barcode').text(barcode);
                        $( '#detail').text(detail);
        })
 }) 
</script>
