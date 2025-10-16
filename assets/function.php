<?php
require 'assets/vendor/autoload.php';
    //These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'assets/vendor/PHPMailer/src/Exception.php';
require 'assets/vendor/PHPMailer/src/PHPMailer.php';
require 'assets/vendor/PHPMailer/src/SMTP.php';
session_start();



$host = "localhost";
$user = "root";
$pass = "";
$db = "kesehatan";

// Sesuaikan host dan db dengan yang ada di mysql mu


$connect = new mysqli($host, $user, $pass, $db);

function Login($data){
    global $connect;
    $email = mysqli_real_escape_string($connect, htmlspecialchars($data['email'])) ;
    $pass = mysqli_real_escape_string($connect, htmlspecialchars($data['pass'])) ;

    $search = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM akun where email = '$email'"));
    if (!is_null($search)) {
        //Verif Password
        if (password_verify($pass, $search['password'])) {
            if ($search['verif'] == 1) {
                $id = $search['id'];
                setcookie("id", HeckelDefend($id));
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
    $email = mysqli_real_escape_string($connect, htmlspecialchars($data['emailD']));
    $pass = mysqli_real_escape_string($connect, htmlspecialchars($data['passD']));
    $passK = mysqli_real_escape_string($connect, htmlspecialchars($data['passK']));

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

function SetProfil($data){
    global $connect;
    $username =  mysqli_real_escape_string($connect, htmlspecialchars($data['username']));
    $nickname =  mysqli_real_escape_string($connect, htmlspecialchars($data['nick']));
    $tinggi =  mysqli_real_escape_string($connect, htmlspecialchars($data['tinggi']));
    $berat =  mysqli_real_escape_string($connect, htmlspecialchars($data['berat']));
    $date =  mysqli_real_escape_string($connect, htmlspecialchars($data['date']));
    $umur = explode(" ", $date);
    $umur = 2025 - $umur[2];
    $id = HeckelDefender2();
    $query = "
    UPDATE akun
    SET username = '$username',
        nickname = '$nickname',
        tinggi   = '$tinggi',
        berat    = '$berat',
        date     = '$date',
        umur     = '$umur'
    WHERE id = $id;
    ";
    mysqli_query($connect, $query);
}

function GantiFormat($ymd){
    $old    = explode("-", $ymd);
    $bulan  = ["Januari", "Februari", "Maret", "April", "Meil", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    $bulanN = $bulan[$old[1]-1];
    $new    = $old[2]." ".$bulanN." ".$old[0];
    return $new;
}

function HeckelDefend($kata){
    $code = 'AES-256-CBC';
    $kataKunci = 'WellyKesehatan'; 
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($code));
    setcookie("id2", $iv);
    $Enkripsi = openssl_encrypt($kata, $code, $kataKunci, 0, $iv);
    return $Enkripsi;
}

function HeckelDefender2(){
    $id = $_COOKIE['id'];
    $kode = 'AES-256-CBC'; // Must be the same method used for encryption
    $katakunci = 'WellyKesehatan'; // Must be the same key used for encryption
    $iv = $_COOKIE['id2'];

    $idTable = openssl_decrypt($id, $kode, $katakunci, 0, $iv);
    return $idTable;
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
        $isiEmail = <<<EmailTemplate
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
                            <a href="https://192.168.1.3/WEB/verif.php?id=$email" 
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
        EmailTemplate;                                  //Set email format to HTML
        $mail->Subject = 'Verifikasi Email';
        $mail->Body    = "$isiEmail";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return 0;
    } catch (Exception $e) {
        return 1;
    }
}

?>