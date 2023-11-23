<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<header>
    <div class="navbar">
        <a class="logo" href="/">
            <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel ToDo">
        </a>
        <div class="right-side">
            <a href="/todos">Добавить задачу</a>
            <a href="/view-todos">Список задач</a>
        </div>
    </div>
</header>



    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Работает на Laravel</p>
    </footer>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
