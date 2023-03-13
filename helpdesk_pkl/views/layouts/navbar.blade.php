<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li>
        <div class="container-fluid">
          <a class="navbar-brand" href="">
            <img src="{{asset('gambar/logopei.png')}}" alt="Logo" style="width:35px;" class="rounded-pill">
          </a>
          <h3 style="padding-top: 6px">Help Desk</h3>
        </div>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <h5 class="navbar-text">Halo, <b>{{auth()->user()->name}}</b> !</h5>
        </a>
      </li>
    </ul>
  </nav>