<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My App')</title>
    <link href="/assets/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        <h2>Welcome, {{ Auth::user()->name }}!</h2>
    @endauth

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/products') }}">Edit Products</a>
                        </li>
                    @endif
                    
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>

    @yield('content')

</body>
</html>