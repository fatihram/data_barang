 <section class="content-header">
      <h1>
        Dashboard
        <small>control panel</small>
      </h1>
      <ol class="breadcrumb">
       <?php 
       date_default_timezone_set("asia/jakarta");
         $b=time();
         $hour = date("G",$b);
          if($hour>=0 && $hour<=11){
                  echo"|-----(Selamat pagi)-";
          }

           elseif ($hour>=12 && $hour<=14) {
                     echo"|-----(Selamat siang)-";
                
           }

               elseif ($hour>=15 && $hour<=17) {
                    echo"|-----(Selamat sore)-";
                
           }
                elseif ($hour>=17 && $hour<=18) {
                    echo"|-----(Selamat senja)-";
                
           }
                elseif ($hour>=19 && $hour<=23) {
                   echo"|-----(Selamat malam)-";
                
           }

           
          $date = date('(Y-m-d, H-i-s)----|'); 
            echo  "$date";
       
       ?>
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="<?=site_url('Dashboard')?>">dashboard</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$this->fungsi->count_distributor()?></h3>
              <p>DISTRIBUTOR</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="<?=site_url('Distributor')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>





  
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->fungsi->count_gudang()?></h3>
              <p>Data gudang</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <a href="<?=site_url('Gudang')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
             <h3><?=$this->fungsi->count_item()?></h3>
              <p>Data  barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="<?=site_url('Item')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



          
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$this->fungsi->count_user()?></h3>
              <p>Data users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=site_url('User')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


       </div> 
    </section>