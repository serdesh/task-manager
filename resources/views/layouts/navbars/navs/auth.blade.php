<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">
            @if (isset($title))
                {{$title}}
            @else
                Менеджер задач
            @endif
        </a>
        @include('layouts.block.user')
    </div>
</nav>
{{--Подложка--}}
<div class="under-nav-auth">&nbsp;</div>
