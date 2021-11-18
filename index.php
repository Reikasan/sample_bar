<?php include "includes/header.php";  ?>

<?php 
if(isset($_POST['sendRequest'])) {
    $name = escape($_POST['name']); 
    $email = escape($_POST['email']); 
    $phone = escape($_POST['phone']); 
    $date = escape($_POST['date']); 
    $time = escape($_POST['time']); 
    $seats = escape($_POST['seats']); 
    $comment = escape($_POST['comment']); 
    $status = "unread"; 
    $current_timestamp = "NOW()";
    $via = "website"; 

    $formated_time = date_create($time);
    $formated_time = date_format($formated_time, 'H:i:s');

    $query = "INSERT INTO reservation_request (request_name, request_email, request_tel, request_date, request_time, request_num_seats, request_comment, request_status, request_recieved_time, request_via) ";
    $query .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?) ";

    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssisss", $name, $email, $phone, $date, $formated_time, $seats, $comment, $status, $via);
    $result = mysqli_execute($stmt);

    redirect("index/thanks");
}

if(isset($_GET['thanks'])) {
    include "includes/thanksMessage.php";

    $darkBg = "gray";
}
?>

    <div class="container <?php if(isset($darkBg)){ echo $darkBg; } ?>">
        <section id="top">
            <nav class="navbar">
                <a class="nav-link" href="#menu">Menu</a>
                <a class="nav-link" href="#gallery">Gallery</a>
                <a class="nav-link" href="#access">Access</a> 
                <a class="nav-link" href="#reserve">Reserve</a> 
            </nav>
            <div class="humburger-icon">
                <div class="btn-line"></div>
                <div class="btn-line"></div>
                <div class="btn-line"></div>
            </div>
            <div class="logo">
                <h1>Bar<br><span>at</span><br>Tokio</h1>
            </div>
        </section>
        <!-- end of top -->
        
        <section id="concept">
            <h1 class="concept-title hide">Here comes bar's concept</h1>
            <p class="concept-description hide">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    
        </section>
        <!-- end of News -->
        
        <section id="menu">
            <h1 class="section-heading">Menu</h1>
            <div class="menu-container">
                <div class="menu-list">
                    <div class="menu-left">
                        <ul class="menu-name">
                            <li>Beer 1</li>
                            <li>fkgdsoijojü+</li>
                            <li>kdfuo</li>
                            <li>ldkfuwoei</li>
                        </ul>
                        <ul class="menu-price">
                            <li>4&#8364</li>
                            <li>8&#8364</li>
                            <li>6&#8364</li>
                            <li>4&#8364</li>
                        </ul>
                    </div>
                    <div class="menu-right">
                        <ul class="menu-name">
                            <li>Beer 1</li>
                            <li>fkgdsoijojü+</li>
                            <li>kdfuo</li>
                            <li>ldkfuwoei</li>
                        </ul>
                        <ul class="menu-price">
                            <li>4&#8364</li>
                            <li>8&#8364</li>
                            <li>6&#8364</li>
                            <li>4&#8364</li>
                        </ul>
                    </div>
                </div>
                <a class="btn" href="Menu.pdf" target="_blank" rel="noreferrer" type="button">Check more</a>
            </div>
        </section>
        <!-- end of menu -->
        
        <section id="gallery">
            <h1 class="section-heading">gallery</h1>
            <div class="img-container">
                <div class="row row-1">
                    <img class="mobile-l" src="img/kyryll-ushakov-lwoTuByIuC4-unsplash.jpg" alt="Bar's photo">
                    <img class="mobile-hide" src="img/oliver-frsh-aaCAWEAFyGk-unsplash.jpg" alt="Bar's photo">
                    <img src="img/sergio-alves-santos-OxKFC5u0980-unsplash.jpg" alt="Bar's photo">
                    <img src="img/bar-498420_1920.jpg" alt="Bar's photo">
                </div>
                <div class="row row-2">
                    <img src="img/beer-820011_1920-1.jpg" alt="Bar's photo">
                    <img class="mobile-l" src="img/drink-4188629_1920-1.jpg" alt="Bar's photo">
                    <img class="mobile-hide" src="img/andrew-welch-Y-RyEJ8eqHc-unsplash.jpg" alt="Bar's photo">
                    <img class="mobile-s" src="img/alcohol-2178775_1920.jpg" alt="Bar's photo">   
            </div>
            </div>
        </section>
        <!-- end of gallery -->
        
        <section id="access">
            <h1 class="section-heading"><span class="first">Access</span><span class="mid">& </span><span class="last">Info</span></h1>
            <div class="access-container">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4856.087986716232!2d13.346802614525108!3d52.514542906759715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a851af28d3f1c3%3A0x55627fdba380e5c9!2sVictory%20Column!5e0!3m2!1sen!2sde!4v1613775315707!5m2!1sen!2sde" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                 <div class="infos">
                     <div class="address">
                        <p>Großer Stern, 10557 Berlin</p>
                        <a href="#" class="btn">TEL: 03-000000000</a>
                        <a href="#reserve" class="btn">Web Reservation</a>
                     </div>
                     <div class="opening-hours">
                        <h3>Opening Hours</h3>
                        <p>Everyday 6<span>pm</span> - 1<span>am</span></p>
                        <div>
                            <p>LAST ORDER</p>
                            <p>24:30</p>
                        </div>
                        
                     </div>
                </div>
            </div>
        </section>
        <!-- end of access -->
        
    
        <section id="reserve">
            <div class="paper-bg">
                <h2 class="form-title">Reservation Request</h2>
                <small>This is only a request. We contact you for confirmation.</small>
                <form id="reservationForm">
                    <p><label class="input-label" for="name">Name*</label><input type="text" id="name" maxlength="30" required></p>
                    <p><label class="input-label">Email*</label><input type="email" id="email" maxlength="30" required ></p>
                    <p><label class="input-label">Phone</label><input type="tel" id="phone" maxlength="20"></p>
                    <p>Date and Time*</p>
                    <div class="request-time">
                        <input type="date" id="requestedDate" required placeholder="dd-mm-yyyy">
                        <div id="requestedTime">
                            <select id="hour" required>
                                <option value="" disabled selected>hh</option>
                                <option value="18:">18</option>
                                <option value="19:">19</option>
                                <option value="20:">20</option>
                                <option value="21:">21</option>
                                <option value="22:">22</option>
                                <option value="23:">23</option>
                            </select>
                            <p>:</p>
                            <select id="min" required>
                                <option value="" disabled selected>mm</option>
                                <option value="00">00</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                    </div>
                    <p>Number of Seats*</p>
                        <select id="seats" required>
                            <option value="" disabled selected>- Select -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    <label>Comment<textarea id="comment"></textarea></label>
                    <button class="btn" id="requestBtn">Send a Request</button>
                </form>
            </div> <!-- end of .paper-bg -->
        </section>
    </div>
    <!-- end of container -->
    <a href="#top" class="up-icon">
        <i class="fas fa-chevron-up"></i>
    </a>
    <!-- Modal -->
    <?php include "includes/modal.php"; ?>

<?php include "includes/footer.php"; ?>