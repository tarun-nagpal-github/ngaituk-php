<?php
  include('config.php');
  include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>ngaituk online</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="css/style.css?version=51" type="text/css" />
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
    <div class="container">
      	<?php
			if(isset($_POST['section']))
			{
			?>
				<div id="sections">
					<form id="blk_form" class="w3-container" method="post" action=""<?php echo $_SERVER['PHP_SELF']; ?>">
					<div>
						<label id="lab">Enter Section Name</label>
					</div>
					<div>
						<input id="sec_in" type="text" name="section" ></input><br/>
					</div>
					<div>	
						<label id="lab">Enter No of Blocks</label>
					</div>
					<div>
						<input id="sec_in" type="text" name="blk_nos" ></input>
					</div>	
					<div>
						<button class="myButton" type="submit" value="submit" name="submit">Ok</button>
						<button class="myButton" type="submit" value="Cancel" name="cancel">Cancel</button>
					</div>
				</form>
				</div>
			<?php
			}
			else if(isset($_POST['submit']))
		 	{
		 	
		 		echo "hello";


		 		/*	$secname=$_POST['section'];
		 			$noblks=$_POST['blknos'];
					echo $no_blks;			
			?>	    
						<div>
							<label id="lab">Enter Section Name</label>
						</div>	
						<?php
						echo "its here";
						for($i=0;$i<=6;$i++)
						{
						?>		
						   	<div>
								<label id="lab">Enter Section Name</label>"
							</div>
							<div>
								<input id="sec_in" type="text" name="section" </input><br/>
							</div>
						<?php
						}	*/
			}

 			else
 			{
 			?>
		      	<div class="container">
		    	  	<div id="cont">
		            	<h3>Orchard Data</h3>
		                	<form class="w3-container" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  		            <button class="myButton" type="submit" value="Sections" name="section">Sections</button>
			                    <button class="myButton" type="submit" value="Blocks" name="blocks">Blocks</button>
			                    <button class="myButton" type="submit" value="Blocks" name="blocks">Blocks</button>
			                    <button class="myButton" type="submit" value="Blocks" name="blocks">Blocks</button>
			                    <button class="myButton" type="submit" value="Blocks" name="blocks">Blocks</button>
			                    <button class="myButton" type="submit" value="Blocks" name="blocks">Blocks</button>
					        </form>
			    	</div>
		        </div>

		    <?php
		    }
		    ?>    
 	</div>
 	</section>		
  <footer>
        <div id="footer">

        </div>
  </footer>

  
</body>
</html>
