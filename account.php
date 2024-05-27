<?php
// Database connection credentials
$db_host = "localhost";
$db_username = "user_valo";
$db_password = "123";
$db_name = "valo_db";

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert team data into the database
function insertTeamData($name, $leader_name, $match_date, $region_server, $conn) {
    // Prepare and bind the SQL statement
    $sql = "INSERT INTO teams (name, leader_name, match_date, region_server) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $leader_name, $match_date, $region_server);

    // Execute the statement
    if ($stmt->execute()) {
        // Get the auto-incremented team ID
        $team_id = $conn->insert_id;
        echo "New team created successfully with ID: " . $team_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['teamName'];
    $leader_name = $_POST['teamLeaderName'];
    $match_date = $_POST['matchDate'];
    $region_server = $_POST['regionServer'];

    // Call the function to insert team data
    insertTeamData($name, $leader_name, $match_date, $region_server, $conn);
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>VALORANT Gaming Admin System</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="valo-icon.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->
		            <div class="app-search-box col">
		                <form class="app-search-form">   
							<input type="text" placeholder="Search..." name="search" class="form-control search-input">
							<button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> 
				        </form>
		            </div><!--//app-search-box-->
		            
		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-notifications-dropdown dropdown">    
				            <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        </a><!--//dropdown-toggle-->
					        
					        <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
					            <div class="dropdown-menu-header p-3">
						            <h5 class="dropdown-menu-title mb-0">Notifications</h5>
						        </div><!--//dropdown-menu-title-->
						        <div class="dropdown-menu-content">
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										       <img class="profile-image" src="assets/images/profiles/profile-1.png" alt="">
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">Amy shared a file with you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
											        <div class="meta"> 2 hrs ago</div>
										        </div>
									        </div><!--//col--> 
								        </div><!--//row-->
								        <a class="link-mask" href="#"></a>
							       </div><!--//item-->
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										        <div class="app-icon-holder">
											        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
	  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
	</svg>
										        </div>
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">You have a new invoice. Proin venenatis interdum est.</div>
											        <div class="meta"> 1 day ago</div>
										        </div>
									        </div><!--//col-->
								        </div><!--//row-->
								        <a class="link-mask" href="#"></a>
							       </div><!--//item-->
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										        <div class="app-icon-holder icon-holder-mono">
											        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
</svg>
										        </div>
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">Your report is ready. Proin venenatis interdum est.</div>
											        <div class="meta"> 3 days ago</div>
										        </div>
									        </div><!--//col-->
								        </div><!--//row-->
								        <a class="link-mask" href="#"></a>
							       </div><!--//item-->
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										       <img class="profile-image" src="assets/images/profiles/profile-2.png" alt="">
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">James sent you a new message.</div>
											        <div class="meta"> 7 days ago</div>
										        </div>
									        </div><!--//col--> 
								        </div><!--//row-->
								        <a class="link-mask" href="#"></a>
							       </div><!--//item-->
						        </div><!--//dropdown-menu-content-->
						        
						        <div class="dropdown-menu-footer p-2 text-center">
							        <a href="#">View all</a>
						        </div>
															
							</div><!--//dropdown-menu-->					        
				        </div><!--//app-utility-item-->
			            <div class="app-utility-item">

					    </div><!--//app-utility-item-->
			            
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png" alt="user profile"></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="account.php">Account</a></li>
								<li><a class="dropdown-item" href="login.php">Log Out</a></li>
							</ul>
			            </div><!--//app-user-dropdown--> 
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
<div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <svg height="50pt" viewBox="0 0 1000 150" width="300pt" xmlns="http://www.w3.org/2000/svg">
 <a id="Valorant_logo" href="index.php">
  <path fill="#ff4655" d="m459.10547 14.35156h18.42578l.05859 56.5c0 .72657.58985 1.32422 1.32422 1.32422l10.55078-.00781c.73438 0 1.32422-.58984 1.32422-1.32422l-.0625-56.49219h23.10938c.67969 0 1.0664-.79297.63281-1.32422l-7.91016-9.91015c-.66015-.83203-1.66406-1.3125-2.72265-1.31641h-44.73047c-.73438 0-1.32422.58985-1.32422 1.32422v9.91016c0 .71875.58984 1.3164 1.32422 1.3164m-444.73828 56.50782 54.05469-67.73438c.42578-.53125.04296-1.32422-.63672-1.32422h-13.51563c-1.05859 0-2.0664.48828-2.72656 1.31641l-38.34766 48.04687v-48.04687c0-.73438-.58984-1.32422-1.32031-1.32422h-10.55469c-.73047 0-1.32031.58984-1.32031 1.32422v67.73437c0 .73438.58984 1.32422 1.32031 1.32422h10.32422c1.0586 0 2.0586-.48437 2.72266-1.3164m38.10937 0 18.59375-23.29688 18.59375 23.29688c.66016.83203 1.66797 1.3164 2.73047 1.3164h10.32031c.73438 0 1.32422-.58984 1.32422-1.32422v-67.73437c0-.72656-.58984-1.32422-1.32422-1.32422h-8.65625c-2.12109 0-4.1289.96484-5.45703 2.625l-53.00781 66.42578c-.42578.53125-.04297 1.32422.63672 1.32422h13.51562c1.06641.00781 2.06641-.47656 2.73047-1.30859m38.35938-49.48829v31.20704l-12.45313-15.60157zm301.80859 49.47266-54.05078-67.73437c-.66016-.82813-1.66406-1.3125-2.72266-1.31641h-10.33203c-.73047 0-1.32031.58984-1.32031 1.32422v67.73437c0 .73438.58984 1.32422 1.32031 1.32422h10.32422c1.0586 0 2.06641-.48437 2.72266-1.3164l18.59375-23.29688 18.58984 23.29688c.66406.83203 1.66406 1.3164 2.72656 1.3164h13.51563c.67969 0 1.05859-.79297.63281-1.33203m-42.78906-33.86719-12.45703 15.60938v-31.21485zm-148.74609-36.9375c-20.375 0-36.89063 16.53907-36.89063 36.94532s16.51563 36.94921 36.89063 36.94921c20.3789 0 36.89453-16.54296 36.89453-36.94921.00781-20.40625-16.51563-36.94532-36.89453-36.94532m0 61.33594c-13.08985 0-23.69532-10.92187-23.69532-24.39062s10.60547-24.39844 23.69532-24.39844c13.09375 0 23.69921 10.92187 23.69921 24.39844.00782 13.46875-10.60546 24.39062-23.69921 24.39062m234.3125-58.25781v48.04687l-38.34766-48.05468c-.66406-.82813-1.66406-1.3125-2.72656-1.31641h-10.33594c-.72656 0-1.32031.58984-1.32031 1.32422v32.64062c0 .79297.26562 1.5625.76562 2.1836l10.98047 13.76172c.48438.60546 1.45703.26171 1.45703-.50782v-28.40625l38.35547 48.07032c.66016.83203 1.66406 1.3164 2.72266 1.3164h10.32422c.73046 0 1.32031-.58984 1.32031-1.32422v-67.73437c0-.72656-.58985-1.32422-1.32031-1.32422h-10.55469c-.73047 0-1.32031.59766-1.32031 1.32422m-128.94532 14.67969v-14.67969c0-.73438-.58984-1.32422-1.32031-1.32422h-54.01562c-.73047 0-1.32032.58984-1.32032 1.32422v67.73437c0 .73438.58985 1.32422 1.32032 1.32422h10.55468c.73047 0 1.32032-.58984 1.32032-1.32422v-56.49218h30.26562l-20.42969 25.60937c-.3789.47656-.3789 1.16406 0 1.65234l23.33985 29.2461c.66406.83203 1.66406 1.3164 2.72656 1.3164h13.51562c.67969 0 1.0586-.79296.63282-1.32421l-23.98828-30.05469 16.6289-20.8086c.49219-.63671.76953-1.40625.76953-2.19921m-185.27343 54.3789h31.32031c1.05859 0 2.0664-.48437 2.72265-1.3164l7.91016-9.91797c.42578-.53125.04688-1.32422-.63281-1.32422h-29.44531v-56.5c0-.73438-.58985-1.32422-1.32032-1.32422h-10.55468c-.73047 0-1.32032.58984-1.32032 1.32422v67.73437c0 .72657.59766 1.32422 1.32032 1.32422"/>
 </a>
</svg>
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link active" href="index.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
		  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
		</svg>
						         </span>
		                         <span class="nav-link-text">Dashboard</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="docs.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"/>
  <path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"/>
</svg>
						         </span>
		                         <span class="nav-link-text">VALORANT Map List</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="orders.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
  <circle cx="3.5" cy="5.5" r=".5"/>
  <circle cx="3.5" cy="8" r=".5"/>
  <circle cx="3.5" cy="10.5" r=".5"/>
</svg>
						         </span>
		                         <span class="nav-link-text">Match Setup</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
	  <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
	</svg>
						         </span>
		                         <span class="nav-link-text">Team Information</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="account.php">Create</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-item-->
					    <li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
	</svg>
						         </span>
		                         <span class="nav-link-text">External</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="signup.php">Create another account</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="reset-password.php">Reset password</a></li>
						        </ul>
					        </div>
					    </li><!--//nav-item-->

					   
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="charts.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
	</svg>
						         </span>
		                         <span class="nav-link-text">Arsenal Chart</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link">
						        <span class="nav-icon">
						         </span>
		                         
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->					    
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" href="#">
							        <span class="nav-icon">

							        </span>
			                        
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" >
							        <span class="nav-icon">
							        </span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
						    
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" >
							        <span class="nav-icon">						          
							        </span>		                        
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
					    </ul><!--//footer-menu-->
				    </nav>
			    </div><!--//app-sidepanel-footer-->
		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Create Team</h1>
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        </svg>
                                    </div><!--//icon-holder-->
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Team Application Form</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <form>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2"><strong>Team Logo</strong></div>
                                            <input type="file" class="form-control-file" id="teamLogo">
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Team Name</strong></div>
                                            <input type="text" class="form-control" id="teamName" name="teamName" placeholder="Enter team name">

                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Team Leader Name</strong></div>
                                            <input type="text" class="form-control" id="teamLeaderName" name="teamLeaderName" placeholder="Enter team leader name">
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div>
                                    <div class="item border-bottom py-3">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto">
            <div class="item-label"><strong>Match Date</strong></div>
            <input type="date" class="form-control" id="matchDate" name="matchDate">
        </div><!--//col-->
</div><!--//item-->

                                </div><!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Region Server</strong></div>
                                            <select class="form-select" id="regionServer" name="regionServer">
                                                <option value="PH">PH</option>
                                                <option value="NA">NA</option>
                                                <option value="EUW">EUW</option>
                                                <option value="JP">JP</option>
                                                <option value="KR">KR</option>
                                            </select>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                
                                <div class="mb-3">
                                    <label class="form-label"><strong>Team Members</strong></label>
                                    <div class="mb-3">
                                        <label for="member1Name" class="form-label">Member 1 Name</label>
                                        <input type="text" class="form-control" id="member1Name" name="member1Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member1Role" class="form-label">Member 1 Role</label>
                                        <input type="text" class="form-control" id="member1Role" name="member1Role" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member2Name" class="form-label">Member 2 Name</label>
                                        <input type="text" class="form-control" id="member2Name" name="member2Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member2Role" class="form-label">Member 2 Role</label>
                                        <input type="text" class="form-control" id="member2Role" name="member2Role" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member3Name" class="form-label">Member 3 Name</label>
                                        <input type="text" class="form-control" id="member3Name" name="member3Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member3Role" class="form-label">Member 3 Role</label>
                                        <input type="text" class="form-control" id="member3Role" name="member3Role" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member4Name" class="form-label">Member 4 Name</label>
                                        <input type="text" class="form-control" id="member4Name" name="member4Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="member4Role" class="form-label">Member 4 Role</label>
                                        <input type="text" class="form-control" id="member4Role" name="member4Role" required>
                                    </div>
                                </div>
							<button type="submit" class="btn btn center-button" style="background-color: #a83c49;">Create Team</button>
                            </form>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
        </div><!--//container-xl-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->




								       
							        
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

