<?php  
include('config.php');
include('session.php');

?>

<!DOCTYPE html>
<html>
<head>
<title>ngaituk online</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" href="favicon/ngaituk.ico" type="image/x-icon" />
<link rel="stylesheet" href="./css/style.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="menufiles\mbcsmb1uu0.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

<!-- scripts -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="menufiles/mbjsmb1uu0.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

</head>



<body>
  <header>
    <div id="navbar">
      <?php
      include "menu.php";
      ?>
    </div>
  </header>

  
<?php
$s=$_GET['v'];

if($s=="h")
{
?> 

  <section >
      <div id="job">
        <div class="container">
          <h3>Work Summary Harvest</h3>
                <form class="w3-container" method="post" action="report.php">
                <?php
                  
                  echo date('d/m/Y');


                  $sql = "SELECT c_name FROM contractors";
                  $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                  


                ?> 
                    
                    </br></br>
                    <div style="text-align: left" class="w3-input">
                    <label>Select Contractor</label>
                    </div>
                    <select class="w3-input" name="cont" autocomplete="off" >
                    <?php
                      while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                      <option  value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </br>  
                    <div style="text-align: left" class = "w3-input">
                    <label>Select Week Ending</label>
                    


                    </div>
                    <input class = "w3-input" name = "weekDate" type = "date" >
                    </br></br>  
                    <button class="myButton" type="submit" value="Today" name="today">Today</a></button>
                    <button class="myButton" type="submit" value="Weekely" name="week">Last Week</button>
                    <button class="myButton" type="submit" value="Monthly" name="month">Last Month</button>
          <!--          <button class="myButton" type="button" id="btnExport" value="Export" ><b>Export Pdf</b></button>
             -->       </form>
        
       



        </div>
      </div>
  </section>
 <?php
}else if($s=="w")
{
?>
<section >
      <div id="job">
        <div class="container">
          <h3>Work Summary Winter</h3>
                <form class="w3-container" method="post" action="report.php">
                <?php
                  
                  echo date('d/m/Y');


                  $sql = "SELECT c_name FROM contractors";
                  $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                  


                ?> 
                    
                    </br></br>
                    <div style="text-align: left" class="w3-input">
                    <label>Select Contractor</label>
                    </div>
                    <select class="w3-input" name="cont" autocomplete="off" >
                    <?php
                      while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                      <option  value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </br>  
                    <div style="text-align: left" class = "w3-input">
                    <label>Select Week Ending</label>
                    


                    </div>
                    <input class = "w3-input" name = "weekDate" type = "date">
                    </br></br>  
                    <button class="myButton" type="submit" value="Today" name="today">Today</a></button>
                    <button class="myButton" type="submit" value="Weekely" name="week">Last Week</button>
                    <button class="myButton" type="submit" value="Monthly" name="month">Last Month</button>
          <!--          <button class="myButton" type="button" id="btnExport" value="Export" ><b>Export Pdf</b></button>
             -->       </form>
        
       



        </div>
      </div>
  </section>

<?php
}
else if($s=="s")
{
?>
<section >
      <div id="job">
        <div class="container">
          <h3>Work Summary Summer</h3>
                <form class="w3-container" method="post" action="report.php">
                <?php
                  
                  echo date('d/m/Y');


                  $sql = "SELECT c_name FROM contractors";
                  $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                  


                ?> 
                    
                    </br></br>
                    <div style="text-align: left" class="w3-input">
                    <label>Select Contractor</label>
                    </div>
                    <select class="w3-input" name="cont" autocomplete="off" >
                    <?php
                      while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                      <option  value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </br>  
                    <div style="text-align: left" class = "w3-input">
                    <label>Select Week Ending</label>
                    


                    </div>
                    <input class = "w3-input" name = "weekDate" type = "date" >
                    </br></br>  
                    <button class="myButton" type="submit" value="Today" name="today">Today</a></button>
                    <button class="myButton" type="submit" value="Weekely" name="week">Last Week</button>
                    <button class="myButton" type="submit" value="Monthly" name="month">Last Month</button>
          <!--          <button class="myButton" type="button" id="btnExport" value="Export" ><b>Export Pdf</b></button>
             -->       </form>
        
       



        </div>
      </div>
  </section>
<?php
}






 ?>

 <div class = "container">
 <?php
 

 // for today
 if(isset($_POST['today']))
 {
  $cname = $_POST['cont'];
  $contn = strtolower(str_replace(' ','_',$cname));
  $wrktb = $contn . "_wrk";
  $tdate = date('Y-m-d');
 
    $sql = "SELECT DISTINCT crw_no FROM $wrktb ORDER BY crw_no";
    $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
   
    while($row = mysqli_fetch_assoc($result) )
    {
       $crw[] = $row['crw_no'];
    }
    $count = count($crw);
    
    // Display Records
    
    ?>
    <div>
    
    <table align="center" id="tabData" cellspacing="0" cellpadding="0" width = "100%" >
    


    <?php
    for($i=0;$i<$count;$i++)
    {
    
    ?><thead><tr><th>Emp Id</th><th>First Name</th><th>Last Name</th><th>Start Time</th><th>Finish Time</th><th>Lunch</th><th>Job Code</th><th>Work Hours</th></tr></thead><?php
        
    $sql1 = "SELECT * FROM $wrktb WHERE t_date = CURDATE() AND crw_no = $i+1";
    $result1 = mysqli_query($db,$sql1) or die("Bad SQL: $sql1"); 
        while($row1 = mysqli_fetch_assoc($result1) )
        {
           
           
           ?></td><td ><?php echo $row1['e_id'];
           ?></td><td><?php echo $row1['f_name'];         
           ?></td><td><?php echo $row1['l_name'];
           ?></td><td><?php 
           echo date("g:i a", strtotime($row1["s_time"]));
           ?></td><td><?php
           echo date("g:i a", strtotime($row1["f_time"]));
           ?></td><td><?php echo $row1['n_lunch'];
           ?></td><td><?php echo $row1['j_code'];
           ?></td><td><?php echo $row1['t_hrs'];
           ?></td></tr><?php

        }

    
    }           
 


    ?></tr><tr><td colspan="7"></td><td><?php

    $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE t_date = CURDATE()";
    $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
    while($row2 = mysqli_fetch_assoc($result2))
    {
      echo "Total". $row2['type']. " Hrs = ". $row2['SUM(t_hrs)'];
      echo "<br />";
    }
    
    ?></td></tr></table>
    </div><?php
}


// For Week
else if(isset($_POST['week']))
{
  $cname = $_POST['cont'];
  $contn = strtolower(str_replace(' ','_',$cname));
  $wrktb = $contn . "_wrk";
 
  $tdate = date('Y-m-d');
  
  $sql = "SELECT DISTINCT crw_no FROM $wrktb WEEK (t_date , 1) = WEEK( current_date , 1 ) - 1 AND YEAR( t_date) = YEAR( current_date ) ORDER BY crw_no";
  $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
   
    while($row = mysqli_fetch_assoc($result) )
    {
       $crw[] = $row['crw_no'];
    }
    $count = count($crw);
    
    for($i=0;$i<$count;$i++)
    {
    
    echo "Crew No" . $crw[$i] ;
    $sql1 = "SELECT * FROM $wrktb WHERE WEEK (t_date , 1) = WEEK( current_date , 1 ) - 1 AND YEAR( t_date) = YEAR( current_date ) AND crw_no = $i+1";
    
    $result1 = mysqli_query($db,$sql1) or die("Bad SQL: $sql1"); 
        while($row1 = mysqli_fetch_assoc($result1) )
        {
           echo "</br>";
           echo $row1['id'] . "--";
           echo $row1['t_date'] ."--";
           echo $row1['e_id'] . "--";
           echo $row1['crw_no'] . "--";
           echo $row1['t_hrs'];
        }

    echo "</br></br>";
    }  

    $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE WEEK (t_date , 1) = WEEK( current_date , 1 ) - 1 AND YEAR( t_date) = YEAR( current_date )";
    $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
    while($row2 = mysqli_fetch_assoc($result2))
    {
      echo "Total". $row2['type']. " Hrs = ". $row2['SUM(t_hrs)'];
      echo "<br />";
    }



 // $sql = "SELECT * FROM $wrktb WHERE (`t_date` > DATE_SUB(now(), INTERVAL 7 DAY))";
//$sql = "SELECT * FROM $wrktb WHERE WEEK (t_date , 1) = WEEK( current_date , 1 ) - 1 AND YEAR( t_date) = YEAR( current_date )";
 
//$sql =  "SELECT * FROM $wrktb WHERE t_date BETWEEN CURDATE()-INTERVAL 1 WEEK AND CURDATE()";

  //$result = mysqli_query($db,$sql) or die("Bad SQL: $sql"); 

  //while($row = mysqli_fetch_assoc($result) )
 // {
  // echo $row['id'] . "--";
   //echo $row['t_date'] ."--";
   //echo $row['e_id'] . "--";
  // echo $row['crw_no'] . "--";
  // echo $row['t_hrs'];
  //echo "</br>"; 
 // }
 //echo "</br></br>";
} 


// For Month
else if(isset($_POST['month']))
{
 
  $cname = $_POST['cont'];
  $contn = strtolower(str_replace(' ','_',$cname));
  $wrktb = $contn . "_wrk";
 
  $tdate = date('Y-m-d');
  

  $sql = "SELECT DISTINCT crw_no FROM $wrktb ORDER BY crw_no";
  $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
   
    while($row = mysqli_fetch_assoc($result) )
    {
       $crw[] = $row['crw_no'];
    }
    $count = count($crw);
    
    for($i=0;$i<$count;$i++)
    {
    
    echo "Crew No" . $crw[$i] ;
    $sql1 = "SELECT * FROM $wrktb WHERE MONTH (t_date ) = MONTH ( current_date ) - 1 AND YEAR( t_date) = YEAR( current_date ) AND crw_no = $i+1";
    
    $result1 = mysqli_query($db,$sql1) or die("Bad SQL: $sql1"); 
        while($row1 = mysqli_fetch_assoc($result1) )
        {
           echo "</br>";
           echo $row1['id'] . "--";
           echo $row1['t_date'] ."--";
           echo $row1['e_id'] . "--";
           echo $row1['crw_no'] . "--";
           echo $row1['t_hrs'];
        }

    echo "</br></br>";
    }  

    $sql2 = "SELECT SUM(t_hrs) FROM $wrktb WHERE MONTH ( t_date ) = MONTH ( current_date ) - 1 AND YEAR( t_date ) = YEAR( current_date )";
    $result2 = mysqli_query($db,$sql2) or die("Bad SQL: $sql2");
    while($row2 = mysqli_fetch_assoc($result2))
    {
      echo "Total". $row2['type']. " Hrs = ". $row2['SUM(t_hrs)'];
      echo "<br />";
    }
}

?>
</div>


<footer>
        <div id="footer">

        </div>
</footer>
  
<script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            
            html2canvas($('#tabData')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("<?php echo $contn . "/" . date('d/m/Y'); ?>");



 //var p_hrs = $("label#<?php echo "t_hrs_".$row['id']; ?>").val();
                }
           });
        });
    </script>
</body>
</html>





