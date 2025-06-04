<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Notification</title>
</head>
<body>
    <h1>Job Notification</h1>
    <p>Dear {{ $maildata['employee']->name }},</p>
    <p>We are pleased to inform you that you have been assigned a new job.</p>
    <p>Job Title: {{ $maildata['job']->title }}</p>
    <p>Employee Details</p>
    <ul>
        <li>Name: {{ $maildata['user']->name }}</li>
        <li>Email: {{ $maildata['user']->email }}</li>
        {{-- <li>Phone: {{ $maildata['employee']->phone }}</li> --}}
    </ul>
</body>
</html>