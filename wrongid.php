<?php
session_start();
$testid=$_SESSION['testid'];
if(isset($_REQUEST['btn']))
{
    session_unset();
    session_destroy();
    echo "<script> location.href='index.php'; </script>";
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
        <div class="container">
            <div class="jumbotron">
                <center><h1>YOU ENTERED A WRONG TEST_ID</h1></center>
                <center><h2>please check your test id.</h2></center>
            </div>
        </div>
        <div class="container">
            <div class="jumbotron">
                <center><h1>TEST_ID</h1></center>
                <center><h1 id="sid"></h1></center>
            </div>
        </div>
        <form method="post">
            <center><input type="submit" class="btn btn-primary" name="btn" value="BACK TO HOME PAGE"></center>
        </form>
        <script type="text/javascript">
            var x="<?php echo $testid; ?>";
            document.getElementById("sid").innerHTML=x;
        </script>
    </body>
</html>