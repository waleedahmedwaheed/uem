<?php include_once('conn/db.php'); 

session_start();

if ( !isset($_SESSION['SESS_NAME']) ) {
	//header('location: login.php');
} else {
	
	$qry = "SELECT * FROM users WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_assoc($result);
	//exit;
}
?>
  <!-- Main Header -->
    <header class="main-header">
    	<div class="auto-container clearfix">
        	<!--Logo-->
            <div class="logo"><a href="index.php"><img src="images/logo.jpg" alt="UEM" title="UEM"></a></div>
            
            <!--Main Menu-->
            <nav class="main-menu">
                <div class="navbar-header">
                    <!-- Toggle Button -->      
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                
                <div class="navbar-collapse collapse clearfix">                                                                                              
                    <ul class="navigation">
                        <li class="current dropdown"><a href="index.php">Home</a></li>
                        
						
						<li class="dropdown"><a href="photos.php">Photos</a>
							<ul class="submenu">
                                <li><a href="votings.php"> Voting </a></li>
                            </ul>
						</li>
						
						<?php if (isset($_SESSION['SESS_NAME'])) {
 ?>						
						<li class="dropdown"><a href="events.php">Events</a>
                            <ul class="submenu">
                                <li><a href="create_event.php">Create Event</a></li>
                                <li><a href="own_events.php">Your Events</a></li>
                            </ul>
                        </li>
						
						<li class="dropdown"><a href="#">Account</a>
                            <ul class="submenu">
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
 
								<?php } else { ?>
							<li class="dropdown"><a href="events.php">Events</a></li>	
								<li class="dropdown"><a href="#">Account</a>
                            <ul class="submenu">
                                <li><a href="register.php">Register</a></li>
                                <li><a href="login.php">Login</a></li>
                            </ul>
                        </li>
                        
						<?php } ?>
						
                        <li><a href="result.php">Results</a></li>
                        
						<li><a href="about.php">About</a></li>
						
						<li><a href="contact.php">Contact</a></li>
						
						
						
						
								
                    </ul>
                </div>
            </nav>
            <!--Main Menu End-->
            
        </div>
    </header>
    <!--End Main Header -->
    