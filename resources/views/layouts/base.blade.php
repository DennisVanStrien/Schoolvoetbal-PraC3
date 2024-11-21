<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-[#ebebf5]">
    <header>
        <x-header/>
    </header>
    <main>
        {{$slot}}
    </main>
    <x-footer/>
</body>
</html>
