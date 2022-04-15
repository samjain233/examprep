<?php
session_start();
$con=mysqli_connect('','','','');
if(!isset($_SESSION['X']))
{
$testid=$_SESSION['testid'];
$tabnam="stu23i".$testid."pjk34";
$query2="SELECT `NOF`, `NOM` FROM `info` WHERE `TEST`='$testid'";
$result=mysqli_query($con,$query2);
$noq=mysqli_fetch_array($result);
    
    if(isset($_REQUEST['btn']))
    {   $num=$_REQUEST['num'];
        $a=$_REQUEST['question'];
        $b=$_REQUEST['opt1'];
        $c=$_REQUEST['opt2'];
        $d=$_REQUEST['opt3'];
        $e=$_REQUEST['opt4'];
        $f=$_REQUEST['opt5'];
        $g=$_REQUEST['answer'];
        $h=$_REQUEST['mark'];
        mysqli_set_charset('utf8');
        $query= "INSERT INTO `$tabnam`(`questionnum`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `value`,`marks`) VALUES ('$num','$a','$b','$c','$d','$e','$f','$g','$h')";
        mysqli_query($con,$query);
     
     $_SESSION['Z']=$_SESSION['Z']+1; 
    }
    if(isset($_REQUEST['bttn']))
    {
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
        $query= "INSERT INTO `$tabnam`(`questionnum`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `value`,`marks`) VALUES ('$num','$a','$b','$c','$d','$e','$f','$g','$h')";
        mysqli_query($con,$query);
        $_SESSION['X']=1;
        $_SESSION['Z']=1;
        
        echo "<script> location.href='view.php'; </script>";
    }
}
else
{
   echo "<script> location.href='view.php'; </script>"; 
}
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
                display: inline-block;
                overflow-wrap: break-word;
                word-break: break-all;
                white-space: initial;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
        <form method="post">
            <div class="form-group">
                <label>QUESTION NUMBER</label>
                    <input type="text" class="form-control" name="num" id="q">
            </div>
            <div class="form-group">
                <label>QUESTION</label>        
                    <textarea class="form-control as" name="question"  placeholder="enter your question here" required></textarea>
            </div>
            <div class="form-group" id="1">
                <label>OPTION 1</label>
                    <input type="text" class="form-control" name="opt1" placeholder="option 1" required >
            </div>
            <div class="form-group" id="2">
                <label>OPTION 2</label>
                    <input type="text" class="form-control" name="opt2" placeholder="option 2" required >
            </div>
            <div class="form-group" id="3">
                <label>OPTION 3</label>
                    <input type="text" class="form-control" name="opt3" placeholder="option 3">
            </div>
            <div class="form-group" id="4">
                <label>OPTION 4</label>
                    <input type="text" class="form-control" name="opt4" placeholder="option4" >
            </div>
            <div class="form-group" id="5">
                <label>OPTION 5</label>
                    <input type="text" class="form-control" name="opt5" placeholder="option5" >
            </div>
            <div id="6">
                <label class="container">option 1<input type="radio" name="answer" value="1" required><span class="checkmark"></span></label></div>
            <div id="7">
                <label class="container">option 2<input type="radio" name="answer" value="2"><span class="checkmark"></span></label></div>
            <div id="8">
                <label class="container">option 3<input type="radio" name="answer" value="3"><span class="checkmark"></span></label></div>
            <div id="9">
                <label class="container">option 4<input type="radio" name="answer" value="4"><span class="checkmark"></span></label></div>
            <div id="10">
                <label class="container">option 5<input type="radio" name="answer" value="5"><span class="checkmark"></span></label></div>
            <div class="form-group">
                <label for="mat">MARKS</label>        
                <select class="form-control" name="mark" id="mat">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            
            <input class="margin btn btn-success" type="submit" id="btn" name="btn" value="post question">
            <input class="margin btn btn-primary" type="submit" id="bttn" name="bttn" value="post and view question" hidden>
        </form>       
        </div>
        </div>
        <form method="post">
            <input type="text" name="hid" id="hid" hidden>    
        </form>
        <script type="text/javascript">
            if(<?php echo $noq[0]; ?>==<?php echo $_SESSION['Z']; ?>)
                {
                    document.getElementById("btn").hidden=true;
                    document.getElementById("bttn").hidden=false;   
                }
            
            document.getElementById("q").value=<?php echo $_SESSION['Z']; ?>;
            for(var i=<?php echo $noq[1]; ?>+1;i<6;i++)
                {
                    document.getElementById(i).hidden=true;
                }
            for(var j=<?php echo $noq[1]; ?>+6;j<11;j++)
                {
                    document.getElementById(j).hidden=true;
                }  
        </script>
    </body>
</html>