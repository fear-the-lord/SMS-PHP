<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "post">
        <input type = "text" name = "number" placeholder = "Enter number"/>
        <input type = "text" name = "text" placeholder = "Enter text"/>
        <input type = "submit" value = "send" name = "submit"/>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $mobile = '91'.$_POST['number'];
        $message = $_POST['text'];
        
        // Account details
        $apiKey = urlencode('juvSqgZRX9E-BJLRjN2RVFN5OONTvExezMRF5HfQ9n');
        
        // Message details
        $numbers = array($mobile);
        $sender = urlencode('TXTLCL');
        $message = rawurlencode($message);
    
        $numbers = implode(',', $numbers);
    
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
    
        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Process your response here
        echo $response;
    }
?>