 <section class="content-header">
      <h1>
       Gudang
        <small>form <?=$page?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">gudang </a></li>
        <li><a href="<?=site_url('Gudang')?>">Gudang</a></li>
      </ol>
    </section>



 <section class="content">
    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title"><?=$page?> data Gudang</h4>
      <div class="pull-right">
      <a href="<?=site_url('Gudang')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
          <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <form action="<?=site_url('Gudang/proses')?>" method="post">
              
                     <div class="form-group">
                       <input type="hidden" name="id"  value="<?=$row->gudang_id?>"  >
                     <label for="name">nama gudang**</label>
                     <input type="text" class="form-control" value="<?=$row->name?>" name="name" placeholder="masukan nama gudang" required>
                     </div>

                      <div class="form-group">
                     <label for="kode_gudang">Kode gudang**</label>
                     <input type="text" class="form-control" value="<?=$row->kode_gudang?>"  name="kode_gudang" placeholder="masukan kode gudang" required>
                     </div>
              
              
               <div class="form-group">
                  <button type="submit"  name="<?=$page?>" class="btn btn-primary"><i class="fa fa-paper-plane"></i> <?=$page?></button>
                   <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> reset</button>
               </div>
             </form>
          </div>
          </div>
            </div>  
         </div>
    </section>
   
         


   
  