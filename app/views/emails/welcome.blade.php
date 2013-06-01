<html>
	<head>
		<title></title>
	</head>
	<body>
		<p>Dear {{ $user->username }},</p>

		<p>Welcome to Monujo! Please click on the following link to confirm your account:</p>

		<p><a href="{{ URL::to('user/activate/' . $user->id . '/' . $activationCode) }}">{{ URL::to('user/activate/' . $user->id . '/' . $activationCode) }}</a></p>

		<p>Best regards,</p>

		<p>The Monujo Team</p>
	</body>
</html>
