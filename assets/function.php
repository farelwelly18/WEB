<?php
    require 'assets/vendor/autoload.php';
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'assets/vendor/PHPMailer/src/Exception.php';
    require 'assets/vendor/PHPMailer/src/PHPMailer.php';
    require 'assets/vendor/PHPMailer/src/SMTP.php';




$host = "localhost";
$user = "root";
$pass = "";
$db = "kesehatan";

// Sesuaikan host dan db dengan yang ada di mysql mu


$connect = new mysqli($host, $user, $pass, $db);

function Login($data){
    global $connect;
    $email = $data['email'];
    $pass = $data['pass'];

    $search = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM akun where email = '$email'"));
    if (!is_null($search)) {
        //Verif Password
        if (password_verify($pass, $search['password'])) {
            if ($search['verif']===1) {
                return 0;
            }
            return 1;
        }
        return 2;
    }
    return 3;

}

function Daftar($data){
    global $connect;
    $email = $data['emailD'];
    $pass = $data['passD'];
    $passK = $data['passK'];

    //Check ada email sama atau tidak

    $temp = mysqli_query($connect, "SELECT * FROM akun where email = '$email'");
    $temp = mysqli_fetch_assoc($temp);
    if (is_null($temp)) {
        //check password sama atau tidakk
        if($pass == $passK){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_query($connect, "INSERT INTO `akun` (`id`, `email`, `password`, `username`, `nickname`, `verif`, `admin`) VALUES (NULL, '$email', '$pass', NULL, NULL, '0', '0')");
            // $berhasilKirim = SendEmail($email);
            // if ($berhasilKirim === 0) {
            //     return 0;
            // }else{
            //     return 3;
            // }
            Return 0;
        }
        return 2;
    }
    return 1;
}

        // $biji = mysqli_query($connect, "SELECT * FROM akun where email = 'farisabdillah1806@gmail.com'");
        // $biji = mysqli_fetch_assoc($biji);
        // if (!is_null($biji)) {
        //     var_dump($biji);
        // }





function SendEmail($email){

    //Load Composer's autoloader (created by composer, not included with PHPMailer)


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'farisabdillah1806@gmail.com';                     //SMTP username
        $mail->Password   = 'cadhauknmpsgwqoj';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'Welly Kesehatan');
        // $mail->addAddress('joe@example.net', 'Joe User');     
        $mail->addAddress("$email");               //Name is optional
        $mail->addReplyTo('no-reply@gmail.com', 'Information');

        //Content
        $mail->isHTML(true);
        $isiEmail = "

        ";                                  //Set email format to HTML
        $mail->Subject = 'Verifikasi Email karena telah membuka link Bokep';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b><br> WELL WELL WELL';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return 0;
    } catch (Exception $e) {
        return 1;
    }
}

?>