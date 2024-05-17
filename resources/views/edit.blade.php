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
    <link rel="stylesheet" href="style/create.css">
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
                    <li class="nav-item"><a class="nav-link active" href="#">See Recent Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Add an Event</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Stats and Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Edit Profile</a></li>
<li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}" style="color: red;"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>                </ul>
            </div>

            <div class="logo-container text-center">
                <img src="/media/ensa.png" alt="Logo" class="logo">
            </div>
        </div>
        <!-- Rest of your content goes here -->
        <div class="col mainco">
            <h1>Edit: {{ $event->EventName }}</h1>
            <form action="/events{{ $event->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="eventName" class="form-label">Event Title:</label>
                    <input value="{{ old('eventName', $event->EventName) }}" type="text" class="form-control"
                        id="eventName" name="eventName" required>
                    @error('eventName')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="Conference">Conference</option>
                        <option value="Forum">Forum</option>
                        <option value="ClubEvent">Évènement d'un club</option>
                        <option value="Training">Formation</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Networking">Networking Event</option>
                    </select>
                    @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="colorCode" class="form-label">Color Code:</label>
                    <input value="{{ old('colorCode', $event->colorCode) }}" type="text" class="form-control"
                        id="colorCode" name="colorCode" readonly>
                    <script>
                        document.getElementById('category').addEventListener('change', function () {
                var colorCodes = {
                    'Conference': '#FF5733',
                    'Forum': '#3498db',
                    'ClubEvent': '#27ae60',
                    'Training': '#f39c12',
                    'Workshop': '#9b59b6',
                    'Networking': '#e74c3c'
                };
                document.getElementById('colorCode').value = colorCodes[this.value];
            });
                    </script>
                    @error('colorCode')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="eventOwner" class="form-label">Event Owner:</label>
                    <input value="{{ old('eventOwner', $event->EventOwner) }}" type="text" class="form-control"
                        id="eventOwner" name="eventOwner" required>
                    @error('eventOwner')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="eventDateTime" class="form-label">Event Date and Time:</label>
                    <input value="{{ old('eventDateTime', date('Y-m-d\TH:i', strtotime($event->eventDateTime))) }}"
                        type="datetime-local" class="form-control" id="eventDateTime" name="eventDateTime" required>
                    @error('eventDateTime')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description"
                        required>{{ old('description', $event->Description) }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags (Separate each tag with a comma):</label>
                    <input value="{{ old('tags', $event->Tags) }}" type="text" class="form-control" id="tags"
                        name="tags" required>
                    @error('tags')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="eventBanner" class="form-label">Event Banner :</label>
                    <input type="file" class="form-control" id="eventBanner" name="eventBanner" accept="image/*"
                        required>
                    <small class="form-text text-muted">Recommended size: 1500x300 for better quality</small>
                    @error('eventBanner')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="eventLocation" class="form-label">Event Location (Enter Google Maps embedded
                        code):</label>
                    <input value="{{ old('eventLocation', $event->EventLocation) }}" type="text" class="form-control"
                        id="eventLocation" name="eventLocation" required>
                    <small class="form-text text-muted"><a target="_blank" href="https://www.embed-map.com/">How to find
                            it?[USE the small size]</a></small>
                    @error('eventLocation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bookingLink" class="form-label">Booking Link:</label>
                    <input value="{{ old('bookingLink', $event->BookingLink) }}" type="text" class="form-control"
                        id="bookingLink" name="bookingLink" required>
                    @error('bookingLink')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Event</button>
            </form>

        </div>




    </div>
    </div>


    <!-- Main content -->

    </div>







    <!-- Bootstrap JS  -->
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