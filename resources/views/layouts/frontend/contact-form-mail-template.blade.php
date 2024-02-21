<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        .contact-details {
            margin-top: 20px;
        }

        .contact-details p {
            margin: 10px 0;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
    </style> 
</head>
<body>
    <div class="container">
        <h2>Contact Form Submission</h2>
        <p>Hello {{$name}},</p>
        <p>You have received a new message through the contact form. Here are the details:</p>

        <div class="contact-details">
            <p><strong>Name:</strong> {{$name}}</p>
            <p><strong>Email:</strong> {{$email}}</p>
            <p><strong>Phone:</strong> {{$phone}}</p>
            <p><strong>Subject:</strong> {{$subject}}</p>
            <p><strong>Campaign URL:</strong> {{$campaign_url}}</p>
            <p><strong>Message:</strong></p>
            <p>{{$form_message}}</p>
        </div>

        <div class="footer">
            <p>This email was sent from your website's contact form. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
