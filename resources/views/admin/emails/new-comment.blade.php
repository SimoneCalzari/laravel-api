<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My First Bot Mail</title>
</head>

<body>
    <header class="text-center py-2">
        <h1>Mail dal Bot di Re Simao</h1>
    </header>
    <main>
        <h2>Notifica nuovo commento</h2>
        <p>L'utente {{ $lead->author }} ha commentato il tuo progetto #{{ $lead->project_id }} col seguente messaggio:
        </p>
        <div class="btn btn-primary">
            {{ $lead->content }}
        </div>
        <p>Cordiali Saluti</p>
        <p>Il vostro mailer di Fiducia &hearts;</p>
    </main>
</body>

</html>
