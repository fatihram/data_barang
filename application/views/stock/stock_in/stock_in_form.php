<section class="content-header">
      <h1>
       Stock in
        <small>form data stock</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">stock</a></li>
        <li><a href="<?=site_url('')?>">Dashboard</a></li>
      </ol>
    </section>



 <section class="content">
    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title">Stock in</h4>
      <div class="pull-right">
      <a href="<?=site_url('Stock/in')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
          <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <?php echo form_open_multipart('stock/proses')?>
              <div class="form-group">
              <label style="color:blue;" for="date">date*</label>
              <input type="date" name="date"  value="<?=date('Y-m-d')?>" class="form-control" placeholder="date" required>
              </div>

              <div>
                   <label style="color:blue;" for="barcode">barcode*</label>
              </div>
                <div class="form-group input-group">
                  <input type="hidden" name="item_id" id="item_id"  required>
                  <input type="text" name="barcode" id="barcode"  class="form-control"  required autofocus>
                   <span class="input-group-btn ">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-item">
                         <i class="fa fa-search"></i>
                      </button>
                   </span> 
                </div>
                <div class="form-group">
              <label style="color:blue;" for="item_name">item name*</label>
              <input type="text" name="item_name" id="item_name"  class="form-control"  readonly>
              </div>




              <div class="form-group"> 
               <div class="row">
                  <div class="col-md-8">
                    <label for="unit_name"> item unit</label>
                       <input type="text" name="unit_name"  id="unit_name" class="form-control" value="-" readonly >
                  </div>
                   <div class="col-md-4">
                    <label for="stock">initial stock</label>
                       <input type="text" name="stock"  id="stock" class="form-control" value="-" readonly >
                  </div>
               </div>
              </div>



                   <div class="form-group">
              <label style="color:blue;" for="detail">detail*</label>
              <input type="text" name="detail"  class="form-control" placeholder="kulakan / tambahan / etc" required>
              </div>

                 <div class="form-group">
              <label style="color:blue;" for="distributor">Distributor</label>
                  <select name="distributor" id="distributor"  class="form-control">
                  <option value="">-pilih-</option>
                <?php foreach ($distributor as $i => $data) {  
                                echo' <option value="'.$data->distributor_id.'">"'.$data->name.'"</option>';
                     } ?>
                  </select>
                   <small  class="form-text text-muted">pilihan ini boleh di isi ataupun tidak.</small>
              </div>
                 <div class="form-group">
              <label style="color:blue;" for="qty">qty*</label>
              <input type="number" name="qty"  class="form-control" required>
              </div>



               <div class="form-group">
                  <button type="submit"  name="in_add" class="btn btn-primary"><i class="fa fa-paper-plane"></i> save </button>
                   <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> reset</button>
               </div>
         <?php echo form_close() ?>
          </div>
          </div>
            </div>  
         </div>
    </section>
   


  <div class="modal fade" id="modal-item">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">select product item</h4>
              </div>
              <div class="modal-body table-responsive">
                  <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                  <th style="width:5%;">#NO</th>
                  <th>barcode</th>
                  <th>name</th>
                  <th>unit</th>
                  <th>price</th>
                   <th>stock</th>
                   <th>aksi</th>
                </tr>
                     </thead>
                        <?php   $no=1;
                        foreach ($item as $i => $data) {  ?>
                             <tr>
                                <td><?=$no++?>.</td> 
                                <td><?=$data->barcode?></td>
                                 <td><?=$data->name?></td>
                                  <td><?=$data->unit_name?></td>
                                   <td class="text-right"><?=indo_currency($data->price)?></td>
                                    <td class="text-right"><?=$data->stock?></td>
                                    <td>
                                   <button class="btn btn-primary btn-xs" id="select"
                                    data-id="<?=$data->item_id?>"
                                    data-barcode="<?=$data->barcode?>"
                                    data-name="<?=$data->name?>"
                                    data-unit="<?=$data->unit_name?>"
                                    data-stock="<?=$data->stock?>">
                                      <i class="fa fa-check">select</i>
                                     </button>
                                    </td>
                             </tr>
                        <?php } ?>
              </table>
              </div>
            </div>
          </div>
        </div>
      

  <script>
 $(document).ready(function() {
        $(document).on('click', '#select', function() {
                       var item_id = $(this).data('id');
                       var barcode = $(this).data('barcode');
                        var name = $(this).data('name');
                       var unit_name = $(this).data('unit');
                        var price = $(this).data('price');
                       var stock = $(this).data('stock');
                       $( '#item_id').val(item_id);
                       $( '#barcode').val(barcode);
                       $( '#item_name').val(name);
                       $( '#unit_name').val(unit_name);
                       $( '#stock').val(stock);
                       $( '#modal-item').modal('hide');
        })
 }) 
</script>
