<!DOCTYPE html>

<html>
    <body>
        
        <div>
<input type="search" id="search" name="search" placeholder="Search Here">
<input type="button" id="searchbtn" value="Search">
        </div>
        
        <table style="width:100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                <?php
                try{
                    $conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $ex){
                    echo "<script>window.alert('db connection errror')</script>";
                }
                
                $sqlquery="Select * from student";
                try{
                    $object=$conn->query($sqlquery);
                    $table=$object->fetchAll();
                    
                    foreach($table as $row){
                        ?>
                            <tr>
                                <td><?php echo $row[0] ?></td>    
                                <td><?php echo $row[1] ?></td>    
                                <td><?php echo $row[2] ?></td>    
                                <td><?php echo $row[3] ?></td>    
                                <td><?php echo $row[4] ?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $e){
                    echo "<script>window.alert('query errror')</script>";
                }
                ?>
            </tbody>
        </table>
        
        <script>
            var searchdata=document.getElementById('search');
            
            var searchbtn=document.getElementById('searchbtn');
            searchbtn.addEventListener('click',ajaxfn);
            
            function ajaxfn(){
                var ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','ajaxserve.php?search='+searchdata.value);
                
                ajaxreq.onreadystatechange=function (){
                    
                    if(this.readyState===XMLHttpRequest.DONE && this.status==200){
                        var tablebody=document.getElementById('tablebody');
                        tablebody.innerHTML=ajaxreq.responseText;
                    }
                };
                
                ajaxreq.send();
                
            }
        </script>
        
    </body>

</html>
