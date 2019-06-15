<?php
  include "../config.php"; 
  $data = json_decode(file_get_contents("php://input"));

  $sql = "INSERT INTO workers (f_name, l_name, contractor_id, e_id,   v_type,  v_exp, d_o_b)
               VALUES ('$data->f_name','$data->l_name','$data->contractor_id','$data->e_id',
                      '$data->v_type','$data->v_exp','$data->d_o_b')";

                      echo $sql;
        if($db->query($sql)===TRUE)
        {
          echo "data inserted" ;
          //echo $wrknm;
        }


  echo json_encode($data);
  echo json_encode($data);