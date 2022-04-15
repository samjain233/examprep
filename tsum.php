<?php
if(!isset($_SESSION['Y']))
{
session_start();
$con=mysqli_connect('','','','');
$testid=$_SESSION['testid'];
$tabnam="stu23i".$testid."pjk34";
if(isset($_REQUEST['btn']))
{
    $query="CREATE TABLE $tabnam (questionnum int NOT NULL,question varchar(1000),option1 varchar(500),option2 varchar(500),option3 varchar(500),option4 varchar(500),option5 varchar(500),value int,marks int,PRIMARY KEY (questionnum));";
    $query2="ALTER TABLE $tabnam MODIFY question VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $query3="ALTER TABLE $tabnam MODIFY option1 VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $query4="ALTER TABLE $tabnam MODIFY option2 VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $query5="ALTER TABLE $tabnam MODIFY option3 VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $query6="ALTER TABLE $tabnam MODIFY option4 VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $query7="ALTER TABLE $tabnam MODIFY option5 VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci;";
    mysqli_query($con,$query);
    mysqli_query($con,$query2);
    mysqli_query($con,$query3);
    mysqli_query($con,$query4);
    mysqli_query($con,$query5);
    mysqli_query($con,$query6);
    mysqli_query($con,$query7);
    
    
    $id=$_SESSION['tid'];
    $nof=$_REQUEST['noques'];
    $nom=$_REQUEST['nom'];
    $class=$_REQUEST['c'];
    $sub=$_REQUEST['sb'];
    $sy=$_REQUEST['sy'];
    $queryi="INSERT INTO `info`(`ID`, `TEST`, `NOF`, `NOM`, `CLASS`, `SUBJECT`, `SYL`) VALUES ('$id','$testid','$nof','$nom','$class','$sub','$sy')";
    mysqli_query($con,$queryi);
    $_SESSION['Y']=1;
    
    echo "<script> location.href='teacher.php'; </script>";
}
if(isset($_REQUEST['btnc']))
{
    session_unset();
    session_destroy();
    echo "<script> location.href='index.php'; </script>";
    $queryd="DELETE FROM `testID` WHERE TEST = '$testid' ";
    mysqli_query($con,$queryd);
}
}
else
{
    echo "<script> location.href='teacher.php'; </script>";
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
            <h1>EXAM DETAILS</h1>
        </div>
        <div class="container">
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>please make sure to note down the test id for future referance.</p>
            </div>
        <div class="jumbotron">
        <form method="post">
            <div class="form-group">
            <p>NO. OF QUESTIONS</p>
            <input type="text" id="noques" class="form-control" name="noques" required alt="ENTER NO. OF QUESTIONS DO YOU WANT IN THE TEST">   
            </div>
            <p>NO. OF MCQ'S PER QUESTION</p>
            <div class="custom-control custom-radio">
            <input type="radio" id="nom1" class="custom-control-input" name="nom" value="3" required>
            <label for="nom1" class="custom-control-label">3</label>   
            </div>
            <div class="custom-control custom-radio">
            <input type="radio" id="nom2" class="custom-control-input" name="nom" value="4" checked>
            <label for="nom2" class="custom-control-label">4</label>   
            </div>
            <div class="custom-control custom-radio">
            <input type="radio" id="nom3" class="custom-control-input" name="nom" value="5">
            <label for="nom3" class="custom-control-label">5</label>   
            </div>
            <div class="form-group">
            <p>CLASS</p>
            <input type="text" id="c" class="form-control" name="c" autocomplete="off" required alt="ENTER THE CLASS">   
            </div>
            <div class="form-group">
            <p>SUBJECT</p>
            <input type="text" id="sb" class="form-control" name="sb" autocomplete="off" required alt="ENTER THE SUBJECT OF THE TEST">   
            </div>
            <div class="form-group">
            <p>SYLLABUS</p>
            <input type="text" id="sy" class="form-control" name="sy" autocomplete="off" required alt="ENTER THE SYLLABUS OF THE TEST">   
            </div>
            <div class="form-group">
            <p>TEST_ID</p>
            <input type="text" id="tt" class="form-control" name="tt" disabled>   
            </div>
            <br>
            <input type="submit" class="btn btn-success" name="btn" value="NEXT" style="float:right;">
        </form>
        <form method="post">
            <input type="submit" class="btn btn-danger" name="btnc" value="CANCEL TEST">
        </form>
        </div>
        </div>
        <script type="text/javascript">
            var x="<?php echo $_SESSION['testid']; ?>";
            document.getElementById("tt").value=x;
        </script>
        
    </body>
</html>