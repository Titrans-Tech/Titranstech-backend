<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Email</title>
    <style>
        /* General email styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }
        .header {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }
        .message {
            color: #555555;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            color: #888888;
            font-size: 12px;
            margin-top: 20px;
        }
        a {
            color: #1a73e8;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            {{-- <h1>Thank You, {{ $fname }}!</h1> --}}
        </div>
        <div class="message">
            <p>We have received your message and appreciate your feedback:</p>
            <blockquote style="font-style: italic; color: #666666;">
                {{-- "{{ $message }}" --}}
            </blockquote>
            <p>Our team will get back to you as soon as possible. In the meantime, feel free to <a href="mailto:{{ env('MAILTRAP_FROM_EMAIL') }}">contact us</a> if you have further questions.</p>
        </div>
        <div class="footer">
            <p>Best regards,</p>
            <p>{{ $fromName }}</p>
        </div>
    </div>
</body>
</html>
