<?php
  include "../config.php"; 
  
$json = file_get_contents('php://input');
$data = json_decode($json);

 

  $sql = "INSERT INTO workers (f_name, l_name, contractor_id, e_id,   v_type,  v_exp, d_o_b)
               VALUES ('$data->firstName','$data->lastName','$data->contractor','$data->employeeId',
                      '$data->visaType','$data->visaExpiry','$data->dateOfBirth')";

                      
        if($db->query($sql)===TRUE)
        {
          echo "data inserted" ;
          //echo $wrknm;
        }