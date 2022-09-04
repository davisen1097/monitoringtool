<?php
    $con = mysqli_connect("localhost" , "root" , "" , "testdb");
    $sql = " Select monitors_name from monitors";
    $res = mysqli_query($con, $sql) ;

?>


<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>

<body>

Select Monitor name:
    <select>
    <?php while ( $rows = mysqli_fetch_array($res)) ?>
        
    <option value ="<?php echo $rows['monitors_name'];?>"><?php echo $rows['monitors_name'];?></option>
    


    </select>


</body>
</html>