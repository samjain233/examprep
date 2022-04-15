<?php
session_start();
$con=mysqli_connect('','','','');
$_SESSION['temp']="0";
$_SESSION['temi']="0";

if(isset($_REQUEST['button']))
{
    $sid=$_REQUEST['id'];
    $query1="SELECT `TEST` FROM `testID` WHERE `TEST`='$sid'";
    $result1=mysqli_query($con,$query1);
    if(mysqli_num_rows($result1)>0)
    {
        $query2="SELECT `TEST`, `start` FROM `testID` WHERE `TEST`='$sid'";
        $result2=mysqli_query($con,$query2);
        $row=mysqli_fetch_array($result2);
        if($row[1]==2)
        {
            $_SESSION['testid']=$sid;
            echo "<script> location.href='sstart.php'; </script>";
        }
        if($row[1]==3)
        {
            $studnam="studtest3".$sid;
            $uname=$_REQUEST['username'];
            $query3="SELECT `name` FROM `$studnam` WHERE `name`='$uname'";
            $result3=mysqli_query($con,$query3);
            if(mysqli_num_rows($result3)>0)
            {
                $_SESSION['testid']=$sid;
                $_SESSION['uname']=$uname;
                echo "<script>location.href='algiven.php'</script>";
            }
            else
            {
                $_SESSION['testid']=$sid;
                $_SESSION['ques']=1;
                $_SESSION['uname']=$uname;
                echo "<script>location.href='details.php'</script>";
            }
        }
         if($row[1]==4)
        {
            $_SESSION['testid']=$sid;
            echo "<script> location.href='sfinished.php'; </script>";
        }
    }
    else
    {
        $_SESSION['testid']=$sid;
        echo "<script> location.href='wrongid.php'; </script>";
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <title>EXAMPREP</title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
        
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="passwordteacher.php">TEACHER LOGIN</a>
                </li>
            </ul>
        </nav>
        
        <div class="container">
            <div class="jumbotron">
                <H1>EXAMPREP</H1>
            </div>
        </div>
        
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="base1.jpg" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">NAME AND ID</h4>
                    <form method="post">
                        <label for="a">NAME : </label>
                        <input type="text" name="username" placeholder="enter your name here" required class="input margin" id="a">
                        <label for="b">TEST ID : </label>
                        <input type="text" name="id" autocomplete="off" placeholder="enter the test ID" required class="input margin" id="b">
                        <input type="submit" value="GIVE TEST" CLASS="btn btn-primary margin" name="button">
                    </form>
                </div>
            </div>
        </div>
  </body>
</html>