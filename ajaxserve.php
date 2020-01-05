<?php

$searchval="";
if(isset($_GET['search'])) $searchval=$_GET['search'];

try{
    $conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo "<script>window.alert('db connection errror')</script>";
}

$searchquery="SELECT * FROM item WHERE name LIKE '%$searchval%'";
try{
    $object=$conn->query($searchquery);
    if($object->rowCount() == 0){
        echo "<tr><td colspan='5' style='text-align:center;'>No Data Found</td></tr>";
    }
    else{
        $tablecode="";
        $table=$object->fetchAll();
        foreach($table as $row){
            $tablecode.="<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
        }
        
        echo $tablecode;
    }
}
catch(PDOException $ex1){
    echo "<script>console.log('search error')</script>";
}



?>