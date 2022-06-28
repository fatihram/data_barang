 <section class="content-header">
      <h1>
        Distributor
        <small>form data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Distributor barang</a></li>
        <li><a href="<?=site_url('Distributor')?>">Distributor</a></li>
      </ol>
    </section>



 <section class="content">
    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title"><?=$page?> Distributor</h4>
      <div class="pull-right">
      <a href="<?=site_url('Distributor')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
          <div class="row">
          <div class="col-md-4 col-md-offset-4">
            
            <?php echo form_open_multipart('Distributor/proses')?>

              <div class="form-group">
              <input type="hidden" name="id"  value="<?=$row->distributor_id?>">
              <label style="color:blue;" for="name">name*</label>
              <input type="text" name="name" value="<?=$row->name?>" class="form-control" placeholder="name Distributor" required>
              </div>

              <div class="form-group">
              <label style="color:blue;" for="phone">phone*</label>
              <input type="number" name="phone"  value="<?=$row->phone?>" class="form-control" placeholder="phone Distributor" required>
              </div>

              <div class="form-group">
              <label style="color:blue;" for="address">address*</label>
             <textarea name="address"  class="form-control" id="adress" cols="10" rows="5"  placeholder="address Distributor" required><?=$row->address?></textarea>
              </div>

              <div class="form-group">
              <label style="color:blue;" for="description">description*</label>
               <textarea name="description"  class="form-control" id="adress" cols="10" rows="5"   placeholder="description" ><?=$row->description?></textarea>
              </div>

              <!-- <div class="form-group">
              <label  style="color:blue;" for="image" >image</label>
                <?php if ($page == 'edit') {
                             if($row->image != null) { ?>
                                   <div>
                                       <img src="<?=base_url('image/distributor/'.$row->image)?>" style="width:70%;">
                                  </div>
                              <?php   
                                
                             }
                }
                ?>

              <input type="file" name="image" class="form-control" >
               <small style="color:blue;">(biarkan kosong jika image tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
              </div> -->



        

               <div class="form-group">

                  <button type="submit"  name="<?=$page?>" class="btn btn-primary"><i class="fa fa-paper-plane"></i> <?=$page?></button>
                   <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> reset</button>
               </div>
         <?php echo form_close() ?>
          </div>
          </div>
            </div>  
         </div>
    </section>
   
         


   
  