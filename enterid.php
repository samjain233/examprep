<?php
session_start();
$con=mysqli_connect('','','','');
if(isset($_SESSION['tid']))
{
if(isset($_REQUEST['cbtn']))
{
    echo "<script> location.href='hometeacher.php'; </script>";
}
if(isset($_REQUEST['btn']))
{
    $testid=$_REQUEST['ttid'];
    $qid=$_SESSION['tid'];
    $query="SELECT `TEST` FROM `testID` WHERE `TEST`='$testid' AND `ID`='$qid'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['testid']=$testid;
        echo "<script> location.href='sresult.php'; </script>";
    }
    else
    {
        $check=1;
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
    </head>
    <body>
        <div class="jumbotron">
            <h1>ENTER TEST ID</h1>
        </div>
        <div class="container">
            <div class="jumbotron">
                <div class="alert alert-danger alert-dismissible fade show" hidden id="p" >
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>WRONG TEST ID!</strong><P>this test id doesn't exists or belongs to somebody else.</P>
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