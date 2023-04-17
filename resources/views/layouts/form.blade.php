<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>
    <div class="h-screen grid place-items-center bg-slate-100">
        <x-alert/>
        @yield('content')
    </div>
</body>
</html>
