<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>export pdf</title>
</head>
<body>
    <h3 style="text-center">laporan data stock in  : <?= date('Y-m-d')?></h3>
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




              <br>
<p>Jakarta,<?php $date = date('Y-m-d'); 
                           echo  "$date";  ?></p>
<br>
Direktur,
<br><br><br><br>
<u>fatih<u>
<br>
<p>Nim 19207064</p>

  
</body>
</html>
   
          