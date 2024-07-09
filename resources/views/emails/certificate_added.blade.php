<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travel Certificate Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333333;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #dddddd;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: center;
            border-top: 1px solid #dddddd;
            font-size: 12px;
            color: #777777;
        }
        .important {
            color: #d9534f;
        }
        .attachment {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Travel Certificate Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>We are pleased to inform you that your travel certificate process has been successfully completed. Please find the details of your certificate and receipt below:</p>
            <p>
                <strong>Certificate Number:</strong> {{ $uuid }}<br>
                <strong>Checkout ID:</strong> {{ $ch_id }}<br>
                <Strong>Valid Till:</strong> {{ $valid_till }}
            </p>
            <p class="important">Please note that the travel dates associated with this certificate cannot be changed once they have been confirmed. Ensure that all travel plans align with the dates specified in your certificate.</p>
            <p>For your records and convenience, we have attached the official travel certificate to this email. Kindly keep this document safe and accessible for your future reference and use.</p>
            <p>Should you have any questions or require further assistance, please do not hesitate to contact our support team.</p>
            <p>Thank you for choosing our service.</p>
            <p>Best regards,</p>
            <p>Book Safari </p>
            <p>Toll Free Number: 1833VisitKenya</p>
        </div>
        <div class="footer">
            <p><strong>Disclaimer:</strong> The travel dates specified in the certificate are final and cannot be altered. Please review the certificate thoroughly to ensure all details are correct before making any travel arrangements.</p>
      
        </div>
    </div>
</body>
</html>

