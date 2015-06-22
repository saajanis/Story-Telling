<?php
    
    //$ip = "10.0.0.3";
    //$ip = "128.61.117.131";
    //$ip = "128.61.120.62";
    $ip = "192.168.1.37";
    
    $pre_cond_location = strtolower( $_GET['pre_cond_location'] );
    $current_c_task_id = $_GET['current_c_task_id']; //ideally take from raw data
    $response = $_GET['response'];
    $player_credits = $_GET['player_credits'];
    $player_variables = $_GET['player_variables'];

    
    ///INCREMENT PLAYER VARIABLES

    $player_variables = explode(',', $player_variables);
    
    $player_variables[0] += 5;
    $player_variables[1] += 5;
    $player_variables[2] += 5;
    
    $player_variables = implode(",", $player_variables);
    
    
    
    $bounce_back_url = urlencode( "http://$ip:8888/StoryTelling/process.php?response=$response&current_c_task_id=$current_c_task_id&player_credits=$player_credits&player_variables=$player_variables" );
    
    $redirect = "http://$ip:8888/StoryTelling/location.php?pre_cond_location=$pre_cond_location&bounce_back_url=$bounce_back_url";
    
    
    ?>
    <script>
        top.location.href="<?php echo $redirect; ?>";
    </script>

    <?php
    
    
    ?>


