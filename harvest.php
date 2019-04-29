<!DOCTYPE html>
<html>

<head>
<title>ngaituk online</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="./css/style.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="menufiles\mbcsmb1uu0.css?version=51" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    	<div class="container">
         <h3>Harvest Info</h3>
         <label><b>Date: </b><?php echo date('d/m/Y') . "<br>"; ?></label>
            <br/>
            <form  method="post" action="hvw.php?v= <?php echo crypt("w");?>">
              <input class="w3-input" name="h_date"  placeholder="Select Date" type="Date">
              <?php
              $sql = "SELECT c_name FROM contractors";
              $result = mysqli_query($db,$sql) or die("Bad SQL: $sql");
              ?>
                <select class="w3-input" width="50px" name="cont" id="cont">
                  <?php
                  while($row = mysqli_fetch_assoc($result))
                  {
                  ?>
                    <option  value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
                  <?php
                  }
                  ?>
                </select>
                   
                <input class="w3-input" name="crw_no"  placeholder="Crew Number" type="Number" width="50px" >
                <input class="w3-input" name="n_o_b"  placeholder="Total no of bins" type="Number" width="50px" >                  
                <hr>
                
                <div id="mybutton">
                  <button class="myButton" type="submit"  name="save">Save</button>
                  <button class="myButton" type="submit"><a href="javascript:history.back()">Back</a></button>
                  <button class="myButton" type="submit"  name="">Cancel</button>
                </div> 
            </form>
      </div>
    </section>



  <footer>
        <div id="footer">
          <div class="container">
          </div>
        </div>
  </footer>




</body>

</html>






