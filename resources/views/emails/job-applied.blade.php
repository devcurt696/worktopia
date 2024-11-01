<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Worktopia Job Application</title>
</head>
<body>
    <p>There is a new job application to your Worktopia job listing.</p>

    <p><strong>Job Title: </strong> {{$job->title}}</p>

    <p><strong>Application Details: </strong></p>

    <p><strong>Full Name: </strong> {{$application->full_name}}</p>

    <p><strong>Contact Phone: </strong> {{$application->contact_phone}}</p>
    <p><strong>Contact Email: </strong> {{$application->contact_email}}</p>
    <p><strong>Message: </strong> {{$application->message}}</p>
    <p><strong>Location: </strong> {{$application->location}}</p>

    <p>Login to Worktopia to view the application.</p>
</body>
</html>