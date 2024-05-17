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
    <link rel="stylesheet" href="style/login.css">
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
    <div class="page1 signup" style="display: grid; place-items: center;">
        <form action="/users" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}">
                @error('nom')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="prenom" class="form-label">Prenom:</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="{{ old('prenom') }}">
                @error('prenom')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="ClubName" class="form-label">Club Name:</label>
                <input type="text" class="form-control" name="ClubName" id="ClubName" value="{{ old('ClubName') }}">
                @error('ClubName')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="categorie" class="form-label">Categorie:</label>
                <select class="form-select" name="Categorie" id="categorie">
                    <option value="club" {{ old('Categorie')=='club' ? 'selected' : '' }}>Club</option>
                    <option value="directions" {{ old('Categorie')=='directions' ? 'selected' : '' }}>Directions
                    </option>
                    <option value="professeur" {{ old('Categorie')=='professeur' ? 'selected' : '' }}>Professeur
                    </option>
                    <option value="autre" {{ old('Categorie')=='autre' ? 'selected' : '' }}>Autre</option>
                </select>
                @error('Categorie')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="Description" id="description">{{ old('Description') }}</textarea>
                @error('Description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Mot De Passe:</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <label for="password_confirmation" class="form-label">Confirmation Mot de passe:</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input class="form-control" type="file" name="logo" id="logo">
                    @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
        </form>


       
        <hr>
        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">

                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Events</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About us</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Login</a>
                            </li>
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