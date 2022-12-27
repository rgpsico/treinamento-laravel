@include('layouts.sidebar')

@include('layouts.contentheader')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>





</body>
@include('layouts.footer')
