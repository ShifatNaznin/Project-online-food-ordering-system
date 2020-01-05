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
                    <th>Update/Delete</th>
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
					$id=$_GET['delete'];
					
					try{
						$delquery="DELETE FROM item WHERE id=$id";
						$conn->exec($delquery);
						echo "<script>window.alert('deletion successful');</script>";
					}
					catch(PDOException $ex1){
						echo "<script>window.alert('deletion error');</script>";
					}
				}
				
				///if this page is reloaded from update.php page to perform update operation then
				///the request method will be post and we will receive the data from update.php page by accessing $_POST array.
				if($_SERVER['REQUEST_METHOD']=="POST"){
					try{
						if(isset($_POST['sname']) && isset($_POST['saddress']) && isset($_POST['sprice']) && isset($_POST['sid'])){
							$updatequery="UPDATE item SET name='".$_POST['sname']."', address='".$_POST['saddress']."',price='".$_POST['sprice']."' WHERE id=".$_POST['sid'];

							$conn->exec($updatequery);
							echo "<script>console.log('update successful.');</script>";
						}
						else{
							echo "<script>window.alert('invalid update operation.');</script>";
						}
					}
					catch(PDOException $ex){
						echo "<script>window.alert('update error');</script>";
					}
				}
                    
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
                                <script>
                                function ajaxfn(){
                var ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','ajaxserve.php?delete='+id.value);
                ajaxreq.open('GET','ajaxserve.php?update='+id.value);
                
                ajaxreq.onreadystatechange=function (){
                    
                    if(this.readyState===XMLHttpRequest.DONE && this.status==200){
                        var tablebody=document.getElementById('tablebody');
                        tablebody.innerHTML=ajaxreq.responseText;
                    }
                };
                
                ajaxreq.send();
                
            }
                                
                                </script>
                                
                                <td>
									<!-- dynamically creating events for each button with different paramenters -->
                                    <input type="button" value="Update" class="button" onclick="updatedata(<?php echo $row[0]  ?>);">
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
        </table>
       
        
        <script>
            function deleterow(id){
				///reloading this page again with an extra parameter passed through get method named "delete"
                location.assign('showdata.php?delete='+id);
            }
            
            function updatedata(id){
				///loading the update.php page to perform the update operation
                location.assign('update.php?uid='+id);
            }
               function ajaxfn(){
                var ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','ajaxserve.php?delete='+id.value);
                ajaxreq.open('GET','ajaxserve.php?update='+id.value);
                
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