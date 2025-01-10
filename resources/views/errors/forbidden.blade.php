<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
            margin-top: 10%;
        }
        h1 {
            font-size: 3em;
            color: #dc3545;
        }
        p {
            font-size: 1.2em;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>403 - Forbidden</h1>
    <p>You do not have permission to access this page.</p>
    <a href="{{ url('/') }}">Return to Home</a>
</body>
</html>

