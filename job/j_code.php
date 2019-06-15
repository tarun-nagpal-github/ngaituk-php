<html>
<head>
<title>ngaituk online</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="./css/style.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="menufiles\mbcsmb1uu0.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script type="text/javascript" src="menufiles/mbjsmb1uu0.js"></script>
<?php  include "config.php"; ?>
</head>
<body>
      <header>
          <div >
          <div id="navbar">
              
                  <?php
                    include "menu.php";
                  ?>
              
          </div>
          </div>
  </header>

  <section >
      <div id="job">
        <div class="container">
          <h3>Add New Job Code</h3>
                <form class="w3-container" method="post" action="">
                    <input name="j_title" class="w3-input" placeholder="Job Title" type="text" width="50px;">
                    <input name="j_code" class="w3-input" placeholder="Job Code" type="text" width="50px;">
                    <div id="myButton"> 
                    <button class="myButton" type="submit" value="Cancel" name="cancel">Cancel</button>
                    <button class="myButton" type="submit" value="Submit" name="submit">Submit</button>
                    </div>
                </form>
        </div>
      </div>
  </section>
  <footer>
        <div id="footer">

        </div>
  </footer>
  <?php
  if(isset($_POST['submit']))
			 {
			 $j_title=$_POST['j_title'];
       $j_code=$_POST['j_code'];

       $sql = "INSERT INTO job_code (j_title,j_code) VALUES ('$j_title','$j_code')";
       if($db->query($sql)===TRUE)
       {
         echo "data inserted";
       }





       //echo $cname;
       //echo $c_name;
			 //echo "<meta http-equiv=\"refresh\" content=\"0;URL=wrkr.php\">";
       //echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
			 }else if(isset($_POST['cancel']))
             {
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
             }
			 ?>



</body>
</html>
