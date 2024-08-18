<?php
session_start();
require 'vendor/autoload.php'; // 引入Composer自动加载器

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$password = $_POST['password'];
$remember = isset($_POST['remember']);

// 假设用户的邮箱和密码是预定义的
$valid_email = "charleneguo7@gmail.com";
$valid_password = "gly980205";

if ($email == $valid_email && $password == $valid_password) {
    $verification_code = rand(100000, 999999); // 生成6位随机验证码
    $_SESSION['verification_code'] = $verification_code;
    $_SESSION['email'] = $email;

    $mail = new PHPMailer(true); // 创建PHPMailer实例

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // 启用详细的SMTP调试输出
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'charleneguo7@gmail.com';
        $mail->Password   = 'gly980205'; // 请确认这个密码是正确的，并且不是应用密码
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // 收件人设置
        $mail->setFrom('charleneguo7@gmail.com', 'Your Name'); // 发件人信息
        $mail->addAddress('charleneguo7@gmail.com'); // 收件人地址（用户的邮箱）

        // 邮件内容设置
        $mail->isHTML(true); // 邮件格式为HTML
        $mail->Subject = 'Your Verification Code';
        $mail->Body    = "Your verification code is: <b>$verification_code</b>";
        $mail->AltBody = "Your verification code is: $verification_code"; // 如果邮件客户端不支持HTML

        $mail->send(); // 发送邮件

        header('Location: verify.php'); // 跳转到验证码输入页面
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // 捕获异常并输出错误信息
    }
} else {
    header('Location: fail.php'); // 登录失败，跳转到失败页面
    exit();
}
?>
