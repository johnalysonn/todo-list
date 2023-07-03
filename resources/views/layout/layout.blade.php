<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <title>Todo-List - @yield('title')</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg vh-100 position-fixed">
        <div id = "container"class="container-fluid d-flex flex-column justify-content-center h-100">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex flex-column text-center">
                    <a class="nav-link {{Route::getCurrentRoute()->getName() == 'index'? 'active' : ''}}" aria-current="page" href="{{Route('index')}}" style="font-size: 2.5rem"><i class='bx bx-list-ul rounded-circle p-2'></i></a>
                    <a class="nav-link {{Route::getCurrentRoute()->getName() == 'create'? 'active' : ''}}" href="{{Route('create')}}" style="font-size: 2.5rem;"><i class='bx bx-plus rounded-circle p-2'></i></a>
                    <a class="nav-link {{Route::getCurrentRoute()->getName() == 'list_task_completed'? 'active' : ''}}" aria-current="page" href="{{Route('list_task_completed')}}" style="font-size: 2.5rem"><i class='bx bx-list-check rounded-circle p-2'></i></a>
                </div>
            </div>
        </div>
    </nav>
    <main class="min-vh-100">
        <header class="p-4 ps-5">
            <a href="{{route('index')}}"><img src="{{asset('img/logo.png')}}" alt="logo"></a>
        </header>
        @if(session('msg'))
        <div class="p-3 d-flex justify-content-center align-items-center position-absolute" style="top: 15%; left: 50%; transform: translateX(-50%);">
            <p id="message" class="rounded-pill text-light px-4 p-2" style="background: #bf1eaf; box-shadow: 0px 0px 10px #212121;">
            {{@session('msg')}}
            </p>
        </div>
        @else
        <div class="p-3 d-flex justify-content-center align-items-center position-absolute" style="top: 15%; left: 50%; transform: translateX(-50%);">
            <p id="message" class="rounded-pill text-light px-4 p-2 d-none" style="background: #bf1eaf; box-shadow: 0px 0px 10px #212121;">
            </p>
        </div>
        @endif
        @yield('content')
    </main>

    
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('js/ajax.js')}}"></script>
    <script>
        window.index_route = "{{Route('index')}}";
    </script>
</body>
</html>