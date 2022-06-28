 <section class="content-header">
      <h1>
       Item
        <small>form <?=$page?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Item </a></li>
        <li><a href="<?=site_url('Item')?>">Item</a></li>
      </ol>
    </section>



 <section class="content">
  <?php $this->load->view('flash_messages');?>
    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title"><?=$page?> data Item</h4>
      <div class="pull-right">
      <a href="<?=site_url('Item')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
          <div class="row">
          <div class="col-md-4 col-md-offset-4">
          <?php echo form_open_multipart('Item/proses');?>
             <div class="form-group">
             <input type="hidden" name="id" value="<?=$row->item_id?>">
                  <label for="barcode" style="color:blue;">Barcode***</label>
                  <input type="text" id="barcode" value="<?=$row->barcode?>" class="form-control" name="barcode" placeholder="barcode">
             </div>

               <div class="form-group">
                  <label for="name" style="color:blue;">nama barang***</label>
                  <input type="text" id="name" value="<?=$row->name?>"  class="form-control" name="name" placeholder="name ">
             </div>

             <div class="form-group">
                  <label for="categori_id" style="color:blue;">Categori barang***</label>
                   <select name="categori_id" id="categori_id"  class="form-control">
                      <option value="">-pilih-</option>
                     <?php foreach ($Category->result() as $key => $data) {  ?>
                           <option value="<?=$data->categori_id?>"  <?=$data->categori_id == $row->categori_id ? "selected" : null?>><?=$data->name?></option>
                                 
                     <?php } ?>
                   </select>
             </div>

                <div class="form-group">
                   <label for="unit_id" style="color:blue;">Unit***</label>
                   <select name="unit_id" id="unit_id"  class="form-control">
                      <option value="">-pilih-</option>
                     <?php foreach ($Unit->result() as $key => $data) {  ?>
                           <option value="<?=$data->unit_id?>"   <?=$data->unit_id == $row->unit_id ? "selected" : null?>><?=$data->name?></option>  
                     <?php } ?>
                   </select>
             </div>

             <div class="form-group">
                  <label for="price" style="color:blue;">Harga***</label>
                  <input type="number" id="price" value="<?=$row->price?>"  class="form-control" name="price" placeholder="harga">
             </div>


              <div class="form-group">
                   <label for="gudang_id" style="color:blue;">Gudang***</label>
                   <select name="gudang_id" id="gudang_id"  class="form-control">
                      <option value="">-pilih-</option>
                     <?php foreach ($Gudang->result() as $key => $data) {  ?>
                           <option value="<?=$data->gudang_id?>" <?=$data->gudang_id == $row->gudang_id ? "selected" : null?> ><?=$data->name?></option>               
                     <?php } ?>
                   </select>
             </div>


              <div class="form-group">
                   <label for="distributor_id" style="color:blue;">Distributor***</label>
                   <select name="distributor_id" id="distributor_id"  class="form-control">
                      <option value="">-pilih-</option>
                     <?php foreach ($Distributor->result() as $key => $data) {  ?>
                           <option value="<?=$data->distributor_id?>"   <?=$data->distributor_id == $row->distributor_id ? "selected" : null?>><?=$data->name?></option>
                     <?php } ?>
                   </select>
             </div>

             
              <div class="form-group">
              <label style="color:blue;" for="image">image*</label>
                   <?php if ($page == 'edit') { 
                   if ($row->image != null) { ?>
                       <div style="margin-bottom:4px;">
                       <img src="<?=site_url('image/product/'.$row->image)?>" style="width:100px;"></td>
                       </div>

                   <?php 
                   }
               } ?>
              <input type="file" name="image" id="image" class="form-control">
                 <small style="color:green;">(biarkan kosong jika image tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
              </div>
        

            <div class="form-group">
                  <button type="submit"  name="<?=$page?>" class="btn btn-primary"><i class="fa fa-paper-plane"></i> <?=$page?></button>
                   <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> reset</button>
               </div>
            <?php form_close()?>
            
          </div>
          </div>
            </div>  
         </div>
    </section>
   
         


   
  