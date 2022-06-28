<?php 

header("content-type:application/octat-stream/");

header("content-disposition:attachment; filename=$title.xls");

header("pragma: no-cache");

header("expires:0");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>export</title>
</head>
<body>
    <h3 style="text-center">laporan data  stock in: <?= date('Y-m-d')?></h3>
<table border="1" width="10%">
                <thead>
                <tr>
                <th>No</th>
                   <th>kode barang</th>
                       <th>nama barang</th>
                              <th>qty</th>
                                <th>tanggal data di input</th>
                                <th>type</th>
                                <th>detail</th>
                </tr>
                    </thead>
                     <?php $no=1; 
                    foreach ($row->result() as $key => $data) { ?> 
                        <tr>
                        <td><?=$no++?></td>
                         <td><?=$data->barcode?></td>
                             <td><?=$data->item_name?></td>
                             <td><?=$data->qty?></td>
                                <td><?=$data->date?></td>
                                <td><?=$data->type?></td>
                                <td><?=$data->detail?></td>
                        </tr>
                    <?php } ?>
              
                    
              </table>
  
</body>
</html>
   
          
   
          