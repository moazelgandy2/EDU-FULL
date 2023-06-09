<?php
	session_start();
	$_SESSION;

	if (!isset($_SESSION['SESSION_EMAIL'])) {
		header("Location:login.php");
		die();
	}
	include 'connect.php';
	$tim = date("H:i", strtotime("+0 HOURS"));
	$date = date("Y-m-d", strtotime("+0 HOURS"));
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $queryyyy = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $queryyyyy = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $queryy = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
	$queryy2=mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $ti = mysqli_query($conn , "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $ti2 = mysqli_query($conn , "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $admin = mysqli_query($conn , "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    $ad = mysqli_fetch_assoc($admin);

?>


<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>EDU-Live</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="imgs/Amr-logos_black.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="imgs/Amr-logos_black.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="imgs/Amr-logos_black.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/all.min.css"/>
		<link rel="stylesheet" href="css/normalize.css"/>

		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="imgs/Amr-logos_black.png" width="512px" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div>

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
							<div class="dropdown">
								<a
									class="dropdown-toggle no-arrow"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<i class="ion-arrow-down-c"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<span class="user-icon">
								<img src="imgs/avatar.png" alt="" />
							</span>
							<span class="user-name">
								<?php
                                	if (mysqli_num_rows($query) > 0) {
                                	            $row = mysqli_fetch_assoc($query);
                                	            echo $row['name'] ;
                                	            // " <a href='../signup/logout.php'>Logout</a>"
                                	}

                            	?>
							</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.php"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="video-player-3d.php"
								><i class="fa-solid fa-play"></i> Teachers</a
							>
							<a class="dropdown-item" href="help.php"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="logout.php"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
				
			</div>
		</div>



		<div class="left-side-bar">
			
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						

						<li>
							<a href="index.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-house"></i>
								<span class="mtext">Home</span>
							</a>
						</li>
						<li>
							<a href="profile.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-user"></i>
								<span class="mtext">Profile</span>
							</a>
						</li>
						<li>
							<a href="active.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-bag-shopping"></i>
								<span class="mtext">Activation</span>
							</a>
						</li>
						<li id="ex1">
							<a href="exam.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
                                <i class="fa-solid fa-pen"></i>
                                <span class="mtext">Exams</span>
							</a>
						</li>
						<li id="ex2">
							<a href="#" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-calendar4-week"></span -->
								<i class="fa-solid fa-lock"></i>
                                <i class="fa-solid fa-pen"></i>
                                <span class="mtext">Exams</span>
							</a>
						</li>

						<li id="ad">
							<a href="video-player-3d.php" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-diagram-3"></span
								> -->
								<i class="fa-solid fa-play"></i>
								<span class="mtext">Teachers</span>
							</a>
						</li>
						<li id="ad1">
							<a href="#" class="dropdown-toggle no-arrow">
								<!-- <span class="micon bi bi-diagram-3"></span
								> -->
								<i class="fa-solid fa-lock"></i>
								<i class="fa-solid fa-play"></i>
								<span class="mtext">Videos</span>
							</a>
						</li>
						
						<!--<li id="up">-->
						<!--	<a href="uploadvids/upload.php" class="dropdown-toggle no-arrow">-->
								<!-- <span class="micon bi bi-diagram-3"></span
								<i class="fa-solid fa-upload"></i>-->
						<!--		<span class="mtext">Upload Videos</span>-->
						<!--	</a>-->
						<!--</li>-->
						<li>
							<a href="help.html" class="dropdown-toggle no-arrow">
								<i class="fa-solid fa-gears"></i>
								<span class="mtext">Help</span>
							</a>
						</li>
							<div class="dropdown-divider"></div>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20">
				

				<div class="row">
					<div class="col-xl-8 mb-30">
					<?php
                                if (mysqli_num_rows($queryy2) > 0) {
                                            $roww = mysqli_fetch_assoc($queryy);
                                            $t2 = mysqli_fetch_assoc($ti2);
                                        }

                            ?>
                        <?php

                            if ($t2['status'] =="Yes") {
                                echo "<script>
                                const element = document.getElementById('ad1');
                                const element2 = document.getElementById('ex2');
                            
                                element.remove();
                                element2.remove();

                                </script>";                
                            }
                            else{
                                echo "<script>
                                const element = document.getElementById('ad');
                                const element2 = document.getElementById('ex1');
                                element.remove();
                                element2.remove();
                                </script>";
                            }


                        ?>
						<div class="card-box height-100-p pd-20" style="margin-right: 50px;">
							<img src="imgs/avatar.png" width="100px" height="100px" alt=""><br>
							<div class="txt" style="padding-top: 20px;margin-top: 30px;font-size: 20px; font-weight: bold;">
								<?php
                            	    if (mysqli_num_rows($queryy) > 0) {
                            	                $roww = mysqli_fetch_assoc($queryy);
                            	                $t = mysqli_fetch_assoc($ti);
                            	                // " <a href='../signup/logout.php'>Logout</a>"
                            	            }

                            	?>
								<span>Full Name: 
									<div style="color: blue; position: relative;top: -30px;right: -110px;">
										<?php
											if (mysqli_num_rows($queryyyy) > 0) {
												$rowww = mysqli_fetch_assoc($queryyyy);
												echo " " . $rowww['name'] ;
												// " <a href='../signup/logout.php'>Logout</a>"
											}
										?>
									</div>
								</span><br>
								<span>Phone Number: 
									<div style="position: relative;top: -27px;right: -158px;color: blue;font-size: 19px;">
										<?php
											if (mysqli_num_rows($queryyyyy) > 0) {
												$rowwww = mysqli_fetch_assoc($queryyyyy);
												echo " " . $rowwww['email'] ;
											}
										?>
									</div>
								</span><br>
								<span>Account: 
									<div style="position: relative;top: -32px;right: -98px;font-weight: 200;">
										<?php

											if ($t['status'] =="Yes") {
												$Color2="green";
												$ms='Active' ;
												echo '<div style="font-weight:bold; Color:'.$Color2.'">'.$ms.'</div>';                
											}
											else{
												$Color = "red";
												$ms2= "Inactive";
												echo '<div style="font-weight:bold; Color:'.$Color.'">'.$ms2.'</div>';
											}


										?>
									</div>
								</span><br>
								<span>Status: 
									<div style="position: relative;top: -29px;right: -74px; font-weight:bold;">
										<?php
                                    		if ($ad['type'] == "Admin") {
                                    		    $ms='Admin' ;
                                    		    echo $ms;
											
											
                                    		}
                                    		else{
                                    		    $Color = "gray";
                                    		    $ms2= "Student";
                                    		    echo '<div style="Color:'.$Color.'">'.$ms2.'</div>';
                                    		    echo "<script>
                                    		    const element5 = document.getElementById('ad');
                                    		    element5.remove();
                                    		    </script>"; 
                                    		}
                                    	?>
									</div>
								 </span><br>
								
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- welcome modal start -->

		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="vendors/scripts/dashboard.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
