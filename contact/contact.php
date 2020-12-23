<?php
 
// Email address verification
function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
 
if($_POST) {
 
    // Receiving email
    $emailTo = 'alex_verbitsky@yahoo.com';
    
    $subject = addslashes(trim($_POST['subject']));
    $name = addslashes(trim($_POST['name']));
    $clientEmail = addslashes(trim($_POST['email']));
    $message = addslashes(trim($_POST['message']));
    
    $array = array('subjectMessage' => '', 'nameMessage' => '', 'emailMessage' => '', 'messageMessage' => '');
    
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject';
    }
    if($name == '') {
        $array['nameMessage'] = 'Empty name';
    }
    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message';
    }
    if(isEmail($clientEmail) && $subject != '' && $name != ''&& $message != '') {
        // Send email
        $headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
        mail($emailTo, $subject, $message, $headers);
    }
 
    echo json_encode($array);
 
}
 
?>