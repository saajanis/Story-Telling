<html>
<body>

Welcome <?php echo $_GET["current_c_task_id"]; ?><br>

<?php
    
    //$ip = "10.0.0.3";
    //$ip = "128.61.117.131";
    //$ip = "128.61.120.62";
    $ip = "192.168.1.37";
    
    $response = urlencode($_GET["response"]);
    $index_current_c_task_id = $_GET["current_c_task_id"];
    $player_credits = $_GET["player_credits"];
    $player_variables = $_GET["player_variables"];
    
    $url="http://$ip:8080/topics/" . "$response" . "/$index_current_c_task_id". "/$player_credits". "/$player_variables";
    print $url;
    $ch=curl_init();
    $timeout=0;
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,  CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,$timeout);
    $rawdata=curl_exec($ch);
    curl_close($ch);
    
    //print ($rawdata);
    
    $json_rawdata = json_decode($rawdata, true);
    
    
    $pre_cond_location = $json_rawdata['pre_cond_location'];
    $current_c_task_id = $json_rawdata['current_c_task_id']; //ideally take from raw data
    $img_url = $json_rawdata['img_url'];
    $header = $json_rawdata['header'];
    $message = $json_rawdata['message'];
    $player_credits = $json_rawdata['player_credits'];
    $player_variables = $json_rawdata['player_variables'];
   
    
    
    $parameter_response = $json_rawdata['response'];
    
    
    
    
    $responses = "";
    $i=1;
    foreach ($parameter_response as &$individual_response){
        $responses = $responses . "$individual_response,";
        $i++;
    }
    $responses = rtrim($responses, ",");
    
    //print $responses;
    
            
    $redirect = "http://$ip:8888/StoryTelling/index.php?pre_cond_location=$pre_cond_location&current_c_task_id=$current_c_task_id&img_url=http://$ip:8888/StoryTelling/images_dump/$img_url&header=$header&message=$message&player_credits=$player_credits&player_variables=$player_variables&responses=$responses";
    
    //print $redirect;
    
    ?>



<script>
top.location.href="<?php echo $redirect; ?>";
</script>


</body>
</html>
