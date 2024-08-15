<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_code = $_POST['verification_code'];
    
    if ($entered_code == $_SESSION['verification_code']) {
        // 验证成功，重定向到成功页面
        header("Location: success.php");
        exit();
    } else {
        // 验证失败，重定向到失败页面
        header("Location: fail.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
</head>
<body>
    <h2>Enter the Verification Code</h2>
    <form action="verify.php" method="POST">
        <label for="verification_code">Two Factor Authentication Code:</label>
        <input type="text" id="verification_code" name="verification_code" required><br><br>
        <button type="submit">Verify Code</button>
    </form>
</body>
</html>
