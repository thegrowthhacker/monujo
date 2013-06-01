<html>
<head>
    <title></title>
</head>
<body>
<p>Dear {{ $user->username }},</p>

<p>Follow the below link to reset your password </p>

<p><a href="{{ URL::to('user/password_reset/' . $user->id . '/' . $resetCode) }}">{{ URL::to('user/password_reset/' .
        $user->id
        . '/' . $resetCode) }}</a></p>

<p>Best regards,</p>

<p>The Monujo Team</p>
</body>
</html>
