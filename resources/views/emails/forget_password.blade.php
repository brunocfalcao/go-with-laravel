<!DOCTYPE html>
<html>

<head>
    <title>Reset Your Password</title>
</head>

<body>
    <h1>Reset Your Password</h1>
    <p>Hello {{ $user->name }},</p>
    <p>You recently requested to reset your password. Click the link below to set a new password:</p>
    <a href="{{ $resetPasswordLink }}">Reset Password</a>
    <p>If you didn't request a password reset, you can ignore this email.</p>
    <p>Best regards,<br>Your Platform Team</p>
</body>

</html>
