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
            Return 0;
        }
        return 2;
    }
    return 1;
}




function SendEmail($email){

    //Load Composer's autoloader (created by composer, not included with PHPMailer)


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'farisabdillah1806@gmail.com';                     //SMTP username
        $mail->Password   = 'cadhauknmpsgwqoj';                                //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    

        //Recipients
        $mail->setFrom('from@example.com', 'Welly Kesehatan');
        // $mail->addAddress('joe@example.net', 'Joe User');     
        $mail->addAddress("$email");               //Name is optional
        $mail->addReplyTo('no-reply@gmail.com', 'Verify');

        //Content
        $mail->isHTML(true);
        $isiEmail = '
           <!DOCTYPE html>
            <html>
              <head>
                <meta charset="UTF-8">
                <title>Verifikasi Email</title>
              </head>
              <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; margin: 0;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td align="center">
                      <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                        <tr>
                          <td style="background-color: #007BFF; padding: 20px 0;">
                            <h2 style="margin: 0; color: white; text-align: center;">Emailmu telah terdaftarkan ke Website Welly Kesehatan</h2>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 30px; text-align: center;">
                            <h4 style="margin-top: 0;">Verifikasi Email anda untuk melengkapi pendaftaran anda di web kami!</h4>
                            <p style="margin-bottom: 30px;">Klik tombol di bawah untuk melakukan verifikasi:</p>
                            <a href="https://contoh-verifikasi.com" 
                               style="display: inline-block; background-color: #28a745; color: white; text-decoration: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; margin-right: 10px; width: 150px;">
                               Verifikasi
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td style="background-color: #f0f0f0; padding: 20px; text-align: center; font-size: 12px; color: #777;">
                            © 2025 Welly Kesehatan. Semua Hak Dilindungi.
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </body>
            </html>
        ';                                  //Set email format to HTML
        $mail->Subject = 'Verifikasi Email karena telah membuka Bokep';
        $mail->Body    = "$isiEmail";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return 0;
    } catch (Exception $e) {
        return 1;
    }
}

?>