<?php
$value="none";
if(isset($_GET['value'])) $value=$_GET['value'];

if($value=='a'){
    echo "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>";
}
else if($value=='b'){
    echo "<option value='4'>4</option><option value='5'>5</option><option value='6'>6</option>";
}

?>