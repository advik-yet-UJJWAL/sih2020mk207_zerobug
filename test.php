<?php
    $state = $category = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $state = base64_encode($_POST["state"]);
        $category = base64_encode($_POST["category"]);
        
        header("location: scheme.php?stateid=$state&categoryid=$category");
    }
    ?>