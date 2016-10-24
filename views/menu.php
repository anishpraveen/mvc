<?php
include_once 'nof5.phar';
?>
	<!DOCTYPE html>
	<html lang="en" ng-app="css" class="ng-scope">

	<head>
		<base href="/">
		<link rel="stylesheet" href="../views/css/menu.css">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<link rel="shortcut icon" href="https://s3.amazonaws.com/menumaker-assets/fav.png" type="image/png">
		 CSS -->
		<!-- SCRIPTS -->
		 <script type="text/javascript">
			function logout(){
				//alert("exit");
				if (true) {
                $.ajax({
                    type: 'post',
                    url: 'log.php',
                    
                    success: function (response) {
                        if (response == "OK") {
                            alert("logged out");
							window.location.href="index.php";
                            return true;
                        }
                        else {
                            alert("error");
                            return false;
                        }
                        
                    }
                });
            }
            else {
                
                return false;
            }
			}

        </script>
	</head>

	<body>
		<!-- /row -->
		<div class="row ">
			<div class="col-md-12">
				<div id="cssmenu">
					<div id="menu-button">Menu</div>
					<ul>
						<!-- target="_blank" -->
						<?php 
							$string="";
							if(isset($_SESSION['username']) ){
								$string.="<li class='active'><a href='' data-title='Home'>Home</a></li>";
								$string.="<li><a href='?controller=posts&action=index' data-title='Posts'>Posts</a></li>";
								$string.="<li><a href='logout.php' onclick='logout();return false;' data-title='logout'>logout</a></li>";
							}

							else{
								$string.="<li><a href='?controller=login&action=login' data-title='Login'>Login</a></li>";
								$string.="<li><a href='?controller=register&action=registerPage' data-title='Register'>Register</a></li>";
							}
							echo $string;
						?>
						
						
						<!--<li><a href='logout.php' data-title='logout' onclick='logout();return false;'>logout</a></li>-->
						<li><a href="#" data-title="Contact">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>

	</html>