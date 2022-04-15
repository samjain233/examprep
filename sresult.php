<?php
session_start();
$con=mysqli_connect('','','','');
$testid=$_SESSION['testid'];
$studnam="studtest3".$testid;
$query="SELECT `ID`, `NAME`, `TOTAL` FROM `$studnam`";
$result = mysqli_query($con,$query);
?>
<html>
    <head>
        <title>EXAMPREP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>STUDENT NAME</th>
                <th>MARKS OBTAINED</th>
            </tr>
        </thead>
            <?php
                while($row=mysqli_fetch_array($result))
                {
            ?>
            <tr>
                <th scope="row"><?php echo $row[0]; ?></th>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
    
</html>