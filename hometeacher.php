<?php
session_start();
if(!isset($_SESSION['tid']))
{
echo "<script> location.href='passwordteacher.php'; </script>";
}
else
{
    $name=$_SESSION['tname'];
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
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
            </ul>
        </nav>
        
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="base0.jpg" >
                <div class="card-body">
                    <h4 class="card-title margin">WELCOME <span id="a"></span></h4>
                    <a href="createid.php">
                    <input type="button" value="CREATE TEST" class="btn btn-primary">
                    </a>
                    <a href="enterid.php">
                    <input type="button" value="VIEW RESULTS" class="btn btn-primary">
                    </a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var x="<?php echo $name; ?>";
            document.getElementById("a").innerHTML=x;
        </script>
    </body>
</html>