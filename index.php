<?php
session_start();
$successMessage = $_SESSION['successMessage'] ?? '';
$errorMessage = $_SESSION['errorMessage'] ?? '';
unset($_SESSION['successMessage']);
unset($_SESSION['errorMessage']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/nav-styles.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f0f0;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="img/logo.png" alt="ConnectFlow Logo" style="width: 80px; height: 80px;">
                <span class="brand-name">ConnectFlow</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact2.php">Contact</a>
                    </li>
                    <!-- Check if the user is logged in -->
                    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                        <li>
                            <div class="user-icon-container">
                                <img src="img/user-icon.png" alt="User Icon" id="userIcon">
                                <div class="user-details hidden" id="userDetails">
                                    <p id="userName"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                                    <p id="userEmail"><?php echo htmlspecialchars($_SESSION['email']); ?></p> <!-- Fetch the actual email -->
                                    <button id="logoutBtn" class="btn btn-danger">Logout</button>
                                </div>
                            </div>
                            <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </li>
                    <?php else: ?>
                        <li>
                            <a id='navbarButton' class="btn btn-primary nav-btn" data-bs-toggle="modal" data-bs-target="#signupModal">Sign In/up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SignUp Modal -->
    <div class="modal" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="signupErrorMessage"></div> <!-- Error message will be shown here -->
                    <form id="signupForm" method="POST">
                        <div class="mb-3">
                            <label for="signupName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="signupName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="signupEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="signupConfirmPassword" name="conf-password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Already have an account? <a href="#login" data-bs-toggle="modal" data-bs-target="#signinModal">Log in here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Signin Modal -->
    <div class="modal" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signinModalLabel">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="signinForm" action="signin.php" method="POST">
                        <div class="mb-3">
                            <label for="signinEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="signinEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="signinPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signinPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Hero Section -->
    <section class="bg-light text-center py-1" style="background-image: url('img/my-image01.jpg'); background-size: cover; background-position: center; height: 100vh;">
        <div class="container hero-container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="display-4 text-white">Your Business, Elevated</h1>
                    <p class="lead text-white">We help businesses grow with strategic consulting and innovative solutions.</p>
                    <a href="#services" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5 bg-white" id="services">
        <div class="container text-center">
            <h2 class="mb-5">Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="img/service1-icon.png" alt="Service 1 Icon" class="mb-3" style="width: 50px;">
                            <h5 class="card-title">Consulting</h5>
                            <p class="card-text">Expert advice to help you make informed business decisions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="img/service2-icon.png" alt="Service 2 Icon" class="mb-3" style="width: 50px;">
                            <h5 class="card-title">Strategy</h5>
                            <p class="card-text">Develop tailored strategies to achieve your business goals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="img/service3-icon.png" alt="Service 3 Icon" class="mb-3" style="width: 50px;">
                            <h5 class="card-title">Growth</h5>
                            <p class="card-text">Innovative solutions to accelerate your company's growth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light" id="testimonials">
        <div class="container text-center">
            <h2 class="mb-5">What Our Clients Say</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <blockquote class="blockquote">
                            <p class="mb-4">"The team provided excellent consulting services and helped our business grow exponentially!"</p>
                            <footer class="blockquote-footer">John Doe, CEO of XYZ Corp</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-4">"Their strategies were tailored to our needs, and we saw amazing results."</p>
                            <footer class="blockquote-footer">Jane Smith, Founder of ABC Solutions</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-4">"Working with them was a great experience, and they delivered as promised!"</p>
                            <footer class="blockquote-footer">Sarah Lee, COO of QRS Tech</footer>
                        </blockquote>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS (for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>
