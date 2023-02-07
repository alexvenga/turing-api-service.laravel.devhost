<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Preview (Turing machine)</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="antialiased bg-gray-50 flex items-center justify-center">

<div class="container">

    <section class="mt-12 p-6 shadow-md bg-white">
        <h2 class="font-bold text-xl">"Чистый" ответ {{ route('api.word') }}:</h2>
        <pre class="mt-4 overflow-x-scroll">{!! $jsonData !!}</pre>
    </section>

    <section class="mt-12 p-6 shadow-md bg-white">
        <h2 class="font-bold text-xl">dump() ответ {{ route('api.word') }}:</h2>
        <pre class="mt-4 overflow-x-scroll">@dump($jsonDecoded)</pre>
    </section>

    <section class="mt-12 p-6 shadow-md bg-white">
        <h2 class="font-bold text-xl">Полученные данные:</h2>
        <div class="mt-4 overflow-x-hidden w-full">
            <h3 class="font-bold text-lg">Слово:</h3>
            <div>
                {!! $jsonDecoded->text !!}
            </div>
        </div>
        <div class="mt-4 overflow-x-hidden w-full">
            <h3 class="font-bold text-lg">Изображение (jpeg):</h3>
            <div>
                <img src="data:image/jpeg;base64,{!! $jsonDecoded->image !!}" class="max-w-full h-auto" alt="{!! $jsonDecoded->text !!}">
            </div>
        </div>
        <div class="mt-4 overflow-x-hidden w-full">
            <h3 class="font-bold text-lg">Аудио:</h3>
            <div>
                <audio id="audio_player" src="data:audio/mp3;base64,{!! $jsonDecoded->audio !!}" controls="controls" class="w-full"></audio>
            </div>
        </div>
    </section>


    <section class="mt-12">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                type="button" onclick="window.location.reload();">Обновить</button>
    </section>
</div>


</body>
</html>
