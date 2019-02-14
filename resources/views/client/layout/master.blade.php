<!DOCTYPE html>
<html lang="en">
    <head>
        @include('client.layout.header')
    </head>
<body>
    <div class="page @yield('manu-bar')">
        @include('client.layout.top_nav')
        @yield('content')
        
        @include('client.layout.footer')
    </div>
    @include('client.layout.script')
</body>
</html>
