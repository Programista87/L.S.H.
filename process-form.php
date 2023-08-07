<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["Name"]);
    $email = htmlspecialchars($_POST["Email"]);
    $message = htmlspecialchars($_POST["Message"]);

    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all fields.");
    }

    $to = 'wojciechloson@gmail.com';
    $subject = "New Form Submission from $name";
    $headers = "From: $email";

    $success = mail($to, $subject, $message, $headers);

    if ($success) {
        header("Location: index.html");
        exit;
    } else {
        echo "Mailer Error: Unable to send email.";
    }
} else {
    header("Location: index.html");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Submitted</title>
    <meta http-equiv="refresh" content="5;url=index.html">
</head>
<body>
    <p>Thank you for your submission! You will be redirected shortly.</p>
    <p>If you are not redirected, <a href="index.html">click here</a>.</p>
</body>
</html>
