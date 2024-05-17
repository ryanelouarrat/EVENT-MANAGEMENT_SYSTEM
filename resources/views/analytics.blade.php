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
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css'>



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
                    <a class="nav-link" href="/profile">See Recent Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/create">Add an Event</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Stats and Analytics</a>
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
            <h1>Main Content</h1>
            <h1>Page Views Analytics</h1>

            <table >
                <tr>
                    <th>Page Name</th>
                    <th>Page Views Count</th>
                </tr>
                @foreach($pageViews as $pageView)
                <tr>
                    <td>{{ $pageView->page_name }}</td>
                    <td>{{ $pageView->count }}</td>
                </tr>
                @endforeach
            </table>


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
        $(document).ready(function () {
            $(".custom-carousel .item").click(function () {
                $(".custom-carousel .item").not($(this)).removeClass("active");
                $(this).toggleClass("active");
            });
        });
        document.querySelectorAll(".projcard-description").forEach(function (box) {
            $clamp(box, { clamp: 6 });
        });
    </script>
</body>

</html>