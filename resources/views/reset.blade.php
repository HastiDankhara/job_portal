<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Passwprd</h1>
    <p>Dear {{ $maildata['name']->name }},</p>
    <p>Click below to change your password..</p>
    <a href="{{ route('reset',$maildata['token']) }}">Click Here</a>
    <p>Thanks</p>
</body>
</html>