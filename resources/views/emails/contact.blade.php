<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: auto; padding: 20px; background: #f9f9f9; border-radius: 8px; }
        .title { font-size: 20px; margin-bottom: 20px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <p><strong>📩 New Contact Message</strong></p>
<p><strong>From:</strong> {{ $email }}</p>
<p><strong>Message:</strong></p>
<p>{{ $messageBody }}</p>

    </div>
</body>
</html>
