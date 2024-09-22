<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="styles/contact-style.css">
      <link rel="stylesheet" href="styles/nav-styles.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Contact Us</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f0f0;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php"> <!-- Change here -->
                <img src="img/logo.png" alt="ConnectFlow Logo" style="width: 80px; height: 80px;">
                <span class="brand-name">ConnectFlow</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a> <!-- Change here -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <!-- Check if the user is logged in -->
                    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                        <li>
                            <div class="user-icon-container">
                                <img src="img/user-icon.png" alt="User Icon" id="userIcon">
                                <div class="user-details hidden" id="userDetails">
                                    <p id="userName"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                                    <p id="userEmail">user@example.com</p>
                                    <button id="logoutBtn">Logout</button>
                                </div>
                            </div>
                        </li>
                    <?php else: ?>
                        <li>
                            <a class="btn btn-primary nav-btn" data-bs-toggle="modal" data-bs-target="#signupModal">Sign In/up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="ftco-section">
        <div class="container contact-container">
            <div class="row no-gutters">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4 py-5">
                        <h3 class="mb-4">Contact Us</h3>
                        <div id="form-message-warning" class="mb-4"></div>
                        <div id="form-message-success" class="mb-4">
                            Your message was sent, thank you!
                        </div>
                        <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="6" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Send Message" class="btn btn-primary">
                                        <div class="submitting"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-wrap w-100 p-md-5 p-4 py-5 img">
                        <h3>Contact information</h3>
                        <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                        <div class="dbox w-100 d-flex align-items-start">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text pl-3">
                                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345098574!2d144.9537363156814!3d-37.81720997975169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f0e6d9f%3A0xb9cb9ec74e09a1d3!2sYour%20Address%20Here!5e0!3m2!1sen!2sau!4v1636482125100!5m2!1sen!2sau" 
                                    width="100%" 
                                    height="150" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="dbox w-100 d-flex align-items-center mt-3">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text pl-3">
                                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                            </div>
                        </div>
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text pl-3">
                                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts/contact.js"></script>
  </body>
</html>
