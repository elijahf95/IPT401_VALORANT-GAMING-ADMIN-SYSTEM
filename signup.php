<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost"; // Your MySQL server address
    $username = "valo"; // Your MySQL username
    $password = "123"; // Your MySQL password
    $dbname = "valo_db"; // Your MySQL database name

    $sql = 'SELECT * FROM valo_table';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the data
    $name = $_POST['signup-name'];
    $email = $_POST['signup-email'];
    $password = $_POST['signup-password'];

    // Insert data into the database
    $sql = "INSERT INTO valo_table (name, email, password) VALUES ('".$name."', '".$email."', '".$password."')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement and connection
    $result = $conn->query($sql);
    $stmt->close();
    $conn->close();
}
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
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4">
				    	<a href="index.php"> <svg width="300pt" height="200pt" viewBox="0 0 1100 697" version="1.1" xmlns="http://www.w3.org/2000/svg">
<g id="f000000ff">
</g>
<g id="ff4655ff">
<path fill="#ff4655" opacity="1.00" d=" M 245.44 4.65 C 248.61 2.76 250.63 6.58 252.34 8.59 C 362.37 146.24 472.53 283.79 582.55 421.44 C 584.81 423.40 583.10 427.59 580.05 427.14 C 527.37 427.20 474.68 427.16 422.00 427.16 C 417.78 427.21 413.74 425.11 411.15 421.82 C 356.49 353.53 301.86 285.21 247.20 216.91 C 244.88 214.15 243.68 210.58 243.83 206.99 C 243.83 141.01 243.85 75.02 243.81 9.04 C 243.84 7.48 243.78 5.46 245.44 4.65 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 754.32 4.33 C 756.57 3.48 759.05 5.56 758.72 7.92 C 758.80 73.93 758.71 139.94 758.76 205.95 C 758.91 209.69 758.09 213.56 755.66 216.50 C 739.05 237.28 722.42 258.05 705.81 278.82 C 703.04 282.42 698.51 284.41 693.98 284.18 C 641.65 284.13 589.31 284.21 536.98 284.14 C 533.89 284.62 532.13 280.45 534.41 278.44 C 606.98 187.65 679.61 96.89 752.22 6.12 C 752.77 5.34 753.47 4.74 754.32 4.33 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 392.51 540.68 C 408.39 538.24 425.06 541.05 439.18 548.77 C 452.87 556.18 464.12 568.01 470.81 582.08 C 478.23 597.51 479.96 615.55 475.77 632.15 C 471.79 648.22 462.16 662.80 449.02 672.87 C 426.55 690.57 393.62 693.18 368.60 679.35 C 354.20 671.62 342.52 658.99 335.93 644.03 C 327.63 625.45 327.52 603.42 335.61 584.74 C 345.36 561.58 367.62 544.27 392.51 540.68 M 396.52 565.68 C 380.58 568.09 366.56 579.41 360.31 594.20 C 353.85 608.92 355.12 626.77 363.73 640.36 C 370.79 651.81 382.83 660.15 396.15 662.29 C 409.69 664.67 424.11 660.48 434.43 651.44 C 446.20 641.37 452.57 625.49 451.24 610.07 C 450.24 596.31 443.18 583.11 432.17 574.76 C 422.19 567.04 408.99 563.63 396.52 565.68 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 0.00 544.09 C 6.18 542.41 12.71 543.77 19.03 543.29 C 21.28 543.60 24.70 542.44 25.97 544.98 C 26.41 548.29 26.13 551.64 26.17 554.98 C 26.17 584.09 26.16 613.21 26.17 642.32 C 51.69 610.43 77.18 578.52 102.67 546.61 C 104.00 544.95 105.81 543.48 108.04 543.44 C 115.36 543.12 122.69 543.48 130.02 543.30 C 132.76 543.35 135.80 542.83 138.14 544.65 C 129.61 555.89 120.57 566.74 111.83 577.82 C 85.63 610.62 59.42 643.41 33.21 676.20 C 31.26 678.58 29.55 681.20 27.22 683.26 C 24.93 685.15 21.74 684.56 19.00 684.71 C 12.67 684.49 6.30 685.05 0.00 684.27 L 0.00 544.09 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 177.20 549.17 C 179.92 545.48 184.38 543.24 188.97 543.34 C 194.63 543.35 200.30 543.24 205.96 543.39 C 207.91 543.18 209.00 545.20 208.75 546.92 C 208.75 591.62 208.75 636.33 208.75 681.03 C 209.01 682.75 207.96 684.85 205.96 684.63 C 198.95 684.71 191.94 684.71 184.93 684.62 C 182.36 684.69 180.33 682.88 178.89 680.95 C 166.77 665.73 154.59 650.56 142.47 635.34 C 130.13 650.71 117.86 666.13 105.55 681.53 C 104.23 683.22 102.32 684.64 100.08 684.61 C 92.05 684.79 84.01 684.57 75.97 684.70 C 74.00 684.57 71.53 685.20 70.31 683.15 C 105.73 638.33 141.63 593.87 177.20 549.17 M 157.23 614.01 C 165.55 624.36 173.75 634.80 182.13 645.09 C 182.19 624.34 182.17 603.60 182.15 582.85 C 173.82 593.22 165.52 603.61 157.23 614.01 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 240.50 546.89 C 240.31 545.31 241.17 543.37 243.00 543.41 C 250.05 543.24 257.13 543.31 264.19 543.38 C 266.21 543.16 267.47 545.16 267.15 547.01 C 267.19 584.47 267.17 621.93 267.16 659.40 C 286.76 659.47 306.36 659.35 325.95 659.45 C 327.63 659.09 328.68 661.22 327.35 662.35 C 322.25 668.92 316.98 675.37 311.79 681.89 C 310.22 684.01 307.56 684.87 305.00 684.68 C 284.34 684.61 263.67 684.76 243.01 684.61 C 241.11 684.69 240.32 682.63 240.50 681.04 C 240.50 636.33 240.49 591.61 240.50 546.89 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 501.67 546.94 C 501.21 544.88 502.87 543.01 504.96 543.35 C 540.68 543.31 576.39 543.33 612.10 543.34 C 613.75 543.11 615.70 544.14 615.54 546.02 C 615.65 555.70 615.56 565.39 615.58 575.07 C 615.79 577.38 614.57 579.41 613.15 581.11 C 602.84 593.86 592.70 606.74 582.36 619.47 C 581.85 620.37 580.15 621.56 581.44 622.60 C 597.06 642.24 612.81 661.79 628.41 681.44 C 629.54 682.38 629.56 684.62 627.71 684.57 C 618.45 684.77 609.18 684.67 599.92 684.62 C 596.29 684.67 594.24 681.30 592.23 678.82 C 577.89 660.83 563.54 642.85 549.15 624.91 C 548.08 623.59 546.44 621.68 547.93 620.05 C 561.48 602.85 575.28 585.83 588.90 568.67 C 568.73 568.58 548.55 568.84 528.39 568.54 C 528.03 606.34 528.41 644.16 528.20 681.96 C 528.43 683.72 526.61 684.89 525.03 684.65 C 518.03 684.65 511.03 684.76 504.03 684.60 C 502.17 684.62 501.42 682.53 501.66 680.98 C 501.67 636.30 501.66 591.62 501.67 546.94 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 651.16 547.01 C 650.84 545.21 652.01 543.15 654.03 543.38 C 660.70 543.26 667.39 543.33 674.07 543.35 C 676.57 543.20 678.99 544.37 680.46 546.40 C 713.79 588.10 747.11 629.81 780.44 671.51 C 783.31 675.36 786.75 678.82 789.24 682.95 C 789.00 683.34 788.52 684.12 788.28 684.51 C 780.20 684.92 772.09 684.51 764.00 684.69 C 760.81 684.74 756.95 685.01 754.84 682.09 C 742.32 666.56 729.92 650.93 717.46 635.35 C 705.12 650.71 692.84 666.13 680.54 681.52 C 679.22 683.23 677.29 684.63 675.05 684.62 C 668.07 684.72 661.09 684.69 654.12 684.64 C 652.04 684.93 650.83 682.83 651.16 681.00 C 651.16 636.34 651.17 591.67 651.16 547.01 M 677.77 582.92 C 677.74 603.66 677.74 624.39 677.77 645.13 C 686.09 634.77 694.37 624.38 702.66 614.00 C 694.35 603.65 686.13 593.22 677.77 582.92 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 768.68 547.05 C 768.47 545.50 769.16 543.48 770.99 543.44 C 777.64 543.17 784.30 543.40 790.95 543.33 C 793.53 543.16 796.23 544.01 797.80 546.17 C 823.45 578.19 849.00 610.29 874.67 642.29 C 874.67 610.52 874.66 578.75 874.67 546.97 C 874.24 544.97 875.80 543.03 877.89 543.35 C 884.93 543.36 891.97 543.19 899.00 543.44 C 900.80 543.51 901.45 545.51 901.25 547.05 C 901.25 591.69 901.25 636.33 901.25 680.97 C 901.46 682.49 900.79 684.55 898.97 684.58 C 891.98 684.78 884.97 684.64 877.98 684.65 C 875.67 684.74 873.48 683.63 872.12 681.80 C 846.50 649.81 820.97 617.74 795.33 585.77 C 795.30 604.52 795.38 623.28 795.30 642.03 C 795.79 643.70 793.41 645.13 792.40 643.61 C 785.04 634.68 777.93 625.54 770.67 616.53 C 769.05 614.76 768.53 612.38 768.65 610.05 C 768.69 589.05 768.64 568.05 768.68 547.05 Z" />
<path fill="#ff4655" opacity="1.00" d=" M 919.64 546.01 C 919.43 544.19 921.37 543.14 922.96 543.35 C 952.32 543.30 981.68 543.35 1011.04 543.33 C 1013.58 543.17 1016.24 544.00 1017.79 546.14 C 1022.99 552.62 1028.24 559.08 1033.35 565.64 C 1034.70 566.74 1033.69 568.92 1031.99 568.62 C 1016.64 568.74 1001.28 568.62 985.92 568.67 C 985.85 606.11 986.01 643.55 986.00 680.99 C 986.36 682.78 985.13 684.84 983.13 684.63 C 976.12 684.69 969.10 684.72 962.10 684.62 C 960.61 684.75 959.31 683.43 959.46 681.96 C 959.21 644.20 959.45 606.43 959.25 568.67 C 947.14 568.64 935.02 568.71 922.92 568.65 C 921.31 568.84 919.39 567.73 919.64 565.91 C 919.54 559.28 919.53 552.64 919.64 546.01 Z" />
</g>
</svg></a></div>




					<h2 class="auth-heading text-center mb-4">Sign up your Account</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form">         
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Name</label>
								<input id="signup-name" name="signup-name" type="text" class="form-control signup-name" placeholder="Full name" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="signup-email" type="email" class="form-control signup-email" placeholder="Email" required="required">
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
							<div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
									<label class="form-check-label" for="RememberPassword">
									I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
									</label>
								</div>
							</div><!--//extra-->
							
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login.php" >Log in</a></div>
					</div><!--//auth-form-container-->	
			
	    
			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div></div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

