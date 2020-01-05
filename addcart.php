<?php


session_start();
           // echo "".$_SESSION['username'];
           //  echo"". $_SESSION['pass'];
?>


<?php
///establishing a connection to the database and setting the error mode to exception
try{
    $conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');
    echo "<script>console.log('database connected');</script>";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo "<script>window.alert('database connection error');</script>";
}

//if this page is reloaded for delete operation then 
//isset($_GET['delete']) will return true and delete operation will be performed.


if(isset($_GET['addid'])){
    $addid=$_GET['addid'];

    try{
        $itemdetails="select * from item where id=$addid";
        $table=$conn->query($itemdetails)->fetchAll();
        $row=$table[0];
        
        $query="insert into mycart(pid,name,address,price) values($row[0],'$row[1]','$row[2]',$row[3])";
        //echo $query;
        $conn->exec($query);
        
            echo "<script>window.alert('chart add successful.');</script>";
    
    }
    catch(PDOException $ex){
        echo "<script>window.alert('add error');</script>";
    }
}
///for corfirmation order
if(isset($_GET['orderid'])){
    $addid=$_GET['orderid'];

    try{
        $itemdetails="select * from mycart where 1";
        $table=$conn->query($itemdetails)->fetchAll();
        $row=$table[0];
        
//        $query="insert into mycart(pid,name,address,price) values($row[0],'$row[1]','$row[2]',$row[3])";
//        //echo $query;
//        $conn->exec($query);
        
            echo "<script>window.alert('confirm successful.');</script>";
    
    }
    catch(PDOException $ex){
        echo "<script>window.alert('confirm error');</script>";
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Show Data Page</title>
    <link rel="stylesheet" href="css/showdata.css">
</head>

<body>
    <div class="overlay">
        <h2 style="text-align:center;">Item Data</h2>
        <br>
        <br>
        <table style="width:100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Price</th>

                </tr>
            </thead>

            <tbody>
                <?php                    
                ///showing the whole database table here
                try{
                    $sqlquery="SELECT * FROM item";
                    $object=$conn->query($sqlquery);
                    
                    if($object->rowCount() == 0){ /// 0 meaning no data exists in the database
                        ?>
                <tr>
                    <td colspan="6" style="text-align:center;">
                        No Data Found!!!
                    </td>
                </tr>
                <?php  
                    }
                    else{
                        ///meaning data exists in the database table
                        $table=$object->fetchAll();
                        foreach($table as $row){
                            ?>
                <tr>
                    <td><?php echo $row[0]  ?></td>
                    <td><?php echo $row[1]  ?></td>
                    <td><?php echo $row[2]  ?></td>
                    <td><?php echo $row[3]  ?></td>

                    <td>
                        <!-- dynamically creating events for each button with different paramenters -->
                        <input type="button" value="Add" class="button" id="add" onclick="addrow(<?php echo $row[0]  ?>);">



                    </td>
                </tr>
                <?php
                        }
                    }
                    
                }
                catch(PDOException $e){
                    echo "<script>window.alert('table show error');</script>";
                }
                ?>
            </tbody>
        </table>



        <div class="cart">
            <h1 style="text-align: center"><br>My Cart</h1>
            <br>
            <table style="width:100%;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Delete Item</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
				///establishing a connection to the database and setting the error mode to exception
                try{
                    $conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');
                    echo "<script>console.log('database connected');</script>";
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $ex){
                    echo "<script>window.alert('database connection error');</script>";
                }
                
				///if this page is reloaded for delete operation then 
				///isset($_GET['delete']) will return true and delete operation will be performed.
				if(isset($_GET['delete'])){
					$addid=$_GET['delete'];
					
					try{
						$delquery="DELETE FROM mycart WHERE cno=$addid";
						$conn->exec($delquery);
						echo "<script>window.alert('deletion successful');</script>";
					}
					catch(PDOException $ex1){
						echo "<script>window.alert('deletion error');</script>";
					}
				}
        
        
                
//					if($_SERVER['REQUEST_METHOD']=="POST"){
//					try{
//						if(isset($_POST['sname']) && isset($_POST['saddress']) && isset($_POST['sprice']) && isset($_POST['sid'])){
//							//$addquery=;
//
//							//$conn->exec($addquery);
//							echo "<script>console.log('add successful.');</script>";
//						}
//						else{
//							echo "<script>window.alert('invalid add operation.');</script>";
//						}
//					}
//					catch(PDOException $ex){
//						echo "<script>window.alert('add error');</script>";
//					}
//				}
			
                    
                ///showing the whole database table here
                try{
                    $sqlquery="SELECT * FROM mycart";
                    $object=$conn->query($sqlquery);
                    
                    if($object->rowCount() == 0){ /// 0 meaning no data exists in the database
                        ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">
                            No Data Found!!!
                        </td>
                    </tr>
                    <?php  
                    }
                    else{
                        ///meaning data exists in the database table
                        $table=$object->fetchAll();
                        foreach($table as $row){
                            ?>
                    <tr>

                        <td><?php echo $row[1]  ?></td>
                        <td><?php echo $row[2]  ?></td>
                        <td><?php echo $row[3]  ?></td>
                        <td><?php echo $row[4]  ?></td>

                        <td>

                            <!-- dynamically creating events for each button with different paramenters -->


                            <input type="button" value="Delete" class="button" onclick="deleterow(<?php echo $row[0]  ?>);">



                        </td>

                    </tr>

                    <?php
                        }
                    }
                    
                }
                catch(PDOException $e){
                    echo "<script>window.alert('table show error');</script>";
                }
                ?>
                </tbody>


                <div class="confirm">
                    <table style="width:100%;">

                        <hr>
                        <tbody>
                           
                            <input type="submit" value="confirm" class="button" onclick="confirmlist();">
                            <input type="submit" value="payment" class="button" onclick="window.location.href='http://localhost/prj/page1.php'">

                        </tbody>
                    </table>
                </div>
            </table>

        </div>
       

        <script>
            function deleterow(cno) {
                ///reloading this page again with an extra parameter passed through get method named "delete"
                // window.alert(id);
                location.assign('addcart.php?delete=' + cno);
            }

            function addrow(id) {
                ///loading the update.php page to perform the update operation
                // window.alert(id);
                location.assign('addcart.php?addid=' + id);
            }
              function confirmlist(id) {
                ///loading the update.php page to perform the update operation
                // window.alert(id);
                   alert("confirmation successfull");
                location.assign('addcart.php?order=' + id);
            }
            
            
            function ajaxfn(){
                var ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','ajaxserve.php?delete=' + cno.value);
                ajaxreq.open('GET','ajaxserve.php?addid=' + id.value);
                
                ajaxreq.onreadystatechange=function (){
                    
                    if(this.readyState===XMLHttpRequest.DONE && this.status==200){
                        var tablebody=document.getElementById('tablebody');
                        tablebody.innerHTML=ajaxreq.responseText;
                    }
                };
                
                ajaxreq.send();
            }
                
        </script>
    </div>
</body>

</html>