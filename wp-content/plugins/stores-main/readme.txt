$table = "";
 
 $table .=   "<table width='100%' border='1px'>";
 $table .=     "<thead>";
 $table .=       "<th>Nombre</th>";
 $table .=       "<th>Dirección</th>";
 $table .=       "<th>Latitud</th>";
 $table .=       "<th>Longitud</th>";
 $table .=      "</thead>";


     foreach($stores as $store){

         $table .= "<tr>";
         $table .= "<td> $store->name </td>";
         $table .= "<td> $store->address </td>";
         $table .= "<td> $store->latitud </td>";
         $table .= "<td> $store->longitud </td>";

         $table .= "</tr>";

   
     }


 $table .=    "</table>";

 return $table;
 


  
<?php  ob_start(); ?>


  <form action="">
    <div class="form-control">
        <label for="">Nombre</label>
        <input type="text" name="" id="">
    </div>
    <div class="form-control">
        <label for="">Latitud</label>
        <input type="text" name="" id="">
    </div>
    <div class="form-control">
        <label for="">Longitud</label>
        <input type="text" name="" id="">
    </div>
   
  </form>


<?php 
$output = ob_get_contents();
ob_end_clean(); 
?>