<?php  include('config.php');
       include('session.php');
?>
<!DOCTYPE html>
<html>

<head>
<title>ngaituk online</title>
<link rel="icon" href="favicon/ngaituk.ico" type="image/x-icon" />
<!-- <meta http-equiv="Refresh" content="0; url=https://www.quackit.com/html/tags/"> -->
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="./css/style.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="menufiles/mbcsmb1uu0.css?version=51" type="text/css" />
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
        <form action=""  method="POST">
            <h3>New Time Sheet</h3>
              <label id="date_al"><b>Date: </b><?php echo date('d/m/Y') . "<br>"; ?></label>
              
                  <b><?php echo $c_name;?></b><br/>
              
              <b><?php echo "Crew No  ";?></b><div id="t_lab"><?php echo $crw_no; ?></div>
              
              <b><?php echo "  Job  ";?></b><div id="t_lab"><?php echo $job_c; ?></div>
              <hr id="h_rule"/>
                <div  class="tab">
                  <table>
                  <thead>
                    <tr style="width=100%">
                      <th>Worker No</th>
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
                        <td><?php echo $row['e_id']; ?></td>
                        <td><input type="checkbox" name="check_list[]" value= <?php echo $row['id']; ?> ></input></td>
                        <td><label name="first_n" value=<?php echo $row['f_name']; ?>><?php echo $row['f_name']; ?></label></td>
                        <td><label name="last_n" value=<?php echo $row['l_name']; ?>><?php echo $row['l_name']; ?></label></td>
                        <td><label name="visa_t" value=<?php echo $row['v_type']; ?>><?php echo $row['v_type']; ?></label></td>  





                        
                        <td>
                            <div id="visa_expiry">
                                  <label">
                                    <?php
                                      echo $date1=date('d/m/y');
                                      $tempArr=explode('-', $row['v_exp']);
                                      echo $date2 = date("d/m/y", mktime(0, 0, 0, $tempArr[1], $tempArr[0], $tempArr[2]));




                                      //echo $timestamp = $row['v_exp'];
                                      //echo $today = date('Y-m-d');
                                      //if($today > $timestamp)
                                      //{
                                      //  echo "hello";
                                      //} 
                                      
                                      ?>
                                  </label>
                         </div>   
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                </div>
                <div id="mybutton">
                <button  class="myButton" type="submit"  name="frm_last">From Last Day</button>
                <button  class="myButton" type="submit"  name="frm_now">From Now</button>
                <button class="myButton" type="submit"><a href="javascript:history.back()">Back</a></button>
                <button  class="myButton" type="submit"  name="cancel" value="Cancel">Cancel</button>
                
                <input type="hidden" name="cont_n" value = "<?php echo $cname; ?>"></input>
                <input type="hidden" name="crw_no" value = "<?php echo $crw_no; ?>"></input>
                <input type="hidden" name="jobc" value = "<?php echo $job_c; ?>"></input>
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
            $cont_n = $_POST['cont_n'];
            $contn = strtoupper(str_replace('_',' ',$cont_n));


            //$contn = strtolower(str_replace(' ','_',$cont_n));
            
           // echo $cont_n . $contn;

            $crw_no = $_POST['crw_no'];
            


            $jobc = $_POST['jobc'];
            


            
            
            if(!empty($_POST['check_list']))
            {
             
            // Counting number of checked checkboxes.
            
            //echo "You have selected following ".$checked_count." option(s): <br/>";
            // Loop to store and display values of individual checked checkbox.
            //$work_date = [$checked_count][8];
            


            ?>
            
            <div class="container">  
            <div id="t_section">  
              <h3>New Time Sheet</h3>
              <label id="date_al"><b>Date: </b><?php echo date('d/m/Y') . "<br>"; ?></label>
              
              <label><b><?php echo $contn;?></b></label></br>
              <label><b>Crew No  </b><?php echo $crw_no; ?></label>


            <form action="" method="post" >
              





                <div class="tab">
                

                <table >
                  <thead>
                    <tr>
                    <th>Worker No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Start Time</th>
                    <th>Finish Time</th>
                    <th>No Lunch</th>
                    <th>Job Code</th>
                    <th>Total Hours</th>
                    <th>Notes</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  
                  foreach($_POST['check_list'] as $selected)
                  {
                  
                  $checked_count = count($_POST['check_list']);
                  //echo $selected,$checked_count;
                  
                  $sql = "SELECT * FROM $cont_n WHERE id = $selected" ;
                  $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                  
                  //$sql1 = "SELECT * FROM job_code";
                  //$result1 = mysqli_query($db,$sql1) or die("Bad SQL: $sql1");

                  //$wrktb = $cont_n . "_wrk";
                  //echo $wrktb;
                  while($row = mysqli_fetch_assoc($result) )                          
                  {
                  
                  ?>
                      <tr >
                      <td ><label id="<?php echo "s_no_".$row['id']; ?>"  value="<?php echo $row['id']; ?>" ><?php echo $row['e_id']; ?></label>
                      <input type="hidden" name="time[id][]" value="<?php echo $row['id']; ?>"></input>
                      <input type="hidden" name="time[eid][]" value="<?php echo $row['e_id']; ?>"></input>
                      </td>

                      <td><label id="<?php echo "first_n_".$row['id']; ?>"  value="<?php echo $row['f_name']; ?>"><?php echo 
                      $row['f_name']; ?></label>
                      <input type="hidden" name="time[f_name][]" value="<?php echo $row['f_name']; ?>"></input>
                      </td>

                      <td><label id="<?php echo "last_n_".$row['id']; ?>" value="<?php echo $row['l_name']; ?>"><?php echo  $row['l_name']; ?></label>
                      <input type="hidden" name="time[l_name][]" value="<?php echo $row['l_name']; ?>"></input>
                      </td>

                      <td><input id="<?php echo "s_time_".$row['id']; ?>" name="time[s_time][]" type="Time" value="07:30" step="900"></input></td>

                      <td><input id="<?php echo "f_time_".$row['id']; ?>" name="time[f_time][]" type="Time" value="16:00" step="900"></input></td>
                          
                      
                      <td><input id="<?php echo "n_lunch_".$row['id']; ?>"  type="checkbox"></input>
                      <input type="hidden" name="time[n_lunch][]"  id="<?php echo "n_lunch".$row['id']; ?>" ></input>
                      </td>
                      



                      <td>
                         <!--<select class="w3-input" width="50px" name="cont" value="G3MP" >
                   <?php
                   //while($row1 = mysqli_fetch_assoc($result1))
                   {
                   ?>
                        <option  value="<?php echo $row1['j_title']; ?>"><?php echo $row1['j_title']; ?></option>
                   <?php
                   }
                   ?>
                   </select>-->



                      <input id="<?php echo "job_c_".$row['id']; ?>" type="text" name="time[job_c][]" value="<?php echo $jobc; ?>"></input></td>
                      




                      <td><label id="<?php echo "t_hrs_".$row['id']; ?>"></label>
                      <input type="hidden" name="time[t_hrs][]" id="<?php echo "t_hrs_".$row['id']; ?>"></input>
                      </td>


                      <td><label id="<?php echo "notes_".$row['id']; ?>"></label>
                      <input type="text" name="time[notes][]" id="<?php echo "notes_".$row['id']; ?>" placeholder="notes"></input>
                      </td>



                      </tr>           
                  
                  <?php
                      include "t_hrs.js"; 
                       
                            
                  }
                  }
                  
                  ?>
                  



                  </tbody>
                </table>
                
                <input type="hidden" name="crw_no" value="<?php echo $crw_no; ?>"></input>
                <input type="hidden" name="contn" value="<?php echo $contn; ?>"></input>

                <div id="button">
              <button onclick="" id="save_wr" class="myButton" type="submit" name="sav_wrkr" Value="Save">Save</button>
              <button class="myButton" type="submit"><a href="javascript:history.back()">Back</a></button>
              <button class="myButton" type="submit" name="cancel" value="Cancel">Cancel</button>
              </div>
                </div>
            </form>
            </div>
                  
                  <?php
                 
                  
                  
                  

            ?>
                             
            </div>
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
           
           $contn=$_POST['contn'];
           $contn = strtolower(str_replace(' ','_',$contn));
           $crw_no = $_POST['crw_no'];
           //$job_c=$_POST['job_c'];
           $wrktb = $contn . "_wrk";



          $time = $_POST["time"];
          echo $count = count($time['id']);

           for($i=0;$i<$count;$i++)
           {
            //$fname = $time['s_no'][i];
            //date_default_timezone_set('UTC');
            //echo $today = date('d/m/Y');
            
            
            echo $today = date('Y/m/d');



            //$today = date('Y/d/m',1552175669);//,strtotime($today));

            $sno = $time['id'][$i];
            $eid = $time['eid'][$i];
            $fname = $time['f_name'][$i];
            $lname = $time['l_name'][$i];
            $stime = $time['s_time'][$i];
            $ftime = $time['f_time'][$i];
            $nlunch = $time['n_lunch'][$i];
            $jobc = $time['job_c'][$i];
            $jobc = strtolower(str_replace(' ','_',$jobc));
            $totalh = $time['t_hrs'][$i];
            if($time['notes'][$i] == "")
            { 
            $notes = "n/a";  
            }
            else{
            $notes = $time['notes'][$i];
            }
            
            echo $sno ."/". $eid ."/". $fname ."/". $lname ."/". $stime ."/". $ftime ."/". $nlunch ."/". $jobc ."/". $totalh;
           


            $sql = "INSERT INTO $wrktb (e_id,t_date,crw_no,f_name,l_name,s_time,f_time,n_lunch,j_code,t_hrs,notes) VALUES ('$eid','$today','$crw_no','$fname','$lname','$stime','$ftime','$nlunch','$jobc','$totalh','$notes')";
            if($db->query($sql) == TRUE)
            {
             echo "time sheet created";
            }
            else
              echo "bad query";
           
            }
           
           //header("Location: localhost:t_sheet.php");
          // foreach ($time as $arr) {
           //echo $arr;
         //  foreach ($arr as $t_hrs=>$value) {
       // echo $value ;
    //}
//
           //$time=implode(",",$time);
                 
           //$last_names = array_column($time,'f_name');       
           //print_r($time);       
          //print_r(array_values($time));
          // print_r(array_keys($time));

           //if (in_array("n_lunch", $time))
            //{
            //echo "Match found";
           // }
           // else
            //{
            //echo "Match not found";
           // }
                









        }
        else
        {
        ?>
         
          <div class="container">
            
            <h3>New Time Sheet</h3>
            <label><b>Date: </b><?php echo date('d/m/o') . "<br>"; ?></label>
                <br/>
                <form  method="post" action="" >
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
                   
                   $sql = "SELECT * FROM job_code";
                   $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
                   ?>
                   <select  class="w3-input" width="50px" name="job_c" >
                   <?php
                   while($row = mysqli_fetch_assoc($result))
                   {
                   ?>
                        <option  value="<?php echo $row['j_code']; ?>"><?php echo $row['j_title']; ?></option>
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



<script>
/*            $(document).ready(function() {
        $("#save_wr").submit(function() {
            
            $("#save_wr input[type=checkbox]:not(:checked)").each(function() {
                $(this).val("no");
                $(this).attr("checked", true);
            });
        });
    });*/
  </script>
</body>

</html>
