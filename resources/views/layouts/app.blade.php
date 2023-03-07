@include('layouts.sidebar')


@include('layouts.contentheader')

<div class="content">

    <div class="row">
        @yield('content')
    </div>

</div>







@include('layouts.footer')
