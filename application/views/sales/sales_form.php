<section class="content-header">
      <h1>
        Sales
        <small>add form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Sales barang</a></li>
        <li><a href="<?=site_url('Sales')?>">Sales</a></li>
      </ol>
    </section>



 <section class="content">
    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title"><?=$page?> Sales</h4>
      <div class="pull-right">
      <a href="<?=site_url('Kategori')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
          <div class="row">
          <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('Sales/proses')?>" method="post">

              <div class="form-group">
              <input type="hidden" name="id"  value="<?=$row->sales_id?>">
              <label style="color:blue;" for="name">name*</label>
              <input type="text" name="name" value="<?=$row->name?>" class="form-control" placeholder="name Sales" required>
              </div>


              <div class="form-group">
              <label style="color:blue;" for="kode_sales">kode sales*</label>
              <input type="text" name="kode_sales" value="<?=$row->kode_sales?>" class="form-control" placeholder="kode Sales" required>
              </div>

              <div class="form-group">
              <label style="color:blue;" for="gender"> jenis kelamin*</label>
                <select name="gender" id="gender" class="form-control">
                <option value="">-pilih-</option>
                <option value="L" <?=$row->gender == 'L' ? 'selected' : '' ?> >L</option>
                <option value="P" <?=$row->gender == 'P' ? 'selected' : '' ?> >P</option>
                </select>
              </div>



              <div class="form-group">
              <label style="color:blue;" for="alamat">alamat sales*</label>
              <input type="text" name="alamat" value="<?=$row->alamat?>" class="form-control" placeholder="alamat Sales" required>
              </div>


              <div class="form-group">
              <label style="color:blue;" for="handphone">no handphone sales*</label>
              <input type="text" name="handphone" value="<?=$row->handphone?>" class="form-control" placeholder="no hp Sales" required>
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
   
         


   
  