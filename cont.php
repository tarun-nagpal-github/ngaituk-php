<?php  include('config.php');
       include('session.php');
?>
<html>
<head>
<title>ngaituk online</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="./css/style.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="menufiles\mbcsmb1uu0.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script type="text/javascript" src="menufiles/mbjsmb1uu0.js"></script>

</head>
<body>
      <header>
          <div id="navbar">
                  <?php
                    require "menu.php";
                  ?>
              </div>
           
  </header>

  <section>
      <div class="container" >
      


        

          <h3>New Contractor Information</h3>
                <form method="post" action="">
                    <input name="name"required class="w3-input" placeholder="Name"type="text" width="50px"autocomplete="off">
                    <input name="add" required class="w3-input" placeholder="Address" type="text" width="50px"autocomplete="off">
                    <input name="cnct" required class="w3-input" placeholder="Contact No" type="text" width="50px"autocomplete="off">
                    <input name="email" required class="w3-input" placeholder="E-Mail" type="text" width="50px"autocomplete="off">

                    <button class="myButton" type="submit" value="Cancel" name="cancel">Cancel</button>
                    <button class="myButton" type="submit" value="Submit" name="submit">Submit</button>
                </form>
          </div>
      </div>
  </section>
  <footer>
        <div >

        </div>
  </footer>

  <?php
     if(isset($_POST['submit']))
     {
     $name = $_POST['name'];
     $add = $_POST['add'];
     $tname = str_replace(' ','_',$name);
     $wrktb = $tname . "_wrk";
     $hvwtb = $tname . "_hvw";
     //echo "hello";
     //echo "<meta http-equiv=\"refresh\" content=\"2\">";
     //Input:  $subjectVal  = "It was nice meeting you. May you shine brightly."
    //str_replace('you', 'him', $subjectVal)
     //Output: It was nice meeting him. May him shine brightly.
     $sql = "INSERT INTO contractors (c_name, c_add)
 VALUES ('$name','$add')";
         if($db->query($sql)===TRUE)
         {
           echo "data inserted" ;
           //echo $wrknm;
         }






     //for workers
     $sql = "CREATE TABLE $tname (
         id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         e_id VARCHAR(20) NOT NULL,
         f_name VARCHAR(50) NOT NULL,
         l_name VARCHAR(50) NOT NULL,
         v_type VARCHAR(20) NOT NULL,
         v_exp DATE NOT NULL,
         d_o_b DATE NOT NULL)";

         if($db->query($sql)===TRUE)
         {
           echo "table created";
         }

     //for work done
     $sql1 = "CREATE TABLE $wrktb (
         id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         e_id VARCHAR(20) NOT NULL,
         t_date DATE,
         crw_no INT(10) NOT NULL,
         f_name VARCHAR(50) NOT NULL,
         l_name VARCHAR(50) NOT NULL,
         s_time TIME(6) NOT NULL,
         f_time TIME(6) NOT NULL,
         n_lunch VARCHAR(20) NOT NULL,
         j_code VARCHAR(20) NOT NULL,
         t_hrs float NOT NULL)";
         

         if($db->query($sql1)===TRUE)
         {
           echo "table created";
         }

      // for harvest  
      $sql2 = "CREATE TABLE $hvwtb (
         id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         
         t_date DATE NOT NULL,
         crw_no INT(10) NOT NULL,
         n_o_b INT(10) NOT NULL)";
         

         if($db->query($sql2)===TRUE)
         {
           echo "table created";
         }


     //echo "<meta http-equiv=\"refresh\" content=\"0;URL=cont.php\">";

   }//else if(isset($_POST['cancel']))
           //{
          // echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
          // }
  ?>


</body>
</html>
