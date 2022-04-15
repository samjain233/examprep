<?php
session_start();
if(!isset($_SESSION['dnt']) && isset($_SESSION['testid']) && isset($_SESSION['uname']))
{
$con=mysqli_connect('','','','');
$testid=$_SESSION['testid'];
$query1="SELECT `ID`, `NOF`, `CLASS`, `SUBJECT`, `SYL` FROM `info` WHERE `TEST`='$testid'";
$result1=mysqli_query($con,$query1);
$det=mysqli_fetch_array($result1);
$tid=$det[0];
$query2="SELECT `name` FROM `teaID` WHERE `ID`= '$tid'";
$result2=mysqli_query($con,$query2);
$det1=mysqli_fetch_array($result2);

if(isset($_REQUEST['back']))
{
    session_unset();
    session_destroy();
    echo "<script> location.href='index.php'; </script>";
}
if(isset($_REQUEST['test']))
{
    $_SESSION['dnt']=1;
    $uname=$_SESSION['uname'];
    $studnam="studtest3".$testid;
    $queryin="INSERT INTO `$studnam`(`name`) VALUES ('$uname')";
    mysqli_query($con,$queryin);
    echo "<script> location.href='stest.php'; </script>";
}
}
else
{
    echo "<script> location.href='stest.php'; </script>";
}
?>
<html>
    <head>
        <title>EXAMPREP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <style type="text/css">
        .style
            {
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <center><h1>TEST DETAILS</h1></center>
            </div>
        </div>
        
        <div class="container">
            <div class="jumbotron">
                <p class="style"><strong>TEST_ID : </strong><span id="testid"></span></p>
                <p class="style"><strong>CLASS : </strong><span id="class"></span></p>
                <p class="style"><strong>SUBJECT : </strong><span id="sub"></span></p>
                <p class="style"><strong>SYLLABUS : </strong><span id="syb"></span></p>
                <p class="style"><strong>NUMBER OF QUESTIONS : </strong><span id="noq"></span></p>
                <p class="style"><strong>TEACHER NAME : </strong><span id="tname"></span></p>
                <p class="style"><strong>STATUS : </strong>TEST IS GOING ON</p>
            </div>
        </div>
        <form method="post">
            <center><input type="submit" class="btn btn-success" value="START TEST" name="test"></center><br>
            <center><input type="submit" class="btn btn-primary" value="GO TO HOME PAGE" name="back"></center>
            
        </form>
        <script type="text/javascript">
            document.getElementById("testid").innerHTML="<?php echo $testid; ?>";
            document.getElementById("class").innerHTML="<?php echo $det[2]; ?>";
            document.getElementById("sub").innerHTML="<?php echo $det[3]; ?>";
            document.getElementById("syb").innerHTML="<?php echo $det[4]; ?>";
            document.getElementById("noq").innerHTML="<?php echo $det[1]; ?>";
            document.getElementById("tname").innerHTML="<?php echo $det1[0]; ?>";
        </script>
        
    </body>
</html>