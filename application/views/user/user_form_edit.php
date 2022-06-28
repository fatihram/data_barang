<section class="content-header">
      <h1>
        Users Edit
        <small> form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">User </a></li>
        <li><a href="<?=site_url('User')?>">Users</a></li>
      </ol>
    </section>





 <section class="content">
   

    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title"> Users Edit</h4>
      <div class="pull-right">
      <a href="<?=site_url('User')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
          <div class="row">
          <div class="col-md-4 col-md-offset-4">
           <form action="" method="post">
             
         
          
          
              <div class="form-group <?=form_error('username') ? 'has-error' : null ?> ">
               <input type="hidden" name="user_id" value="<?=$row->user_id?>">
              <label style="color:blue;" for="username">username*</label>
              <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>" class="form-control" placeholder="username" >
              <?=form_error('username')?>
              </div>

              <div class="form-group <?=form_error('name') ? 'has-error' : null?> ">
              <label style="color:blue;" for="name">name*</label>
              <input type="text" name="name" value="<?=$this->input->post('name') ?? $row->name?>" class="form-control" placeholder="name">
               <?=form_error('name')?>
              </div>

              <div class="form-group <?=form_error('password') ? 'has-error' : null?> ">
              <label style="color:blue;" for="password">password*</label>
              <input type="password" name="password"  value="<?=$this->input->post('password')?>" class="form-control" placeholder="password">
              <small style="color:red;">biarkan kosong jika tidak
              mau diganti</small>
               <?=form_error('password')?>
              </div>

              <div class="form-group <?=form_error('passconf') ? 'has-error' : null?> ">
              <label style="color:blue;" for="passconf">password konfirmasi*</label>
              <input type="password" name="passconf" value="<?=set_value('passconf');?>" class="form-control" placeholder="passconf">
               <small style="color:red;">biarkan kosong jika tidak
              mau diganti</small>
              <?=form_error('passconf')?>
              </div>


              <div class="form-group <?=form_error('level') ? 'has-error' : null?> ">
              <label style="color:blue;" for="level">level*</label>
               <select name="level" id="level"  class="form-control" >
                <option value="">-PILIH-</option>
                 <?= $level = $this->input->post('level') ?  $this->input->post('level') : $row->level ?>
               <option value="1" <?=$level == 1 ? "selected" : null?>>manager</option>
                 <option value="2" <?=$level  == 2 ? "selected" : null?>>admin</option>
               </select>
               <?=form_error('level')?>
              </div>


                <div class="form-group <?=form_error('address') ? 'has-error' : null?> ">
              <label style="color:blue;" for="address">Alamat*</label>
                <textarea name="address" id="address" cols="30" rows="10"  class="form-control" ><?=$this->input->post('address') ?? $row->address ?></textarea>
                <?=form_error('address')?>
              </div>

            
               <div class="form-group">
                  <button type="submit"  class="btn btn-primary"><i class="fa fa-paper-plane"></i> save</button>
                   <button type="reset" class="btn btn-warning"><i class="fa fa-undo"></i> reset</button>
               </>
          </form>
          </div>
          </div>
            </div>  
         </div>
    </section>
   
         


   
