<?php 
include_once '../model/db_config.php'; 
$query="select * from categoryType";
$execute=mysqli_query($link,$query);
if($execute->num_rows > 0 ){
    while($row=$execute->fetch_assoc()){
        echo '<tr>';
            echo '<td>'.$row['cat_type_name'].'</td>';
            echo '<td>'.$row['cat_type_code'].'</td>';
            echo '<td>'.'Edit'.'</td>';
            echo '<td>'.'Delete'.'</td>';
        echo '</tr>';
     }
    }
?> 