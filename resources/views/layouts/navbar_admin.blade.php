<nav class="navbar navbar-expand-lg navbar-dark bg-dark-blue" style="padding: 1rem 5rem;">
    <a class="navbar-brand" href="{{url('adminDashboard')}}">
        <img src="{{url('logo_stmik.png')}}" width="50" height="50" class="mr-2" alt=""> ANTRIAN TERPADU STMIK SUMEDANG (Admin)
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            @if (!session('is_admin'))
                <a class="nav-item nav-link active" href="{{url('admin')}}">Login</a>
            @else
                <a class="nav-item nav-link active" href="{{url('adminDashboard')}}">Layanan</a>
                <a class="nav-item nav-link active" href="{{url('admin_list')}}">Admin</a>
                <a class="nav-item nav-link active" href="{{url('logout_admin')}}">Logout</a>
            @endif
        </div>
    </div>
</nav>