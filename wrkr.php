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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="menufiles/mbjsmb1uu0.js"></script>

</head>
<body>
      <header>
          <div id="navbar">
                  <?php
                    include "menu.php";
                  ?>
          </div>    
  </header>

  <section>
        <div class="container">
         <h3>New Worker Information</h3>
                
                <form  method="post" action="">
                    <input name="f_name" required class="w3-input" placeholder="first name" type="text" width="50px" autocomplete="off">
                    <input name="l_name" required class="w3-input" placeholder="last name" type="text" width="50px" autocomplete="off">
                    
                    <?php
                    $sql = "SELECT c_name FROM contractors";
                    $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                    ?>
                    
                    <select class="w3-input" width="50px" name="cont" autocomplete="off" >
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                       ?>
                       <option  value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
                       <?php
                    }
                    ?>
                    </select>

                    <input name="v_type" required class="w3-input" placeholder="Visa Type" type="text" autocomplete="off" id="vtype">
                    <input name="d_o_b"  class="w3-input" placeholder=" Date of Birth" type="date" autocomplete="off" id="dob">
                    <input name="v_exp"  class="w3-input" placeholder=" Visa Expiry Date" type="date" autocomplete="off" id="vexp">
                  <!--<script>
                    $(document).ready(
                                    function(){
                                              $("#vtype").click(
                                                               function(){
                                                                        $("input#vexp").hide();
                                                                });
                                      });






                   
                    //</script>-->
                    <button class="myButton" type="submit" value="Cancel" name="cancel">Cancel</button>
                    <button class="myButton" type="submit" value="Submit" name="submit">Submit</button>

                </form>
         </div>
  </section>
  


  <footer>
        <div id="footer">

        </div>
  </footer>
  <?php
  if(isset($_POST['submit']))
			 {
			 


       $c_name=$_POST['cont'];
       $f_char = $c_name[0];
       $schar = strpos($c_name, " ") + 1;
       $s_char = $c_name[$schar];

       




       $cname = strtolower(str_replace(' ','_',$c_name));
			 
       $f_name=$_POST['f_name'];
       $l_name=$_POST['l_name'];
       $v_type=$_POST['v_type'];

       if( $v_type == "resident" || $v_type == "Resident" || $v_type == "Citizen" || $v_type == "citizen")
       {
       $v_exp = "indefinite";
       }
			 $v_exp=$_POST['v_exp'];
       $d_o_b=$_POST['d_o_b'];

       foreach ($_POST as $val)
       {
         if(empty($val))
          echo 'You have not filled up all the inputs';
      }

      

      $query = mysqli_query($db,"SELECT * FROM $cname");
      $number = mysqli_num_rows($query);
      $number = $number + 1;
      $number = str_pad($number, 4, '0', STR_PAD_LEFT);
      $emp_id=$f_char . $s_char . $number;


			 $sql = "INSERT INTO $cname (e_id,f_name,l_name,v_type,v_exp,d_o_b) VALUES ('$emp_id','$f_name','$l_name','$v_type','$v_exp','$d_o_b')";
       if($db->query($sql)==TRUE)
       {
         echo "data inserted";
       }
       

       //echo $cname;
       //echo $v_exp;

			 //echo "<meta http-equiv=\"refresh\" content=\"0;URL=wrkr.php\">";

			 }else if(isset($_POST['cancel']))
             {
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
             }
			 ?>



</body>
</html>
