<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Consultation Request</title>
</head>
<body style="font-family: sans-serif; background-color: #F7F3EA; padding: 24px; color: #0B1F1A;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; padding: 32px; border: 1px solid #E8E0CF;">
        <h2 style="color: #0B1F1A; margin-top: 0;">New Consultation Request Received</h2>
        <p>A new visitor has submitted the contact form on FINCUN website:</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF; font-weight: bold; width: 35%;">Name:</td>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF;">{{ $contactMessage->name }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF; font-weight: bold;">Phone:</td>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF;"><a href="tel:{{ $contactMessage->phone }}">{{ $contactMessage->phone }}</a></td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF; font-weight: bold;">Email:</td>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF;"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF; font-weight: bold;">Area of Interest:</td>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF;">{{ $contactMessage->interest ?? 'Not Specified' }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF; font-weight: bold;">Message:</td>
                <td style="padding: 8px; border-bottom: 1px solid #E8E0CF;">{{ $contactMessage->message ?: 'No message provided' }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold;">IP Address:</td>
                <td style="padding: 8px;">{{ $contactMessage->ip }}</td>
            </tr>
        </table>

        <div style="margin-top: 32px; padding-top: 16px; border-top: 1px solid #E8E0CF; font-size: 12px; color: #5B6B66;">
            Submitted on {{ $contactMessage->created_at->format('M d, Y h:i A') }} via FINCUN Advisory Portal.
        </div>
    </div>
</body>
</html>
