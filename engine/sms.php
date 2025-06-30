<?php

$json_url = "https://api.ebulksms.com/sendsms.json";
$username = 'Essential';
$apikey = 'c1891f9702ef124dc4469531489692ae2184b50c';

if (isset($_POST['button'])) {
    $username = $_POST['username'];
    $apikey = $_POST['apikey'];
    $sendername = substr($_POST['sender_name'], 0, 11);
    $recipients = $_POST['telephone'];
    $message = $_POST['message'];
    $flash = 0; // Flash SMS indicator (0 for normal SMS, 1 for flash SMS)
    $message = substr($_POST['message'], 0, 160); // Limit message length to 160 characters

    $Ebulksms = new Ebulksms();

    // Use JSON method to send SMS
    $result = $Ebulksms->useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);
    
    // Check result and handle accordingly
    if ($result === true) {
        echo "SMS sent successfully!";
    } else {
        echo "Failed to send SMS: " . $result;
    }
}

class Ebulksms {
    
    public function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
        $gsm = array();
        $country_code = '234'; // Nigeria country code
        $arr_recipient = explode(',', $recipients);
        
        // Format recipients into array as required by eBulkSMS API
        foreach ($arr_recipient as $recipient) {
            $mobilenumber = trim($recipient);
            if (substr($mobilenumber, 0, 1) == '0') {
                $mobilenumber = $country_code . substr($mobilenumber, 1);
            } elseif (substr($mobilenumber, 0, 1) == '+') {
                $mobilenumber = substr($mobilenumber, 1);
            }
            
            $generated_id = uniqid('int_', false);
            $generated_id = substr($generated_id, 0, 30);
            
            // Build recipient array
            $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
        }
        
        // Build message array
        $message = array(
            'sender' => $sendername,
            'messagetext' => $messagetext,
            'flash' => "{$flash}",
        );
        
        // Build request array
        $request = array('SMS' => array(
            'auth' => array(
                'username' => $username,
                'apikey' => $apikey
            ),
            'message' => $message,
            'recipients' => $gsm
        ));
        
        // Encode request array to JSON
        $json_data = json_encode($request);
        
        if ($json_data) {
            // Perform POST request to eBulkSMS API
            $response = $this->doPostRequest($url, $json_data, array('Content-Type: application/json'));
            $result = json_decode($response);
            
            // Check response status
            if ($result && isset($result->response->status)) {
                return $result->response->status; // Return status from API response
            } else {
                return "Invalid API response"; // Handle API response error
            }
        } else {
            return "Error encoding JSON"; // Handle JSON encoding error
        }
    }
    
    // Helper function for making HTTP POST requests
    private function doPostRequest($url, $data, $headers = array()) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>EbulkSMS Send SMS API Sample</title>
    </head>

    <body>
        <h2 style="text-align: center">Ebulk SMS Integration Sample Code</h2>
        <div style="border: 1px solid #333; padding: 5px 10px; width: 40%; margin: 0 auto">
            <form id="form1" name="form1" method="post" action="">

                <?php
                if (!empty($_POST)) {
                    if (stristr($result, 'SUCCESS')) {
                        ?>
                        <p style="border: 1px dotted #333; background: #33ff33; padding: 5px;">Message sent</p>
                        <?php
                    } else {
                        ?>
                        <p style="border: 1px dotted #333; background: #FFDACC; padding: 5px;">Message not sent - <?php echo $result; ?></p>
                        <?php
                    }
                }
                ?>

                <p>
                    <label>Username:
                        <input name="username" type="hidden" id="username"/>
                    </label>
                </p>
                <p>
                    <label>API Key:
                        <input name="apikey" type="hidden" id="passwd" />
                    </label>
                </p>
                <p>
                    <label>Sender name:
                        <input name="sender_name" type="text" id="name" value="Integration" />
                    </label>
                </p>
                <p>
                    <label>Recipients
                        <textarea name="telephone" id="telephone" cols="45" rows="2"></textarea>
                    </label>
                </p>
                <p>
                    <label>Message
                        <textarea name="message" id="message" cols="45" rows="5"></textarea>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="submit" name="button" id="button" value="Submit" />
                    </label>