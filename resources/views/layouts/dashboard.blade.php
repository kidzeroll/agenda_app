@include('layouts._dashboard.css')

@include('layouts._dashboard.topbar')

@include('layouts._dashboard.sidebar')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">

            <!-- title -->
            <h1>@yield('title')</h1>
        </div>

        <div class="section-body">

            <!-- content -->
            @yield('content')
        </div>
    </section>

    <!-- modal -->
    @yield('modal')
</div>

@include('layouts._dashboard.footer')

@include('layouts._dashboard.js')
