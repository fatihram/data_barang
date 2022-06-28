<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
</head>
<body>
    <h3 style="text-center">laporan data  : <?= date('Y-m-d')?></h3>
<table border="1" width="10%">
                <thead>
                <tr>
                <th>nama</th>
                   <th>Barcode</th>
                       <th>nama barang</th>
                            <th>kategori barang</th>
                              <th>price</th>
                                <th>unit</th>
                                  <th>stock</th>
                                   <th>gudang</th>
                                      <th>nama distributor</th> 
                </tr>
                    </thead>
                     <?php $no=1; 
                    foreach ($row->result() as $key => $data) { ?> 
                        <tr>
                        <td><?=$no++?></td>
                         <td><?=$data->barcode?></td>
                          <td><?=$data->name?></td>
                           <td><?=$data->categori_name?></td>
                           <td><?=$data->price?></td>
                             <td><?=$data->unit_name?></td>
                              <td><?=$data->stock?></td>
                               <td><?=$data->gudang_name?></td>
                                <td><?=$data->distributor_name?></td>
                        </tr>
                    <?php } ?>
              </table>




              <br>
<p>Jakarta,<?php $date = date('Y-m-d'); 
                           echo  "$date";  ?></p>
<br>
Direktur,
<br><br><br><br>
<u>Fatih</u>
<br>
<p>NIM 19207064</p>

  <script type="text/javascript">
  window.print()
</script>
</body>
</html>
   
          