@props(['event'])
@php
$tags=explode(',',$event->Tags);
@endphp
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
    <link rel="stylesheet" href="style/event.css">
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

    <div style="  background-image: url('storage/{{$event->EventBanner}}'); "
        class="hero d-flex justify-content-center align-items-center">
        <h1>{{$event->EventName}}</h1>

    </div>
    <div class="eventInfo ">
        <div class="row nameDate justify-content-between ">
            <div class="col-3">
                <img src="storage/{{ auth()->user()->logo }}" alt="club" srcset="">
                <h3>{{ $event->owner->ClubName }}</h3>
            </div>
            <div class="col-3 text-right ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-calendar" viewBox="0 0 16 16">
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg>
                <span class="Eventdate">{{$event->eventDate}}</span>
            </div>
        </div>
        {{--
        @php
        dd($event);
        @endphp --}}
        <div class="info row" style=" margin: auto !important;">
            <div class="col-8">
                <div class="Description">
                    {{$event->Description}}
                    <div class="Tags">
                        @foreach ($tags as $tag)

                        <a href="search?search={{$tag}}" class="tag">{{$tag}}</a>

                        @endforeach
                    </div>

                </div>
            </div>
            <div class="col-4">
                <h4>Localisation:</h4>
                {!!$event->EventLocation!!}


            </div>
        </div>

        <div class="book text-center">
            <a href="{{$event->BookingLink}}"><button>Book Now</button></a>
        </div>
    </div>


    <div class="row" style="margin: auto !important;">
        <div class="comment-form col-6">
            <h3>Add a Comment</h3>
            <form action="/event{{ $event->id }}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" name="name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="comment_text">Comment:</label>
                <textarea name="comment_text" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="comments-section col-6">
            <h3>Comments</h3>
            @foreach($event->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->comment_text }}</p>
            </div>
            @endforeach
        </div>
    </div>




    <hr>
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">

                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Events</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About us</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Login</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn-color btn btn-primary " type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>


        </footer>
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