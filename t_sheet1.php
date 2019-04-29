<!DOCTYPE html>
<html>

<head>
<title>ngaituk online</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="./css/style.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="menufiles\mbcsmb1uu0.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script type="text/javascript" src="menufiles/mbjsmb1uu0.js"></script>
<?php  
  include "config.php"; 
?>
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
      
        <?php
        
        //Select Workers

        if(isset($_POST['s_wrkr']))
        {
               $c_name=$_POST['cont'];
               $cname = strtolower(str_replace(' ','_',$c_name));
               //echo $c_name . $cname;

               $crw_no=$_POST['crw_no'];
               $job_c=$_POST['job_c'];
        ?>
        
        <div class="container">
        <div id="t_section">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST">
            <h3>New Time Sheet</h3>
              <label id="date_al"><b>Date: </b><?php echo date('d/m/o') . "<br>"; ?></label>
              
                  <b><?php echo $c_name;?></b><br/>
              
              <b><?php echo "Crew No  ";?></b><div id="t_lab"><?php echo $crw_no; ?></div>
              
              <b><?php echo "  Job  ";?></b><div id="t_lab"><?php echo $job_c; ?></div>
              <hr id="h_rule"/>
                <div  class="tab">
                  <table>
                  <thead>
                    <tr style="width=100%">
                      <th>S No</th>
                      <th>Select</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Visa Type</th>
                      <th>Visa Expiry</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM $cname";
                    $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                      <tr>
                        <td><?php echo $row['s_no']; ?></td>
                        <td><input type="checkbox" name="check_list[]" value= <?php echo $row['s_no']; ?> ></input></td>
                        <td><label name="first_n" value=<?php echo $row['f_name']; ?>><?php echo $row['f_name']; ?></label></td>
                        <td><label name="last_n" value=<?php echo $row['l_name']; ?>><?php echo $row['l_name']; ?></label></td>
                        <td><label name="visa_t" value=<?php echo $row['v_type']; ?>><?php echo $row['v_type']; ?></label></td>  





                        
                        <td>
                            <label name="visa_e" value=<?php
                            $timestamp = strtotime($row['v_exp']);
                            if($row['v_type']=="Resident")
                            {
                              echo "Indefinite";
                            }
                            else
                            {
                            echo date('d/m/Y', $timestamp);
                            }
                            ?>><?php
                            $timestamp = strtotime($row['v_exp']);
                            if($row['v_type']=="Resident")
                            {
                              echo "Indefinite";
                            }
                            else
                            {
                            echo date('d/m/Y', $timestamp);
                            }
                            ?></label>
                            
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                </div>
                <div id="mybutton">
                <button  class="myButton" type="submit"  name="frm_now">From Now</button>
                <button  class="myButton" type="submit"  name="frm_last">From Last</button>
                <button  class="myButton" type="submit"  name="cancel" value="Cancel">Cancel</button>
                <input type="hidden" name="cont_n" value = <?php echo $cname; ?>></input>
                </div>  
        </form>
        </div>
        </div>
        <?php
        }
        
        // Cancel

        else if(isset($_POST['cancel']))
        {
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
        }
        
        // From Now

        else if(isset($_POST['frm_now']))
        {
            $cont_n=$_POST['cont_n'];
            $contn = strtolower(str_replace(' ','_',$cont_n));
            
            echo $cont_n . $contn;

            $crw_no=$_POST['crw_no'];
            $job_c=$_POST['job_c'];
            
            if(!empty($_POST['check_list']))
            {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['check_list']);
            //echo "You have selected following ".$checked_count." option(s): <br/>";
            // Loop to store and display values of individual checked checkbox.
            ?>
            
            <div class="container">  
            <div id="t_section">  
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <label><?php //echo $cont_n; ?></label>
              <label><?php //echo $contn; ?></label>
                <div class="tab">
                <table>
                  <thead>
                    <tr>
                    <th>S No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Start Time</th>
                    <th>Finish Time</th>
                    <th>No Lunch</th>
                    <th>Job Code</th>
                    <th>Total Hours</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  
                  foreach($_POST['check_list'] as $selected)
                  {
                  //echo $selected;
                 
                 // }

                  $sql = "SELECT * FROM $cont_n WHERE s_no = $selected" ;
                  $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                        
                  while($row = mysqli_fetch_assoc($result))                          
                  {
                  ?>
                    <tr >
                    <td ><label name="s_no" value=<?php echo $row['s_no']; ?>><?php echo $row['s_no']; ?></label></td>
                    <td><label name="first_n" value=<?php echo $row['f_name']; ?>><?php echo $row['f_name']; ?></label></td>
                    <td><label name="last_n" value=<?php echo $row['l_name']; ?>><?php echo $row['l_name']; ?></label></td>
                    <td><input name="s_time" type="Time" value="07:30"></input></td>
                    <td><select name="f_time" type="Time">
                        <option value="730">7:30 pm</option>
                        <option value="745">7:45 pm</option>
                        <option value="730">8:00 pm</option>
                        <option value="745">8:15 pm</option>
                        <option value="730">8:30 pm</option>
                        <option value="745">8:45 pm</option>
                        <option value="730">9:00 pm</option>
                        <option value="745">9:15 pm</option>
                        <option value="730">9:30 pm</option>
                        <option value="745">9:45 pm</option>
                        </select>
                    </td>
                    <td><input type="checkbox" name="n_lunch" value=<?php echo $row['s_no']; ?>></input></td>
                    <td><input type="text" name="job_c" value="G3MP">G3MP</input></td>
                    <td><label name="t_hrs" value="8">8</label></td>
                    </tr>           
                    <?php
                    

                    }
                    ?>
                  </tbody>
                </table>
                </div>
            </form>
            </div>
            </div>      
                  <?php
                 
                  }
                  
                  

            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
              <div id="button">
              <button class="myButton" type="submit" name="sav_wrkr" Value="Save">Save</button>
              <button class="myButton" type="submit" name="cancel" value="Cancel">Cancel</button>
              </div>
            </form>                    
            <?php
            } 
            else
            {
            ?>
            <label>Please Select Atleast One Option.</label>
            
            <?php
            }
           
        
        }  
        


        else if(isset($_POST['sav_wrkr']))
        {
          $s_count=count($_POST['s_no']);
          echo $s_count;
          echo"hello";
        }
        else
        {
        ?>
         
          <div class="container">
            <div id="t_section">
            <h3>New Time Sheet</h3>
            <label><b>Date: </b><?php echo date('d/m/o') . "<br>"; ?></label>
                <br/>
                <form  method="post" action="">
                <?php
                $sql = "SELECT c_name FROM contractors";
                $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                ?>
                   <select class="w3-input" width="50px" name="cont" >
                   <?php
                   while($row = mysqli_fetch_assoc($result))
                   {
                   ?>
                        <option  value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
                   <?php
                   }
                   ?>
                   </select>
                   <input class="w3-input" name="crw_no"  placeholder="Crew Number" type="Number" width="50px" required>
                   <?php
                   
                   $sql = "SELECT j_title FROM job_code";
                   $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                   ?>
                   <select  class="w3-input" width="50px" name="job_c" >
                   <?php
                   while($row = mysqli_fetch_assoc($result))
                   {
                   ?>
                        <option  value="<?php echo $row['j_title']; ?>"><?php echo $row['j_title']; ?></option>
                   <?php
                   }
                   ?>
                   </select>
                                      
                   <div id="mybutton">
                   <button class="myButton" type="submit"  name="s_wrkr">Select Workers</button>
                   <button class="myButton" type="submit" value="Cancel" name="cancel">Cancel</button>
                   
                   <button class="myButton" type="submit"><a href="javascript:history.back()">Back</a></button>

                   </div> 
                </form>
          </div>
          </div>
        <?php
        }
        ?>
    </section>



  <footer>
        <div id="footer">
          <div class="container">
          </div>
        </div>
  </footer>




</body>

</html>
