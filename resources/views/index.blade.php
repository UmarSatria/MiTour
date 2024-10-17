<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiTour</title>
    <link rel="shortcut icon" href="img/MITOUR.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <nav class="header">
            <div class="nav-log">
                <p class="nav-name">MiTour</p>
                <span>.</span>
            </div>
            <div class="nav-menu" id="myNavMenu">
                <ul class="nav_menu_list">
                    <li class="nav_list">
                        <a href="#home" class="nav-link active-link">Home</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#about" class="nav-link active-link">About</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#service" class="nav-link active-link">Service</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#contact" class="nav-link active-link">Contact</a>
                        <div class="circle"></div>
                    </li>
                </ul>
            </div>
            <div class="nav-button">
                <a href="/login"><button class="btn">Log In</button></a>
            </div>
            <div class="nav-menu-btn">
                <i class="uil uil-bars" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <!-- MAIN -->
        <main class="wrapper">
            <!-- -------------- HOME BOX ---------------- -->
            <section class="featured-box" id="home">
                <div class="featured-text">
                    <div class="featured-text-card">
                        <span>Welcome</span>
                    </div>
                    <div class="featured-name">
                        <p style="margin-right: 20px;">In MiTour<span class="typedText"></span></p>
                    </div>
                    <div class="featured-text-info">
                        <p>Temukan destinasi tempat wisata paling menakjubkan di dunia melalui MiTour.
                        Rasakan pesona alam yang tiada tara dan jelajahi kekayaan budaya di setiap perjalanan Anda.
                        </p>
                    </div>
                    <div class="featured-text-btn">
                        <button class="btn blue-btn">Lorem</button>
                        <a href="/login"><button class="btn">Log In</button></a>
                    </div>
                    <div class="social_icons">
                        <div class="icon"><i class="uil uil-instagram"></i></div>
                        <div class="icon"><i class="uil uil-linkedin-alt"></i></div>
                        <div class="icon"><i class="uil uil-twitter"></i></div>
                        <div class="icon"><i class="uil uil-github-alt"></i></div>
                    </div>
                </div>
                <div class="featured-image">
                    <div class="image">
                        <img src="img/MITOUR.png" alt="MiTour">
                    </div>
                </div>
                <div class="scroll-icon-box">
                    <a href="#about" class="scroll-btn">
                        <i class="uil uil-mouse-alt"></i>
                        <p>Scroll Down</p>
                    </a>
                </div>
            </section>

            <!-- -------------- ABOUT BOX ---------------- -->
            <section class="section" id="about">
                <div class="top-header">
                    <h1>About Us</h1>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="about-info">
                            <h3>MiTour Introduction</h3>
                            <p>Jelajahi dunia dengan kenyamanan dan kemudahan, temukan keajaiban tempat-tempat tersembunyi, dan rasakan sensasi petualangan yang sesungguhnya. Selamat datang di MiTour,
                                di mana setiap perjalanan adalah pintu gerbang menuju pengalaman tak terlupakan.
                            </p>
                            <div class="about-btn">
                                <button class="btn">Jelajahi<i class="uil uil-arrow-growth"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="skills-box">
                            <div class="skills-header">
                                <h3>Kota Pariwisata</h3>
                            </div>
                            <div class="skills-list">
                                <span>Bandung</span>
                                <span>Batam</span>
                                <span>Yogyakarta</span>
                                <span>Jakarta</span>
                                <span>Bali</span>
                                <span>Malang</span>
                                <span>Batu</span>
                            </div>
                        </div>
                        <div class="skills-box">
                            <div class="skills-header">
                                <h3>Tempat Wisata</h3>
                            </div>
                            <div class="skills-list">
                                <span>Gunung Bromo</span>
                                <span>Paralayang</span>
                                <span>Candi Sewu</span>
                                <span>Braga</span>
                                <span>Monumen Nasional</span>
                                <span>Ocarina Batam</span>
                                <span>Nusa Penida</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- -------------- SERVICE BOX ---------------- -->

            <section class="section" id="service">
                <div class="top-header">
                    <h1>Service</h1>
                </div>
                <div class="project-container">
                    <div class="project-box">
                        <i class="uil uil-metro"></i>
                        <h3>Recommendation <br> Tourism City</h3>
                        <label>100+ Tourist City</label>
                    </div>
                    <div class="project-box">
                        <i class="uil uil-users-alt"></i>
                        <h3>Recommendation <br> Tourism Spot</h3>
                        <label>500+ Tourist Spot</label>
                    </div>
                    <div class="project-box">
                        <i class="uil uil-grin-tongue-wink"></i>
                        <h3>Serving Touring Trips</h3>
                        <label>We here to serve u'r Trip</label>
                    </div>
                </div>
            </section>

            <!-- -------------- CONTACT BOX ---------------- -->

            <section class="section" id="contact">
                <div class="top-header">
                    <h1>Contact Us</h1>
                    <span>Consultations and Recommendations for tourist attractions? contact us here.</span>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="contact-info">
                            <h2>Find Me <i class="uil uil-corner-right-down"></i></h2>
                            <p><i class="uil uil-instagram"></i> Instagram : @umarzs__</p>
                            <p><i class="uil uil-phone"></i> +62 81293210i2</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-control">
                            <div class="form-inputs">
                                <input type="text" class="input-field" placeholder="Name">
                                <input type="text" class="input-field" placeholder="Email">
                            </div>
                            <div class="text-area">
                                <textarea placeholder="Message"></textarea>
                            </div>
                            <div class="form-button">
                                <button class="btn">Send <i class="uil uil-message"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- FOOTER -->
        <footer>
            <div class="top-footer">
                <p>MiTour</p>
            </div>
            <div class="middle-footer">
                <ul class="footer-menu">
                    <li class="footer_menu_list">
                        <a href="#home">Home</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#about">About</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#service">Service</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="footer-social-icons">
                <div class="icon"><i class="uil uil-instagram"></i></div>
                <div class="icon"><i class="uil uil-linkedin-alt"></i></div>
                <div class="icon"><i class="uil uil-twitter"></i></div>
                <div class="icon"><i class="uil uil-github-alt"></i></div>
            </div>
            <div class="bottom-footer">
                <p>Copyright &copy; <a href="#home" style="text-decoration: none;">MiTour</a>
                </p>
            </div>
        </footer>
    </div>

     <!-- ----- TYPING JS Link ----- -->
     <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <!-- ----- SCROLL REVEAL JS Link----- -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- ----- MAIN JS ----- -->
    <script src="js/script.js"></script>
</body>
</html>
