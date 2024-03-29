<!-- PHP Query section -->
<?php

$db_name = 'mysql:host=localhost;dbname=contact_db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name);
    $phone = $_POST['phone'];
    $phone = filter_var($phone);
    $guest = $_POST['guest'];
    $guest = filter_var($guest);
    $date = $_POST['date'];
    $date = filter_var($date);
    $time = $_POST['time'];
    $time = filter_var($time);
 
    $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND phone = ? AND guest = ? AND date = ? AND time = ?");
    $select_contact->execute([$name, $phone, $guest, $date, $time]);
 
    if($select_contact->rowCount() > 0){
       $message[] = 'Message has already been sent.';
    }else{
       $insert_contact = $conn->prepare("INSERT INTO `contact_form`(name, phone, guest, date, time) VALUES(?,?,?,?,?)");
       $insert_contact->execute([$name, $phone, $guest, $date, $time]);
       $message[] = 'Your message sent has been sent.';
    }
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monstera Coffee / Contact Us</title>
        <!-- Font Awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <!-- CSS file link -->
        <link rel="stylesheet" href="../assets/style.css">
        <!-- Favicon image link -->
        <link rel="shortcut icon" href="../assets/img/mc-icon.png">
</head>

<body>
<!-- PHP Message section -->
<?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message" style="
               position: sticky;
               top: 0;
               z-index: 1100;
               background: var(--main-color);
               padding: 2rem;
               display: flex;
               align-items: center;
               justify-content: space-between;
               gap: 1.5rem;
               max-width: 1200px;
               margin: 0 auto;">
               <span style="color: var(--white);
               font-size: 2rem;">'.$message.'</span>

               <i class="fas fa-times" style="font-size: 2.5rem;
               color: var(--white);
               cursor: pointer;" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
     }
   ?>
<!-- <!-- Header / Navbar section  -->
    <header class="header">
        <section class="flex">
            <a href="../index.html" class="logo"><img src="../assets/img/mc-icon.png" alt="Website logo image"></a>
            <h3>Monstera Coffee</h3>
            <nav class="navbar">
                <a href="../index.html">Home</a>
                <a href="about.html">About Us</a>
                <a href="menu.html">Menu</a>
                <a href="gallery.html">Our Cafe</a>
                <a href="team.html">Our Team</a>
                <a href="book.php">Reservations</a>
            </nav>
            <div id="menu-btn" class="fas fa-bars"></div>
        </section>
    </header>
<!-- Reservation section -->
    <section class="book" id="book">
        <div class="row">
            <div class="image">
                <img src="../assets/img/book-girl.jpg" alt="Contact Us">
            </div>
            <form action="" method="post">
                <h3>Book A Table</h3>
                <input type="text" name="name" id="name" required class="box" maxlength="30" placeholder="Enter Your Name">
                <input type="number" name="phone" id="phone" required class="box" min="0" maxlength="12" placeholder="Enter Your Phone No." onkeypress="if(this.value.length == 12) return false">
                <input type="number" name="guest" id="guest" required class="box" min="1" maxlength="2" placeholder="No. Of Guests" onkeypress="if(this.value.length == 2) return false">
                <input type="date" name="date" id="date" required class="box">
                <input type="time" name="time" id="time" required class="box">
                <input type="submit" name="submit" id="submit" value="Book Now" class="btn">
            </form>
        </div>
<!-- Event / Contact Us section -->
        <div class="content">
            <div class="heading">
                <h3>Have An Event In Mind?</h3>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, nisi. Tempore quae aliquid tenetur officiis aliquam dolor architecto, suscipit at!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In officiis nemo sunt ut aliquam cumque dolor fuga tempora pariatur necessitatibus, asperiores maiores dolorum iusto quibusdam.</p>
        <div class="contact-btn">
            <a href="#" class="btn">Contact Our Team</a>
        </div>
    </section>
<!-- Footer section -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>Call Us</h3>
                <p>(+44)1234-567890</p>
            </div>
            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>Email Us</h3>
                <p>Hello@MonsteraCoffee.com</p>
            </div>
            <div class="box">
                <i class="fas fa-clock"></i>
                <h3>Opening Hours</h3>
                <p>07:00am to 09:00om</p>
            </div>
            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Our Location</h3>
                <p>98 Java Street, Belfast, AB34 5KK</p>
            </div>
            <div class="box">
                <i class="fa fa-heart"></i>
                <h3>Our Socials</h3>
                <p>Click To Follow Us</p>
            </div>
        </div>
        <div class="credit">
            Design:\<span>AndrewKenJones</span>
        </div>
    </section>
    <!-- JS file link -->
    <script src="../assets/script.js"></script> -->
</body>

</html>