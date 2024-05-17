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
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css'>



    <link rel="stylesheet" href="style/background.css">
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
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

    @if (session()->has('success'))
    <style>
        .alert {
            position: relative;
            width: auto;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            font-family: sans-serif;
            font-weight: 400;
            text-align: right;
        }

        .alertCheckbox {
            display: none;
        }

        :checked+.alert {
            display: none;
        }

        .alertText {
            display: table;
            margin: 0 auto;
            text-align: center;
            font-size: 16px;
        }

        .alertClose {
            float: right;
            font-size: 10px;
            cursor: pointer;
        }

        .clear {
            clear: both;
        }

        .success {
            background-color: #EFE;
            border: 1px solid #DED;
            color: #9A9;
        }
    </style>

    <div class="text-end">
        <label>
            <input type="checkbox" class="alertCheckbox" autocomplete="off" />
            <div class="alert success">
                <span class="alertClose">X</span>
                <span class="alertText">
                    {{session('success')}}
                </span>
            </div>
        </label>
    </div>

    @endif
    <div id="title">
        <span>
            <span class="explore"> EXPLORE</span> <br> <span class="lastex">THE LATEST <span class="events">
                    EVENTS</span> NOW!</span>
        </span>
    </div>

    </div>

    <!--carousel-->
    <section class="game-section">
        <h2 class="line-title">Latest events</h2>
        <div class="justify-content-center">
            <div class="owl-carousel custom-carousel owl-theme col-md-12">
                @foreach($events as $event)
                <div class="item" style="background-image: url(storage/{{ $event->EventBanner }});">
                    <div class="item-desc">
                        <h3>{{ $event->EventName }}</h3>
                        <p>
                            <span class="creator">{{ $event->owner->ClubName }}</span>
                            <span class="date">{{ $event->created_at->format('d, M Y') }}</span> <br>
                            {{ $event->Description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    



    <section class="gallery ">
        <div style="margin: auto !important;" class="row justify-content-between">
            <div class="col-3">
                <h1 class="mainTitle">Upcoming Events</h1>
            </div>
            <form action="{{ route('search') }}" method="GET" class="search-bar col-4">
                <button class="srch" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search search-icon" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg></button>
                <input type="text" name="search" class="search-input" placeholder="Search...">

            </form>

        </div>
        <div class="projcard-container">

            @foreach($events as $event)
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
                        <div class="Tags">

                            @php
                            $tags=explode(',',$event->Tags);
                            @endphp
                            @foreach ($tags as $tag)

                            {{-- <a href="/?search={{$tag}}" class="tag">{{$tag}}</a> --}}
                            <a href="{{ route('search', ['search' => $tag]) }}" class="tag">{{ $tag }}</a>

                            @endforeach
                        </div>
                        <!-- "See More" Button -->
                        <div class="projcard-buttonbox">
                            <a href="/event{{$event['id']}}" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="pagination"> {{$events->links()}}</div>


            <hr>
            <div class="container">
                <footer class="py-5">
                    <div class="row">
                        <div class="col-6 col-md-2 mb-3">
                            <h5>Section</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-body-secondary">Features</a></li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-body-secondary">Pricing</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-6 col-md-2 mb-3">

                        </div>

                        <div class="col-6 col-md-2 mb-3">
                            <h5>Section</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                                </li>
                                <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-body-secondary">Events</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About
                                        us</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                                </li>
                                <li class="nav-item mb-2"><a href="/login"
                                        class="nav-link p-0 text-body-secondary">Login</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-5 offset-md-1 mb-3">
                            <form action="{{ route('subscribe') }}" method="post">
                                @csrf
                                <h5>Subscribe to our newsletter</h5>
                                <p>Monthly digest of what's new and exciting from us.</p>
                                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                    <label for="newsletter1" class="visually-hidden">Email address</label>
                                    <input id="newsletter1" type="text" class="form-control" name="email" placeholder="Email address" required>
                                    <button class="btn-color btn btn-primary" type="submit">Subscribe</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>


                </footer>
            </div>







            <!-- Bootstrap JS  -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous">
            </script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>

            <script src="script/script.js"></script>
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