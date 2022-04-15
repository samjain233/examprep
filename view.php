<?php
session_start();
$con=mysqli_connect('','','','');
$testid=$_SESSION['testid'];
$tabnam="stu23i".$testid."pjk34";
$query2="SELECT `NOF`, `NOM` FROM `info` WHERE `TEST`='$testid'";
$result=mysqli_query($con,$query2);
$noq=mysqli_fetch_array($result);
$moq=$noq[0]+1;
for($i=1;$i<$moq;$i++)
{
$query3="SELECT `questionnum`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `value`, `marks` FROM `$tabnam` WHERE `questionnum`='$i'";
$result3=mysqli_query($con,$query3);
$row[$i]=mysqli_fetch_array($result3);
}

if(isset($_REQUEST['btn']))
{
        $pos=$row[$_SESSION['Z']][0];
        $num=$_REQUEST['num'];
        $a=$_REQUEST['question'];
        $b=$_REQUEST['opt1'];
        $c=$_REQUEST['opt2'];
        $d=$_REQUEST['opt3'];
        $e=$_REQUEST['opt4'];
        $f=$_REQUEST['opt5'];
        $g=$_REQUEST['answer'];
        $h=$_REQUEST['mark'];
        mysqli_set_charset('utf8');
        $query4="UPDATE `$tabnam` SET `question`='$a',`option1`='$b',`option2`='$c',`option3`='$d',`option4`='$e',`option5`='$f',`value`='$g', `marks`='$h' WHERE `questionnum`='$pos'";
        mysqli_query($con,$query4);
     
     $_SESSION['Z']=$_SESSION['Z']+1; 
    
}

if(isset($_REQUEST['pbtn']))
{
        $pos=$row[$_SESSION['Z']][0];
        $num=$_REQUEST['num'];
        $a=$_REQUEST['question'];
        $b=$_REQUEST['opt1'];
        $c=$_REQUEST['opt2'];
        $d=$_REQUEST['opt3'];
        $e=$_REQUEST['opt4'];
        $f=$_REQUEST['opt5'];
        $g=$_REQUEST['answer'];
        $h=$_REQUEST['mark'];
        mysqli_set_charset('utf8');
        $query4="UPDATE `$tabnam` SET `question`='$a',`option1`='$b',`option2`='$c',`option3`='$d',`option4`='$e',`option5`='$f',`value`='$g', `marks`='$h' WHERE `questionnum`='$pos'";
        mysqli_query($con,$query4);
     
     $_SESSION['Z']=$_SESSION['Z']-1; 
    
}

if(isset($_REQUEST['home']))
{
        $pos=$row[$_SESSION['Z']][0];
        $num=$_REQUEST['num'];
        $a=$_REQUEST['question'];
        $b=$_REQUEST['opt1'];
        $c=$_REQUEST['opt2'];
        $d=$_REQUEST['opt3'];
        $e=$_REQUEST['opt4'];
        $f=$_REQUEST['opt5'];
        $g=$_REQUEST['answer'];
        $h=$_REQUEST['mark'];
        mysqli_set_charset('utf8');
        $query4="UPDATE `$tabnam` SET `question`='$a',`option1`='$b',`option2`='$c',`option3`='$d',`option4`='$e',`option5`='$f',`value`='$g', `marks`='$h' WHERE `questionnum`='$pos'";
        mysqli_query($con,$query4);
    unset($_SESSION['Z']);
    unset($_SESSION['X']);
    unset($_SESSION['Y']);
    
    echo "<script> location.href='hometeacher.php'; </script>";
    
    
}
if(isset($_REQUEST['sta']))
{
        $pos=$row[$_SESSION['Z']][0];
        $num=$_REQUEST['num'];
        $a=$_REQUEST['question'];
        $b=$_REQUEST['opt1'];
        $c=$_REQUEST['opt2'];
        $d=$_REQUEST['opt3'];
        $e=$_REQUEST['opt4'];
        $f=$_REQUEST['opt5'];
        $g=$_REQUEST['answer'];
        $h=$_REQUEST['mark'];
        mysqli_set_charset('utf8');
        $query4="UPDATE `$tabnam` SET `question`='$a',`option1`='$b',`option2`='$c',`option3`='$d',`option4`='$e',`option5`='$f',`value`='$g', `marks`='$h' WHERE `questionnum`='$pos'";
        mysqli_query($con,$query4);
        $querya1="UPDATE `testID` SET `start`='3' WHERE `TEST`='$testid'";
        mysqli_query($con,$querya1);
        $studnam="studtest3".$testid;
        $querya2="CREATE TABLE $studnam (ID int,name varchar(100),TOTAL int);";
        mysqli_query($con,$querya2);
        for($b=1;$b<$moq;$b++)
        {
        $t="a".$b;
        $querya3="ALTER TABLE $studnam ADD $t int;";
        mysqli_query($con,$querya3);
        }
        
    unset($_SESSION['Z']);
    unset($_SESSION['X']);
    unset($_SESSION['Y']);
    
    echo "<script> location.href='hometeacher.php'; </script>";
    
}
$value="o".$row[$_SESSION['Z']][7];   
?>
<html>
    <head>
        <title>EXAMPREP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style type="text/css">
        .as
            {
                width: 100%;
                height: 200px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <center><p style="font-size:40px;margin: 0; display: inline;" id="kk"></p>
                        <p style="font-size:40px;margin: 0; display: inline;">/</p>
                        <p style="font-size:40px;margin: 0; display: inline;" align="right" id="kl"></p>
                </center>
            </div>
        </div>
        
        <div class="container">
        <div class="jumbotron">
        <form method="post">
            <div class="form-group">
                <label>QUESTION NUMBER</label>
                    <input type="text" class="form-control" name="num" id="q" disabled>
            </div>
            <div class="form-group">
                <label>QUESTION</label>        
                    <input type="text" class="form-control as" name="question" id="ques">
            </div>
            <div class="form-group" id="1">
                <label>OPTION 1</label>
                    <input type="text" class="form-control" name="opt1" id="opt1">
            </div>
            <div class="form-group" id="2">
                <label>OPTION 2</label>
                    <input type="text" class="form-control" name="opt2" id="opt2">
            </div>
            <div class="form-group" id="3">
                <label>OPTION 3</label>
                    <input type="text" class="form-control" name="opt3" id="opt3">
            </div>
            <div class="form-group" id="4">
                <label>OPTION 4</label>
                    <input type="text" class="form-control" name="opt4" id="opt4">
            </div>
            <div class="form-group" id="5">
                <label>OPTION 5</label>
                    <input type="text" class="form-control" name="opt5" id="opt5">
            </div>
            <div id="6">
                <label class="container">option 1<input type="radio" name="answer" id="o1" value="1"></label></div>
            <div id="7">
                <label class="container">option 2<input type="radio" name="answer" id="o2" value="2"></label></div>
            <div id="8">
                <label class="container">option 3<input type="radio" name="answer" id="o3" value="3"></label></div>
            <div id="9">
                <label class="container">option 4<input type="radio" name="answer" id="o4" value="4"></label></div>
            <div id="10">
                <label class="container">option 5<input type="radio" name="answer" id="o5" value="5"></label></div>
            <div class="form-group">
                <label>MARKS</label>
                    <input type="text" class="form-control" name="mark" id="marks">
            </div>
            <hr>
            <div id="btnc">
            <input class="margin btn btn-primary" type="submit" id="btn" name="btn" value="next question">
            </div><br>
            <div id="pbtnc">
            <input class="margin btn btn-primary" type="submit" id="pbtn" name="pbtn" value="previous question">
            </div><br>
            <input class="margin btn btn-success" type="submit" id="sta" name="sta" value="HOME AND START TEST"><br>
            <input class="margin btn btn-success" type="submit" id="home" name="home" value="HOME">
            <br>
        </form>
        </div>
        </div>
        
        <script type="text/javascript">
            for(var i=<?php echo $noq[1]; ?>+1;i<6;i++)
                {
                    document.getElementById(i).hidden=true;
                }
            for(var j=<?php echo $noq[1]; ?>+6;j<11;j++)
                {
                    document.getElementById(j).hidden=true;
                }
            
            document.getElementById("q").value="<?php echo $row[$_SESSION['Z']][0]; ?>";
            document.getElementById("ques").value="<?php echo $row[$_SESSION['Z']][1]; ?>";
            document.getElementById("opt1").value="<?php echo $row[$_SESSION['Z']][2]; ?>";
            document.getElementById("opt2").value="<?php echo $row[$_SESSION['Z']][3]; ?>";
            document.getElementById("opt3").value="<?php echo $row[$_SESSION['Z']][4]; ?>";
            document.getElementById("opt4").value="<?php echo $row[$_SESSION['Z']][5]; ?>";
            document.getElementById("opt5").value="<?php echo $row[$_SESSION['Z']][6]; ?>";
            document.getElementById("marks").value="<?php echo $row[$_SESSION['Z']][8]; ?>";
            document.getElementById("<?php echo $value; ?>").checked=true;
            
            var kd="<?php echo $row[$_SESSION['Z']][0]; ?>";
            var kf="<?php echo $noq[0]; ?>";                       
            document.getElementById("kk").innerHTML=kd;
            document.getElementById("kl").innerHTML=kf;
            
            
            if(kd==1)
            {
                document.getElementById("pbtnc").hidden=true;
            }
            
            if(kd==kf)
            {
                document.getElementById("btnc").hidden=true;
            }
            
            
        </script>
    
    </body>
</html>