<?php
session_start();
$con=mysqli_connect('','','','');
if(isset($_REQUEST['btn']))
{
    $testid=$_REQUEST['ttid'];
    $query="SELECT `TEST` FROM `testID` WHERE `TEST`='$testid'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $check=1;
    }
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
            <h1>CREATE TEST ID</h1>
        </div>
        <div class="container">
            <div class="jumbotron">
                <div class="alert alert-danger alert-dismissible fade show" hidden id="p" >
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>ID ALREADY EXISTS!</strong><P>the id you had entered id already taken.</P>
                </div>
                <form method="post">
                    <div class="form-group">
                        <p>TEST_ID</p>
                        <input type="text" id="ttid" class="form-control" name="ttid" required alt="ENTER TEST ID">
                        <input type="submit" class="btn btn-success" name="btn" value="GO" style="float:right;">
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            var x="<?php echo $check; ?>";
            if(x==1);
            {
                document.getElementById("p").hidden=false;
                
            }
            else
            {
                document.getElementById("p").hidden=true;
                    
            }
        </script>
    </body>
</html>