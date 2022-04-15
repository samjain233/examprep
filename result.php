<?php
session_start();
if(isset($_SESSION['uname']) && isset($_SESSION['testid']))
{
$con=mysqli_connect('','','','');
$testid=$_SESSION['testid'];
$tabnam="stu23i".$testid."pjk34";
$query1="SELECT `NOF`, `NOM` FROM `info` WHERE `TEST`='$testid'";
$result1=mysqli_query($con,$query1);
$noq=mysqli_fetch_array($result1);
$moq=$noq[0]+1;
for($i=1;$i<$moq;$i++)
{
$query2="SELECT `value`, `marks` FROM `$tabnam` WHERE `questionnum`='$i'";
$result2=mysqli_query($con,$query2);
$row[$i]=mysqli_fetch_array($result2);
}
$sname=$_SESSION['uname'];
$studnam="studtest3".$testid;
for($j=1;$j<$moq;$j++)
{
$seta="a".$j;
$query3="SELECT `$seta` FROM `$studnam` WHERE `name`='$sname'";
$result3=mysqli_query($con,$query3);
$row2[$j]=mysqli_fetch_array($result3);
}
$ssmarks=0;
$cr=0;
$unap=0;
for($k=1;$k<$moq;$k++)
{
    if($row[$k][0]==$row2[$k][0])
    {
        $ssmarks=$ssmarks+$row[$k][1];
        $cr=$cr+1;
    }
    if($row2[$k][0]==0)
    {
        $unap=$unap+1;
    }
}
$ttmarks=0;
for($l=1;$l<$moq;$l++)
{
    $ttmarks=$ttmarks+$row[$l][1]; 
}

$queryu1="UPDATE `$studnam` SET `TOTAL`='$ssmarks' WHERE `name`='$sname'";
mysqli_query($con,$queryu1);


if(isset($_REQUEST['btn']))
{
    session_unset();
    session_destroy();
    echo "<script> location.href='index.php'; </script>";
}
}
else
{
    echo "<script> location.href='index.php'; </script>";
}
?>
<html>
    <head>
        <title>testprep</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <p class="result" >RESULT</p>
            </div>
        </div>
        
        <div class="container">
            <div class="jumbotron">
                <p  class="text"><span id="marks"></span> out of <span id="tmarks"></span></p>
            </div>
        </div>
        
        <table class="table table-striped">
        <thead>
            <tr>
                <th>1</th>
                <th>MARKS OBTAINED</th>
                <td id="a"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">2</th>
                <th>TOTAL MARKS</th>
                <td id="b"></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <th>CORRECTED ANSWERS</th>
                <td id="cr"></td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <th>INCORRECTED ANSWERS</th>
                <td id="un"></td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <th>UNATTEMPTED QUESTIONS</th>
                <td id="una"></td>
            </tr>
        </tbody>
        </table>
        <center>
            <form method="post">
        <input type="submit" value="FINISH" id="btn" name="btn" class="btn btn-primary">
            </form></center>
        
        
        <script type="text/javascript">
            var x= "<?php echo $ssmarks; ?>";
            var y= "<?php echo $ttmarks; ?>";
            document.getElementById("marks").innerHTML=x;
            document.getElementById("tmarks").innerHTML=y;
            document.getElementById("a").innerHTML=x;
            document.getElementById("b").innerHTML=y;
            var tt= "<?php echo $noq[0]; ?>";
            var c= "<?php echo $cr; ?>";
            var d= "<?php echo $unap; ?>";
            var e= tt-c-d;
            document.getElementById("cr").innerHTML=c;
            document.getElementById("una").innerHTML=d;
            document.getElementById("un").innerHTML=e;
        </script>
    </body>
</html>