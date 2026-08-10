<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectLine }}</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; }
        .header { background-color: #16a34a; color: #ffffff; padding: 24px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .body { padding: 24px; color: #333333; line-height: 1.6; }
        .footer { background-color: #f8f8f8; padding: 16px 24px; text-align: center; font-size: 12px; color: #888888; }
        .footer a { color: #16a34a; text-decoration: none; }
        .btn { display: inline-block; background-color: #16a34a; color: #ffffff !important; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: bold; margin-top: 16px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌿 Greentify Newsletter</h1>
        </div>
        <div class="body">
            <h2>{{ $subjectLine }}</h2>
            <p>{!! nl2br(e($content)) !!}</p>
            <a href="{{ url('/blogspot') }}" class="btn">Jelajahi Artikel Baru</a>
        </div>
        <div class="footer">
            <p>Anda menerima email ini karena berlangganan newsletter Greentify.</p>
            @if($unsubscribeUrl)
                <p><a href="{{ $unsubscribeUrl }}">Berhenti berlangganan</a></p>
            @endif
            <p>© {{ date('Y') }} Greentify. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>
