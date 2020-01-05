<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="css/update.css">
</head>

<body>
    <div class="overlay">
        <?php
        $updateid=-1;

        if(isset($_GET['uid'])) $updateid=$_GET['uid'];

        try{
            $conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');
            echo "<script>console.log('database connected');</script>";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex){
            echo "<script>window.alert('database connection error');</script>";
        }


        try{
            $searchquery="SELECT * FROM item WHERE id=$updateid";
            $object=$conn->query($searchquery);
            if($object->rowCount() == 1){
                $table=$object->fetchAll();
                ?>
        <form action='showdata.php' method="post">
            ID: <input type="text" name="sid" value="<?php echo $table[0][0] ?>" readonly> <br />

            Name: <input type="text" name="sname" value="<?php echo $table[0][1] ?>"> <br />

            Address: <textarea id='saddress' name="saddress"><?php echo $table[0][2] ?></textarea> <br />
            
            Price: <input type="text" name="sprice" value="<?php echo $table[0][3] ?>"> <br />

            <input type="submit" class="button" value="Update">
        </form>
        <?php
            }
            else{
				///if no data is found then no update operation is needed and again returning back to showdata.php page 
                echo "<script>location.assign('showdata.php');</script>";
            }

        }
        catch(PDOException $ex){
            echo "<script>location.assign('showdata.php');</script>";
        }
        ?>
    </div>
</body>

</html>