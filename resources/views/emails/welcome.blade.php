<!DOCTYPE html>
<html>

<head>
    <title>Welcome Email</title>
</head>

<body>
    <h1>Welcome to Our Platform!</h1>
    <p>Hello {{ $userData['user']->name }},</p>
    <p>We are excited to have you on board. To get started, please click the link below to set your password:</p>
    <a href="{{ $resetPasswordLink }}">Set Password</a>
    <p>If you have any questions, feel free to contact us.</p>
    <p>Best regards,<br>Your Platform Team</p>
</body>

</html>
