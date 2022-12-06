<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="photon.webp">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHOTON</title>
</head>
<body>
    <nav class="navbar navbar-light bg-dark fixed-top mb-3">
      <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand" style="color:white;">PHOTON</a>
        <div class="dropdown">
          <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown">
            {{ auth()->user()->email }}
          </button>
          <div class="dropdown-menu">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <a class="btn" onclick="this.parentNode.submit()">Logout</a>
            </form>
          </div>
        </div>
      </div>
    </nav>
    <hr style="width: 100%;margin-top:0% ; margin-bottom:0%">
    <div class="d-flex flex-row" style="margin-top:0 ;">
      <div class="d-flex container bg-light" style="width:15%; padding-bottom:100rem">
        <nav class="navbar bg-light position-absolute top-0 start-0">
          <div class="container mt-5 ">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link nav-bar-side" href="{{ route('home') }}"><i class="nav-bar-side fa-solid fa-images px-2"></i>Photos</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link nav-bar-side" href="{{ route('explore') }}"><i class="nav-bar-side fa-solid fa-magnifying-glass px-2"></i>Explore</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-bar-side" href="{{ route('sharing') }}"><i class="fa-solid fa-users px-2 nav-bar-side"></i>Sharing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-bar-side" href="{{ route('archive') }}"><i class='fa fa-box-archive px-2 nav-bar-side'></i>Archived</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-bar-side" href="{{ route('favourite') }}"><i class='fa fa-star px-2 nav-bar-side'></i>Favourite</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-bar-side" href="{{ route('album') }}"><i class="fa-solid fa-images px-2 nav-bar-side"></i>Album</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-bar-side" href="{{ route('trash') }}"><i class='fa fa-trash px-2 nav-bar-side'></i>Trash</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="p-4 mt-5" style="width:85%">

        @yield('content')
        
      </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>

@yield('scripts')

</html>