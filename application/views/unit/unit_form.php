<section class="content-header">
      <h1>
        Unit
        <small>add form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Unit barang</a></li>
        <li><a href="<?=site_url('Unit')?>">Unit</a></li>
      </ol>
    </section>



 <section class="content">
    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title"><?=$page?> Unit</h4>
      <div class="pull-right">
      <a href="<?=site_url('Unit')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
          <div class="row">
          <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('Unit/proses')?>" method="post">

              <div class="form-group">
              <input type="hidden" name="id"  value="<?=$row->unit_id?>">
              <label style="color:blue;" for="name">name*</label>
              <input type="text" name="name" value="<?=$row->name?>" class="form-control" placeholder="name unit" required>
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
   
         


   
  