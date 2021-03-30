<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Stranger Danger Chat</title>

<body style="height: 100vh">
    <div style="height: 100vh" class="flex justify-center items-center bg-blue-200">
        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
            <div class="flex-shrink-0">
                <img class="h-12 w-12" src="http://cdn.onlinewebfonts.com/svg/img_397748.png" alt="ChitChat Logo">
            </div>
            <div>
                <div class="text-xl font-medium text-black">Stranger Danger!</div>
                <p class="text-green-600">You have a new message!</p>
            </div>
        </div>
    </div>
</body>

</html>