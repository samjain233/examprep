<?php
session_start();
if(!isset($_SESSION['EXISTS']) && isset($_SESSION['uname']) && isset($_SESSION['testid']))
{
    $con=mysqli_connect('','','','');
    $testid=$_SESSION['testid'];
    $tabnam="stu23i".$testid."pjk34";
    $queryi="SELECT `NOF`, `NOM` FROM `info` WHERE `TEST`='$testid'";
    $resulti=mysqli_query($con,$queryi);
    $noq=mysqli_fetch_array($resulti);
    $moq=$noq[0]+1;
    for($i=1;$i<$moq;$i++)
    {
    $query="SELECT * FROM `$tabnam` WHERE `questionnum`='$i'";
    $result=mysqli_query($con,$query);
    $row[$i]=mysqli_fetch_array($result);
    }
if(isset($_REQUEST['cbtn']))
{
    $studnam="studtest3".$testid;
    $sname=$_SESSION['uname'];
    $queryd1="DELETE FROM `$studnam` WHERE `name`='$sname'";
    mysqli_query($con,$queryd1);
    session_unset();
    session_destroy();
    echo "<script> location.href='index.php'; </script>";
}
if($_SESSION['ques']==$noq[0])
{
    if(isset($_REQUEST['neq']))
    {
    
        $sname=$_SESSION['uname'];
        $studnam="studtest3".$testid;
        $seta="a".$_SESSION['ques'];
        $smark=$_REQUEST['radio'];
        if($smark=="")
        {
            $smark=0;
        }
        $queryu="UPDATE `$studnam` SET `$seta`='$smark' WHERE `name`='$sname'";
        mysqli_query($con,$queryu);
        $_SESSION['EXISTS']=0;
        unset($_SESSION['ques']);
        echo "<script> location.href='result.php'; </script>";
    }
    
    
    
}
if($_SESSION['ques']<$noq[0])
{
if(isset($_REQUEST['neq']))
{
    $sname=$_SESSION['uname'];
    $studnam="studtest3".$testid;
    $seta="a".$_SESSION['ques'];
    $smark=$_REQUEST['radio'];
    if($smark=="")
    {
        $smark=0;
    }
    $queryu="UPDATE `$studnam` SET `$seta`='$smark' WHERE `name`='$sname'";
    mysqli_query($con,$queryu);
    $_SESSION['ques']=$_SESSION['ques']+1;
}
}
}
else
{
echo "<script> location.href='result.php'; </script>";    
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
        <style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
        
    </head>
    <body>
        <div class="container" id="poss" hidden>
            <br>
            <br>
            <div class="jumbotron">
                <center><div class="loader"></div></center>
                <h2><center>LOADING PLEASE WAIT....</center></h2>
            </div>
        </div>
        <div id="disl">
        <div class="container">
        <div class="jumbotron" style="font-size:20px;">
                <center>
                    <p style="font-size:20px;margin: 0; display: inline;" id="qans"></p>
                    <p style="font-size:20px;margin: 0; display: inline;">/</p>
                    <p style="font-size:20px;margin: 0; display: inline;" align="right" id="quans"></p>
                    <br>
                    <strong style="font-size:25px;text-align: right;"><span id="smarsk"></span> MARKS</strong>
                </center>
        </div>
        </div>
        
        <div class="container">
            <div class="jumbotron">
                <h2>QUESTION <span id="qn"></span>: <span id="ques"></span></h2><hr>
                 <form method="post">
                    <div class="custom-control custom-radio" id="1">
                        <input type="radio" class="custom-control-input" id="radio1" name="radio" value="1">
                        <label class="custom-control-label" for="radio1"><h3 id="opt1"></h3></label><hr>
                    </div>
                     <div class="custom-control custom-radio" id="2">
                        <input type="radio" class="custom-control-input" id="radio2" name="radio" value="2">
                        <label class="custom-control-label" for="radio2"><h3 id="opt2"></h3></label><hr>
                    </div>
                     <div class="custom-control custom-radio" id="3">
                        <input type="radio" class="custom-control-input" id="radio3" name="radio" value="3">
                        <label class="custom-control-label" for="radio3"><h3 id="opt3"></h3></label><hr>
                    </div>
                     <div class="custom-control custom-radio" id="4">
                        <input type="radio" class="custom-control-input" id="radio4" name="radio" value="4">
                        <label class="custom-control-label" for="radio4"><h3 id="opt4"></h3></label><hr>
                    </div>
                     <div class="custom-control custom-radio" id="5">
                        <input type="radio" class="custom-control-input" id="radio5" name="radio" value="5">
                        <label class="custom-control-label" for="radio5"><h3 id="opt5"></h3></label><hr>
                    </div>
                     <br>
                     <div class="btn-group" id="nsub">
                        <center><button type="submit" class="btn btn-primary" name="neq"><h4>NEXT QUESTION</h4>
                            </button></center>
                     </div>
                     <div class="btn-group" id="sub" hidden>
                        <center><button type="submit" class="btn btn-success" name="neq"><h4>SUBMIT</h4>
                            </button></center>
                    </div>
                </form> 
            </div>
        </div>
        <hr>
        
        <center>
        <form method="post">
            <input type="submit" class="btn btn-danger" value="CANCEL EXAM" name="cbtn">
        </form>
        </center>
        </div>
        
        <script type="text/javascript">
            
            for(var i=<?php echo $noq[1]; ?>+1;i<6;i++)
                {
                    document.getElementById(i).hidden=true;
                }
            
            var y="<?php echo $row[$_SESSION['ques']][1]; ?>";
            var z="<?php echo $_SESSION['ques']; ?>";
            var a="<?php echo $moq; ?>";
            document.getElementById("ques").innerHTML=y;
            document.getElementById("qn").innerHTML=z;
            var opt1="<?php echo $row[$_SESSION['ques']][2]; ?>";
            var opt2="<?php echo $row[$_SESSION['ques']][3]; ?>";
            var opt3="<?php echo $row[$_SESSION['ques']][4]; ?>";
            var opt4="<?php echo $row[$_SESSION['ques']][5]; ?>";
            var opt5="<?php echo $row[$_SESSION['ques']][6]; ?>";
            var smarks="<?php echo $row[$_SESSION['ques']][8]; ?>";
            document.getElementById("opt1").innerHTML=opt1;
            document.getElementById("opt2").innerHTML=opt2;
            document.getElementById("opt3").innerHTML=opt3;
            document.getElementById("opt4").innerHTML=opt4;
            document.getElementById("opt5").innerHTML=opt5;
            document.getElementById("smarsk").innerHTML=smarks;
            document.getElementById("qans").innerHTML=z;
            document.getElementById("quans").innerHTML=a-1;
            var b=a-1;
            if(z==b)
                {
                    document.getElementById("sub").hidden=false;
                    document.getElementById("nsub").hidden=true;
                }
                
            document.getElementById("nsub").onclick=function()
            {
                document.getElementById("disl").hidden=true;
                document.getElementById("poss").hidden=false;
            }
            
        </script>
    
    </body>
</html>