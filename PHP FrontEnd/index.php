<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>


        <?php
            //$ip = "10.0.0.3";
            //$ip = "128.61.117.131";
            //$ip = "128.61.120.62";
            $ip = "192.168.1.37";
            
            //initialize
            
            $pre_cond_location = strtolower( $_GET['pre_cond_location'] );
            $current_c_task_id = $_GET['current_c_task_id']; //ideally take from raw data
            $img_url = $_GET['img_url'];
            $header = $_GET['header'];
            $message = $_GET['message'];
            $player_credits = $_GET['player_credits'];
            $player_variables = $_GET['player_variables'];
            $responses = $_GET['responses'];
            
            //initialize
            
            
            //AI break check
            
            if ($_GET['responses'] == ''){
                print "AI broke!";
                
                $pre_cond_location = strtolower( $_GET['pre_cond_location'] );
                $current_c_task_id = $_GET['current_c_task_id']; //ideally take from raw data
                $img_url = $_GET['img_url'];
                $header = "You didn't satisfy any preconditions";
                $message = "Do a makeup task to improve reputation!";
                $player_credits = $_GET['player_credits'];
                $player_variables = $_GET['player_variables'];
                $responses = $current_c_task_id . ":Go to klaus and help professor set up conference";
                
                
            }
            //AI break check

            
            if ($_GET['pre_cond_location'] != "None" && $_GET['pre_cond_location'] !='' ){
            
            
            $pre_cond_location = strtolower( $_GET['pre_cond_location'] );
            $current_c_task_id = $_GET['current_c_task_id']; //ideally take from raw data
            $img_url = $_GET['img_url'];
            $header = $_GET['header'];
            $message = $_GET['message'];
            $player_credits = $_GET['player_credits'];
            $player_variables = $_GET['player_variables'];
            $responses = $_GET['responses'];
            
            
            
            
            
            
            $bounce_back_url = urlencode( "http://$ip:8888/StoryTelling/index.php?pre_cond_location=None&current_c_task_id=$current_c_task_id&img_url=$img_url&header=$header&message=$message&player_credits=$player_credits&player_variables=$player_variables&responses=$responses" );
                
            $redirect = "http://$ip:8888/StoryTelling/location.php?pre_cond_location=$pre_cond_location&bounce_back_url=$bounce_back_url";
                
            ?>
            <script>
                top.location.href="<?php echo $redirect; ?>";
            </script>

            <?php

            }
            
        ?>
        
		<title>AI StoryTelling Game</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header">
						
				<!-- Logo -->
					<h1><a href="http://<?php echo $ip ?>:8888/StoryTelling/process.php?response=0:blah&current_c_task_id=1&player_credits=null&player_variables=0,0,0" id="logo">AI StoryTelling <em>Game</em></a></h1>
				
				<!-- Nav -->


                    
					<nav id="nav">
						<ul>
							<li class="current"><a href="http://<?php echo $ip ?>:8888//StoryTelling/process.php?response=0:blah&current_c_task_id=1&player_credits=null&player_variables=0,0,0">Home</a></li>
							<li>
								<a href="">Player Credits</a>
								<ul>
                                    <?php $player_credits = explode(',', $_GET['player_credits']);
                                    foreach($player_credits as &$credit){
                                        if ($credit !=null){
                                        ?>
                                        <li><a href="#"><?php echo $credit; ?></a></li>
                                        <?php
                                        }
                                    } ?>
                                     
								</ul>
							</li>



                            <li>
                                <a href="">Player Variables</a>
                                <ul>
                                    <?php $player_variables = explode(',', $_GET['player_variables']);
                                    
                                    ?>
                                        <li><a href="#">Likeability: <?php echo $player_variables[0]; ?></a></li>
                                        <li><a href="#">Credibility: <?php echo $player_variables[1]; ?></a></li>
                                        <li><a href="#">Suspectibility: <?php echo $player_variables[2]; ?></a></li>

                                </ul>
                            </li>


						</ul>
					</nav>

			</div>

		<!-- Banner -->

            <style>
            section.banner_main {
                background-image: url(<?php echo $_GET["img_url"]; ?>);
            }
            </style>

			<section id="banner" class ="banner_main">

				<header>
					<h2 style="font-size:20px; height: 100%;"><?php echo $header; ?> <br><em><?php echo $message; ?> </em></h2>
					
				</header>
			</section>
            
                

		<!-- Footer -->
			<div id="footer">
            <h3>Respond:</h3>






        <?php
            //AI break check
    
            if ($_GET['responses'] != ''){
        ?>

            <form name="input" action="process.php" method="get">

        <?php
            }
    
            else{
        ?>

        <form name="input" action="makeuptask.php" method="get">
        <?php
    
            }
        ?>


            <div class="row half collapse-at-2">
            <div class="6u">
                <input type="hidden" name="current_c_task_id" value="<?php echo $current_c_task_id; ?>">
                <input type="hidden" name="player_credits" value="<?php echo substr( implode(",", $player_credits), 1); ?>">
                <input type="hidden" name="player_variables" value="<?php echo implode(",", $player_variables); ?>">
                <input type="hidden" name="pre_cond_location" value="klaus">
                
        <?php if (!empty($responses)){  ?>
                
										<select name="response" style="height:30px; width: 100%; ">

                                      <?php $responses = explode(',', $responses);
                                          
                                          foreach($responses as &$response){
                                              if ($response !=null){
                                          ?>    <option value="<?php echo $response; ?>"><?php echo $response; ?></option> <?php
                                              }}

                                        ?>

                                        </select>
									</div>
								</div>
            <?php } ?>
								<div class="row half">
									<div class="12u">
										<ul class="actions">
											<li><input type="submit" class="button alt" value="Send Response" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
					</div>
				</div>

				

			</div>

	</body>
</html>