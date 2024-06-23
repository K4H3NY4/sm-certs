<!DOCTYPE html>
<html>
<head>
    <title>Certificate Added</title>
</head>
<body>
    <h1>Certificate Added</h1>
    <p>Dear {{ $name }},</p>
    <p>Your certificate has been successfully generated with the following details:</p>
    <ul>
        <li>Order ID: {{ $order_id }}</li>
        <li>Email: {{ $email }}</li>
        <li>Stripe Code: {{ $stripe_code }}</li>
        <li>Certificate Code: {{ $uuid }}</li>
    </ul>
    <p>Thank you!</p>
</body>
</html>
