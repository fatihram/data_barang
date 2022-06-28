<section class="content-header">
      <h1>
        Item
        <small> form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Item </a></li>
        <li><a href="<?=site_url('Rekam_medis')?>">Item</a></li>
      </ol>
    </section>





 <section class="content">
  
    <div class="box">
    <div class="box-header">
      <h4 style="color:blue;" class="box-title">Data Output Barcode dan qrcode</h4>
      <div class="pull-right">
      <a href="<?=site_url('Item')?>" class="btn btn-danger btn-xs"><i class="fa fa-undo">back</i></a>
      </div>
    </div>
      <div class="box-body">
           <label for="" style="color:blue;">barcode : </label>
          <?php
          $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
         echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
           ?>


             <br>
        <br>
             <label for="" style="color:blue;"> QR-code :</label>
         <?php
          $qrCode = new Endroid\QrCode\QrCode($row->barcode);
                 $qrCode->writeFile('image/QR-CODE/qr-'.$row->barcode.'.png');
           ?>
           <img src="<?=base_url('image/QR-CODE/qr-'.$row->barcode.'.png')?>" style="width:100px;"> 
           
            <br>
          <br>
            
            <label for="" style="color:blue;" >kode barcode dan qr code: </label>
             <?=$row->barcode?><br>
              <br>
              <label for="" style="color:blue;">nama : </label>
              <td><?=$row->name?></td>
          
              <br>
               <label for="" style="color:blue;">Kategori : </label>
             <td><?=$row->categori_name?></td>
              <br>
               <label for="" style="color:blue;">Unit : </label>
                <td><?=$row->unit_name?></td>
         
              <br>
               <label for="" style="color:blue;">price: </label>
               <td><?=$row->price?></td>
          
              <br>
         

  <br>
                   
                <div class="form-group">
                  <a href="<?=site_url('Item/print_data/'.$row->item_id)?>" class="btn btn-primary"><i class="fa fa-print"> Print / Download data barcode</i></a>
                   </div>
         
         </div>
    </section>
   
         


   
