<?php
session_start();
if(isset($_REQUEST['btn']))
{
    $con=mysqli_connect('','','','');
    $tid=$_POST['TID'];
    $tpass=$_POST['TPASS'];
    
    $query="SELECT `ID`, `password`, `name` FROM `teaID` WHERE `ID`= '$tid'";
    if($run = mysqli_query($con,$query))
    {
    $row= mysqli_fetch_array($run);
    if($tpass==$row[1])
    {
        $_SESSION['tid']=$tid;
        $_SESSION['tname']=$row[2];
        echo "<script> location.href='hometeacher.php'; </script>";
    }
    else
    {
        $_SESSION['temp']="1"; 
    }
    }
    else
    {
        $_SESSION['temi']="1"; 
    }
}
?>
<html>
    <head>
        <title>EXAMPREP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">BACK</a>
                </li>
            </ul>
        </nav>
        
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="base0.jpg" >
                <div class="card-body">
                    <h4 class="card-title margin">ENTER YOUR ID AND PASSWORD</h4>
                    <div class="alert alert-danger alert-dismissible fade show" hidden id="p" >
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>WRONG ID OR PASSWORD!</strong> <P>you entered an incorrect ID or password</P>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show" hidden id="i" >
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>WRONG ID OR PASSWORD!</strong> <P>you entered an incorrect ID or password</P>
                    </div>
                    <form method="post">
                        <input type="text" name="TID" placeholder="enter your ID here" required class="input margin">
                        <input type="password" name="TPASS" placeholder="enter your PASSWORD here" required class="input margin">
                        <input type="submit" name="btn" value="ENTER" CLASS="btn btn-primary margin" id="z">
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            if("<?php echo $_SESSION['temp']; ?>"==1)
                {
                    document.getElementById("p").hidden=false;
                }
            if("<?php echo $_SESSION['temi']; ?>"==1)
                {                    
                    document.getElementById("i").hidden=false;
                }
        </script>
    </body>
</html>