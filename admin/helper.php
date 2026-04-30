<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once 'vendor/autoload.php';
    function sendmail($to,$subject,$message){

        $from='munnujii.in';
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->IsSMTP();
        $mail->Host = "ssl://smtp.ionos.com";
        $mail->SMTPAuth = true; 
        $mail->Username = "munnujii.in"; // SMTP username
        $mail->Password = "Munuujii@123#"; // SMTP password 
        $mail->From = $from;
        $mail->SetFrom($from,'ROADMAPEX');
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 465; 
        $mail->addAddress($to, $to);
        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body =$message;
        try {
                $mail->send();
                return true;
                }         
                catch (Exception $e) {
                    return false;
            }
    }
?>
