<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="css/insert.css">
</head>
<body>
   <div class="overlay">
    <form action="insert.php" method="post">   
        Id: <input type="text" name="sid"><br/>
        Name: <input type="text" name="sname"><br/>
        Details: <textarea id="saddress" name="saddress"></textarea><br/>
        Price: <input type="text" name="sprice">
        
        
        <br>
        <input type="submit" class="button" value="Add Data">
    </form>
    
    <?php
        if($_SERVER['REQUEST_METHOD']=="GET"){
            /// nothing to do
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            $sid=$sname=$saddress="";
            
            if(isset($_POST['sid'])) $sid=$_POST['sid'];
            if(isset($_POST['sname'])) $sname=$_POST['sname'];
          
            if(isset($_POST['saddress'])) $saddress=$_POST['saddress'];
            if(isset($_POST['sprice'])) $sprice=$_POST['sprice'];
            
            try{
                $conn=new PDO("mysql:host=localhost;dbname=onlinefood",'root','');
                echo "<script>console.log('connection successful');</script>";
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "<script>window.alert('connection error');</script>";
            }
            
            try{
                $sqlquery="INSERT INTO item VALUES ($sid, '$sname','$saddress','$sprice')";

                $conn->exec($sqlquery);
                echo "<script>window.alert('insertion successful');</script>";
            }
            catch(PDOException $e){
                echo "<script>window.alert('insertion error');</script>";
            }
            
            
        }
    
    ?>
    
    <script>
            
            function ajaxfn(){
                var ajaxreq=new XMLHttpRequest();
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