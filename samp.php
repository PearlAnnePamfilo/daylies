 <!--link to db-->
//<?php include('include/config.php'); ?>
<?php 

        session_start();

    if(isset($_SESSION['userlogin'])){
        header("Location: login.php");
    }


?>
<html>
    <head>
        <title> My Daylies </title>
        <link href="css/main.css" rel="stylesheet" type="text/css">   
    </head>
    <body>
        
        <!--Header-->
        <?php include('templates/header.php'); ?>


        <!--CONTENT-->
        <h1>Welcome to my daylies!</h1>

        <!--data retrieval-->
        <?php

        $query = mysqli_query($sql, "SELECT * FROM project");
        while($row = mysqli_fetch_assoc($query))
        {
            $Name = $row['Name'];
        }?>
        <h1><?php echo $Name; ?></h1>


         <!--Footer-->
        <?php include('templates/footer.php'); ?>
    </body>
</html>
