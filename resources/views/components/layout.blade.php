<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-screen">
    <x-notifications description="A Anonymous component" class="p-4"/>
    <x-notificationinline description="A Inline component" class="p-4"/>

    <header class="p-4">
        <h1>My Site: {{ $title }}</h1>
    </header>

    <div class="p-4">
        {{ $slot }}

        @if(isset($sidebar))
            $sidebar:
            {{ $sidebar }}
        @endif
    </div>
</body>
</html>
