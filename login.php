<?php
	include "config/koneksi.php";
?>

<?php
	$mac=$_POST['mac'];
	$ip=$_POST['ip'];
	$username=$_POST['username'];
	$linklogin=$_POST['link-login'];
	$linkorig=$_POST['link-orig'];
	$error=$_POST['error'];
	$chapid=$_POST['chap-id'];
	$chapchallenge=$_POST['chap-challenge'];
	$linkloginonly=$_POST['link-login-only'];
	$linkorigesc=$_POST['link-orig-esc'];
	$macesc=$_POST['mac-esc'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>FREE WIFI</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script> 
	    window.intergramId = "619069039";
	    window.intergramCustomizations = {
	        titleClosed: 'Chat With Us',
	        titleOpen: 'Opened chat title',
	        introMessage: 'Kami sedang online dan siap berinteraksi dengan Anda sekarang. Katakan sesuatu untuk memulai obrolan langsung.',
	        autoResponse: 'A message that is sent immediately after the user sends its first message',
	        autoNoResponse: 'A message that is sent one minute after the user sends its first message ' +
	                        'and no response was received',
	        mainColor: "#0088cc", // Can be any css supported color 'red', 'rgb(255,87,34)', etc
	        alwaysUseFloatingButton: true // Use the mobile floating button also on large screens
	    };
	</script>
	<script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>

	<style type="text/css">
		html, body{
			height: 100%;
			margin-left: 2%;
			margin-right: 2%;
			padding-top: 5px;
		}

		/* jarak grid atas bawah*/
		div{         
            padding: 0.5px;
        }

        /*Jarak grid kanan kiri*/
        .row.no-gutters {
		   margin-right: 0;
		   margin-left: 0;
		}
		
		.row.no-gutters > [class^="col-"],
		.row.no-gutters > [class*=" col-"] {
		   padding-right: 3px;
		   padding-left: 3px;
		}

        /*slide show*/
		.carousel-inner>.item>img, .carousel-inner>.item>a>img {
		    height: 280px;
			width:  100%;
		}

		 .carousel-control {
		    position: absolute;
		    top: 40%;
		    left: 15px;
		    width: 40px;
		    height: 40px;
		    margin-top: -20px;
		    font-size: 30px;
		    font-weight: 100;
		    line-height: 30px;
		    color: #ffffff;
		    text-align: center;
		    background: #222222;
		    border: 2px solid #ffffff;
		    -webkit-border-radius: 23px;
		    -moz-border-radius: 3px;
		    border-radius: 23px;
		    opacity: 0.5;
		    filter: alpha(opacity=50);
		}
		.carousel-control.right {
		    right: 15px;
		    left: auto;
		}
		.carousel-caption {
		    position: absolute;
		    right: 0;
		    bottom: 0;
		    left: 0;
		    font-family: roboto; 
		    padding: 10px;
		    background: #333333;
		    background: rgba(0, 0, 0, 0.75);
		}
		.carousel-caption p {
		    margin-bottom: 0;
		}
		.carousel-indicators{
		   top:0px;
		   
		}

		@media screen and (max-width: 700px){
		     .carousel-caption p {
		        font-size: 13px;
		    }
		    .carousel-caption {
		    background: rgba(0, 0, 0, 0.55);
		    }
		    .carousel-control {
		        top: 20%;
		    }
		}   
		/*login Form*/
			.login-form {
				width: 100%;
		    	/*margin: auto;*/
			}
		    .login-form form {
		    	height: 325px;
		    	margin-bottom: 0px;
		        background: #f7f7f7;
		        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		        padding: 20px;
		    }
		    .login-form h2 {
		        margin: 0 0 15px;
		    }
		    .login-form .hint-text {
				color: #777;
				padding-bottom: 15px;
				text-align: center;
		    }
		    .form-control, .btn {
		        min-height: 30px;
		        border-radius: 5px;
		    }
		    .login-btn {        
		        font-size: 15px;
		        font-weight: bold;
		    }
		    .or-seperator {
		        margin: 20px 0 10px;
		        text-align: center;
		        border-top: 1px solid #ccc;
		    }
		    .or-seperator i {
		        padding: 0 10px;
		        background: #f7f7f7;
		        position: relative;
		        top: -11px;
		        z-index: 1;
		    }
		    .social-btn .btn {
		        margin: 10px 0;
		        font-size: 15px;
		        text-align: left; 
		        line-height: 24px;       
		    }
			.social-btn .btn i {
				float: left;
				margin: 4px 15px  0 5px;
		        min-width: 15px;
			}
			.input-group-addon .fa{
				font-size: 18px;
			}
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '330224907791808', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
        document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
        document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
        document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
        document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';

        //save data
        saveUserData(response);
    });
}

// Save user data to the database
function saveUserData(userData){
    $.post('config/userdata.php', {oauth_provider:'facebook',userData: JSON.stringify(userData)}, function(data){ return true; });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = '<img src="assets/img/fb.png" style="width:40%; height:40%;"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}
</script>

</head>
<body style="background-image: url(assets/img/backgrounds/1.jpg)" style="width: 100%; height: 100%;">
<div class="container">
    <div class="row row-table">
    	<div class="row no-gutters">
	        <div class="col-lg-3 col-table">
	            <div class="col-content bg">
	                <img src="assets/img/2.png" class="img-thumbnail" style="width: 100%; height: 80px;">
	            </div>
	        </div>
	        <div class="col-lg-9 col-table">
	            <div class="col-content bg">
	                 <img src="assets/img/banner.png" class="img-rounded" style="width: 100%; height: 80px;"> 
	            </div>
	        </div> 
        </div>
    </div>
</div>

<div class="container">
    <div class="row row-table">
    	<div class="row no-gutters">
	    	<div class="col-lg-5 col-table">		
	            <div class="col-content bg">
				    <div class="login-form"> 
				        <form action="" method="post">
				      
						      <ul class="nav nav-tabs">
			    				<li class="active"><a data-toggle="tab" href="#login">Social Media</a></li>
							    <li><a data-toggle="tab" href="#menu1">NIS</a></li>
							  </ul>

						    <div class="tab-content">
			    			  	<div id="login" class="tab-pane fade in active">
							        <div class="or-seperator"><i>User Login</i></div>
							        <div class="text-center social-btn">
							        	<!-- Display login status -->
										<div id="status"></div>

										<!-- Facebook login or logout button -->
										<a href="javascript:void(0);" onclick="fbLogin()" id="fbLink"><img src="assets/img/fb.png" style="width: 40%; height: 40%" /></a>

										<!-- Display user profile data -->
										<div id="userData"></div>
							        	
							            <!-- <a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Log in with <b>Twitter</b></a>
										<a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Log in with <b>Google</b></a> -->
									</div>
						      	</div>
							
						      	<div id="menu1" class="tab-pane fade">
										<form name="sendin" action="<?php echo $linkloginonly; ?>" method="post">
											<input type="hidden" name="username" />
											<input type="hidden" name="password" />
											<input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
											<input type="hidden" name="popup" value="true" />
										</form>
										<script type="text/javascript" src="assets/js/md5.js"></script>
										
										<script type="text/javascript">

										
										function doLogin() {
										<?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
										document.sendin.username.value = document.login.username.value;
										document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
										document.sendin.submit();
										return false;
										}
										
										</script>
										
										<div class="or-seperator"><i>or</i></div>

										<form name="login" action="<?php echo $linkloginonly; ?>" method="post" onSubmit="return doLogin()" >
										<input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
										<input type="hidden" name="popup" value="true" />

							        <div class="form-group">
							        	<div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-user"></i></span>
							                <input type="text" class="form-control" name="username" value="<?php echo $username;?>" placeholder="Username" required="required">
							            </div>
							        </div>
									<div class="form-group">
							            <div class="input-group">
							                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
							                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
							            </div>
							        </div>        
							        <div class="form-group">
							            <button type="submit" value="OK" class="btn btn-success btn-block login-btn">Connect</button>
							            
							        </div>
										<!-- $(if error) -->
										<br /><div style="color: #FF8080; font-size: 9px"><?php echo $error; ?></div>
										<!-- $(endif) -->

										<script type="text/javascript">
										<!--
										document.login.username.focus();
										//-->
										</script>
									</form>
						      	</div>
						    </div>
				    	</form>
				 	</div>
				</div>
	        </div> 
	        <div class="col-lg-7 col-table  ">
				<div class="panel panel-primary">
					<div class="panel-heading">Headline News - <?php
	                		echo date('  l, d M Y');
	           		?>	
	           		</div>
											
					<!-- Slider News by Carousel -->		
						<div id='myCarousel' class='carousel slide' data-ride='carousel'>				
							<ol class='carousel-indicators'>
							  <?php	
								$query      = "select * from berita order by id desc limit 5";
								$res        = mysqli_query($con,$query);
								$count      = mysqli_num_rows($res);
								$slides     ='';
								$Indicators ='';
								$counter    =0;
								echo	"<li data-target='#myCarousel' data-slide-to='0'></li>";
								echo    "<li data-target='#myCarousel' data-slide-to='1'></li>";
								echo    "<li data-target='#myCarousel' data-slide-to='2'></li>";
								echo    "<li data-target='#myCarousel' data-slide-to='3'></li>";
								echo    "<li data-target='#myCarousel' data-slide-to='4'></li>";
							  ?>		
							</ol>															
								<div class='carousel-inner'>
									<?php
									  $query      = "select * from berita order by id desc limit 5";
									  $res        = mysqli_query($con,$query);
									  $count      =   mysqli_num_rows($res);
									  while($c=mysqli_fetch_array($res)){
																	
										$judul  = $c['judul'];
										$konten = $c['konten'];
										$gbr    = $c['gambar'];
										$artikel= substr($konten,0,200);
										$spasi  =strrpos($artikel,' ');
										$ringkas= substr($artikel,0,$spasi); // pemecah artikel
										if($counter==0)
										{
											echo"<div class='item active'>";		 								
											echo	"<a href=''>";
											echo 		"<img src='admin/img/$gbr'>";
											echo	"</a>";
											echo	"<div class='container'>";				
											echo	"<div class='carousel-caption left-caption style='background-color:#EE0930'>";
											echo		"<a href=''> <font color=#ffffffff style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 13px;'>";
											echo			"<h5 class='text-left'>".$judul."</h5></font>";
											echo	   "</a>";
											echo		"<br>";
											echo		"<p style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 10px; text-align: justify;'> ".$ringkas."</p>";
											echo		"<br> ";
											echo		"<p><a href='https://itn.ac.id/'>";
											echo			"<h5 class='text-left'>Selengkapnya</b></h5>";
											echo		"</p>";
											echo   "</div>";
											echo"</div>";
											echo 	"</div>";
										}
										else
										{
											echo	"<div class='item'>";				
											echo		"<a href=''>";
											echo			"<img src='admin/img/$gbr'>";
											echo		"</a>";											
											echo		"<div class='container'>";
																	
											echo		"<div class='carousel-caption left-caption style='background-color:#EE0930'>";
											echo			"<a href=''> <font color=#ffffffff style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 13px;'><h5 class='text-left'>".$judul."</h5></font>
											</a>";
											echo	  "<br>";
											echo	  "<p style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 10px; text-align: justify;'> 
													".$ringkas."</p>";
											echo	"<br>";
											echo	"<p><a href='https://itn.ac.id/'>";
											echo			"<h5 class='text-left'>Selengkapnya</b></h5>";
											echo		"</p>";				
											echo	"</div>";
											echo		"</div>";
											echo	"</div>";
													}
													$counter++;
													}
														   
											echo"</div>";
											echo	"<a class='left carousel-control' href='#myCarousel' data-slide='prev'>‹</a>";
											echo	"<a class='right carousel-control' href='#myCarousel' data-slide='next'>&rsaquo;</a>";
														 
											echo"</div>";
																 
											echo"<!-- End Slider Caraousel-->";
											?>
								</div>
						</div> 
				</div> 
			</div>
		</div>
    </div>
</div>

<div class="container">
    <div class="row row-table">
    	<div class="row no-gutters">
	        <div class="col-lg-8 col-table">
	            <div class="col-content bg">
	                <img src="assets/img/bg.jpg" class="img-rounded" style="width: 100%; height: 200px;">
	            </div>
	        </div>
	        <div class="col-lg-4 col-table">
	            <div class="col-content bg">
	                <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTz=0&amp;height=200&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=378dkgs7m5hvvmieqokcum5e0o%40group.calendar.google.com&amp;color=%238D6F47&amp;ctz=Asia%2FJakarta" style="border:solid 1px #777" width="385" height="200" frameborder="0" scrolling="no"></iframe>
	            </div>
	        </div> 
        </div>   
    </div>
</div>

<div class="container">
    <div class="row row-table">
    	<div class="row no-gutters">
	        <div class="col-lg-12 col-table">
	            <div class="col-content bg">
	                <div id="footer">
	                    <div class="panel panel-default">
	                        <div class="panel-footer"><p align="center">
	                            <?php
	                                $tanggal = time () ;
	                                //Untuk mengambil data waktu dan tanggal saat ini dari server 
	                                $tahun= date("Y",$tanggal);
	                                //Memformat agar hanya menampilkan tahun 4 digit angka dengan Y (kapital)
	                                echo " &copy; 2017 - " . $tahun;
	                                /* baris ini mencetak rentang copyright,
	                                Anda perlu mengganti 2011 dengan tahun pertama kali website Anda diluncurkan */
	                            ?> FreeWifi - All Rights Reserved. 
	                            </p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
    	</div>
    </div>
</div>        
</body>
</html>