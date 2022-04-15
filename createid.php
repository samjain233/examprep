<?php
session_start();
$con=mysqli_connect('','','','');
if(!isset($_SESSION['Z']))
{
if(isset($_REQUEST['cbtn']))
{
    echo "<script> location.href='hometeacher.php'; </script>";
}
if(isset($_REQUEST['btn']))
{
    $testid=$_REQUEST['ttid'];
    $_SESSION['testid']=$testid;
    $query="SELECT `TEST` FROM `testID` WHERE `TEST`='$testid'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $check=1;
    }
    else
    {
        $_SESSION['Z']=1;
        $qid=$_SESSION['tid'];
        $query2="INSERT INTO `testID`(`ID`, `TEST`,`start`) VALUES ('$qid','$testid','2')";
        $result2=mysqli_query($con,$query2);
        echo "<script> location.href='tsum.php'; </script>";
    }
}
}
else
{
    echo "<script> location.href='tsum.php'; </script>";
}

?>
<html>
    <head>
        <title>EXAMPREP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="jumbotron">
            <h1>CREATE TEST ID</h1>
        </div>
        <div class="container">
        <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>REQUEST!</strong><p>please do not use special characters(#,$,@,!,%,^,*,etc...) while making test_ID .Use only numbers and letters .For ex:- <span><strong>"34C7"</strong></span>.</p>
        </div>
        </div>
        <div class="container">
            <div class="jumbotron">
                <div class="alert alert-danger alert-dismissible fade show" hidden id="p" >
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>TEST ID ALREADY TAKEN!</strong><P>this test id is already taken by other teacher.</P>
                </div>
                <form method="post">
                    <div class="form-group">
                        <p>TEST_ID</p>
                        <input type="text" id="ttid" class="form-control" name="ttid" required alt="ENTER TEST ID">
                        <br>
                        <input type="submit" class="btn btn-success" style="width:150px;" name="btn" value="GO">
                    </div>
                </form>
                <form method="post">
                    <input type="submit" class="btn btn-warning" name="cbtn" value="CANCEL EXAM">
                </form>
            </div>
        </div>
        <script type="text/javascript">
            var x="<?php echo $check; ?>";
            if(x==1)
                {
                    document.getElementById("p").hidden=false;
                }
        </script>
    </body>
</html>