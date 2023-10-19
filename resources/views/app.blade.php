<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Task Manager</title>

        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        @vite('resources/css/app.css')
        
        <!-- Styles -->
        <style>
            .antialiased{
                background-color: #FAF9F6
            }
        </style>
    </head>
    <body class="antialiased">
      
        <div id="app">
            <App/>
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
