@props(['event'])

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ENSAK-EVENT</title>
  <!--fonts-->
  <!--CSS-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css'>
  <link rel="stylesheet" href="style/background.css">
  <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/profile.css">
</head>

<body>
  <nav class="navbar  navbar-expand-lg navbar-light ">
    <div class="container-fluid ">
      <a class="navbar-brand" href="/">
        <img src="media/ensa.png" alt="Bootstrap">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-auto" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-4 active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link mx-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Events
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/search?search=Conférence">Conférence</a></li>
              <li><a class="dropdown-item" href="/search?search=Forum">Forum</a></li>
              <li><a class="dropdown-item" href="/search?search=Évènement d'un club">Évènement d'un
                  club</a></li>
              <li><a class="dropdown-item" href="/search?search=Formation">Formation</a></li>
              <li><a class="dropdown-item" href="/search?search=Workshop">Workshop</a></li>
              <li><a class="dropdown-item" href="/search?search=Networking Event">Networking Event</a>
              </li>

            </ul>

          </li>
          <li class="nav-item">
            <a class="nav-link mx-4" href="#">About Us</a>
          </li>
          @auth

          <li class="nav-item">
            <a class="nav-link mx-4" style="text-transform: capitalize;" href="/profile">
              <img src="storage/{{ auth()->user()->logo }}" alt="" class="profilepic rounded-circle"
                style="width: 25px; height: 25px; object-fit: cover; margin-right: 8px;">
              {{ auth()->user()->ClubName }}
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link mx-4" href="/login">Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  <div id="stars"></div>
  <div id="stars2"></div>
  <div id="stars3"></div>
  <div class="profile row" style="margin:auto !important;">
    <div class="sidebar col-2">
      <div class="text-center">
        <img src="storage/{{auth()->user()->logo}}" alt="" class="profilepic ">
      </div>
      <h3>Hey, {{auth()->user()->ClubName}}</h3>
      <div class="sidebar-content">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="/profile">See Recent Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/create">Add an Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Stats and Analytics</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="/manageComments">Manage comments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('updateProfile', ['user' => auth()->user()->id]) }}">Edit Profile</a>
          </li>

          <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}" style="color: red;"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
      <div class="logo-container text-center">
        <img src="/media/ensa.png" alt="Logo" class="logo">
      </div>
    </div>
    <!-- Rest of your content goes here -->
    <div class="col mainco">
      <h1>Your Events</h1>
      @foreach($events as $event)
      @if($event->EventOwner == auth()->user()->id)
      <div class="projcard projcard-customcolor" style="--projcard-color: {{$event['colorCode']}};">
        <div class="projcard-innerbox">
          <img class="projcard-img" src="storage/{{$event['EventBanner']}}" />
          <div class="projcard-textbox">
            <div class="projcard-title">{{$event['EventName']}}</div>
            <div class="projcard-subtitle">{{ $event->owner->ClubName }}</div>
            <div class="projcard-bar"></div>
            <div class="projcard-description">
              {{$event['Description']}}
            </div>
            <div class="projcard-buttons">
              <a href="/edit{{$event->id}}" class="editbtn">
                <button class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                </svg> Edit</button></a>
              <form action="{{ route('deleteEvent', ['event' => $event->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="deletebtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                </svg>Delete</button>
              </form>

            </div>

            <!-- "See More" Button -->
            <div class="projcard-buttonbox">
              <a href="/event{{$event['id']}}" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
  <!-- Main content -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
  <script>
    $(".custom-carousel").owlCarousel({
        autoWidth: true,
        loop: true
      });
      $(document).ready(function() {
        $(".custom-carousel .item").click(function() {
          $(".custom-carousel .item").not($(this)).removeClass("active");
          $(this).toggleClass("active");
        });
      });
      document.querySelectorAll(".projcard-description").forEach(function(box) {
        $clamp(box, {
          clamp: 6
        });
      });
  </script>
</body>

</html>