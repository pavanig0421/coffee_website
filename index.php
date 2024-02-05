<?php

$db_name = 'mysql:host=localhost;dbname=contact_form';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $guests = $_POST['guests'];
   $guests = filter_var($guests, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `table` WHERE name = ? AND number = ? AND guests = ?");
   $select_contact->execute([$name, $number, $guests]);

   if($select_contact->rowCount() > 0){
      $message[] = 'message sent already!';
   }else{
      $insert_contact = $conn->prepare("INSERT INTO `table`(name, number, guests) VALUES(?,?,?)");
      $insert_contact->execute([$name, $number, $guests]);
      $message[] = 'message sent successfully!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>A CUP OF JOY</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="text.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

   
<!-- header section starts  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo"><img src="logo.png" alt=""></a>

      <nav class="navbar">
         <a href="#home">home</a>
         <a href="#about">about</a>
         <a href="#menu">menu</a>
         <a href="#gallery">gallery</a>
         <a href="#team">team</a>
         <a href="#contact">contact</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<div class="home-bg">

   <section class="home" id="home">

      <div class="content">
         <h3>coffee heaven</h3>
         <p>We Believe A Cup Of Coffee Is One Of The Most Important Simple Pleasures In Life.</p>
         <a href="#about" class="btn">about us</a>
      </div>

   </section>

</div>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="image">
      <img src="about-img.svg" alt="">
   </div>

   <div class="content">
      <h3>A cup of coffee can complete your day</h3>
      <p>But The Next Time You Decide To Gulp Down Some Caffeine – Be It To Stay Awake Before An Exam, To Get Back To Piled Up Work, To Improve Athletic Performance On The Track Field, Or Just To Get A High – Do It In As Healthy A Way As Possible.</p>
      <a href="#menu" class="btn">our menu</a>
   </div>

</section>

<!-- about section ends -->

<!-- facility section starts  -->

<section class="facility">

   <div class="heading">
      <img src="heading-img.png" alt="">
      <h3>our facility</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="icon-1.png" alt="">
         <h3>varieties of coffees</h3>
         <p>Coffee Is A Great Beverage – One That’s Been Used Over The Years.</p>
      </div>

      <div class="box">
         <img src="icon-2.png" alt="">
         <h3>coffee beans</h3>
         <p>Without High-Quality Coffee Beans, There Is No Perfect Coffee In The World!p>
      </div>

      <div class="box">
         <img src="icon-3.png" alt="">
         <h3>breakfast and sweets</h3>
         <p>Of Course, This Left Me With Fewer Options For Breakfast And Sweets.</p>
      </div>

      <div class="box">
         <img src="icon-4.png" alt="">
         <h3>ready to go coffee</h3>
         <p>Rest-Relax-Receive Your Coffee And Good To Go..</p>
      </div>

   </div>

</section>

<!-- facility section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

   <div class="heading">
      <img src="heading-img.png" alt="">
      <h3>popular menu</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="menu-1.png" alt="">
         <h3>love you coffee</h3>
      </div>

      <div class="box">
         <img src="menu-2.png" alt="">
         <h3>Cappuccino</h3>
      </div>

      <div class="box">
         <img src="menu-3.png" alt="">
         <h3>Mocha coffee</h3>
      </div>

      <div class="box">
         <img src="menu-4.png" alt="">
         <h3>Frappuccino</h3>
      </div>

      <div class="box">
         <img src="menu-5.png" alt="">
         <h3>black coffee</h3>
      </div>

      <div class="box">
         <img src="menu-6.png" alt="">
         <h3>love heart coffee</h3>
      </div>

   </div>

</section>

<!-- menu section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

   <div class="heading">
      <img src="heading-img.png" alt="">
      <h3>our gallery</h3>
   </div>

   <div class="box-container">
      <img src="gallery-1.webp" alt="">
      <img src="gallery-2.webp" alt="">
      <img src="gallery-3.webp" alt="">
      <img src="gallery-4.webp" alt="">
      <img src="gallery-5.webp" alt="">
      <img src="gallery-6.webp" alt="">
   </div>

</section>

<!-- gallery section ends -->

<!-- team section starts  -->

<section class="team" id="team">

   <div class="heading">
      <img src="heading-img.png" alt="">
      <h3>our team</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="our-team-1.jpg" alt="">
         <h3>john</h3>
      </div>
      <div class="box">
         <img src="our-team-2.jpg" alt="">
         <h3>Kamal</h3>
      </div>
      <div class="box">
         <img src="our-team-3.jpg" alt="">
         <h3>Emily</h3>
      </div>
      <div class="box">
         <img src="our-team-4.jpg" alt="">
         <h3>Linus</h3>
      </div>
      <div class="box">
         <img src="our-team-5.jpg" alt="">
         <h3>Natasha</h3>
      </div>
      <div class="box">
         <img src="our-team-6.jpg" alt="">
         <h3>Samuel</h3>
      </div>

   </div>

</section>

<!-- team section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <div class="heading">
      <img src="heading-img.png" alt="">
      <h3>contact us</h3>
   </div>

   <div class="row">

      <div class="image">
         <img src="contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>book a table</h3>
         <input type="text" name="name" required class="box" maxlength="20" placeholder="enter your name">
         <input type="number" name="number" required class="box" maxlength="20" placeholder="enter your number" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false">
         <input type="number" name="guests" required class="box" maxlength="20" placeholder="how many guests" min="0" max="99" onkeypress="if(this.value.length == 2) return false">
         <input type="submit" name="send" value="Book a Table" class="btn">
      </form>

   </div>

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>our email</h3>
         <p>varija@gmail.com</p>
         <p>nithya@gmail.com</p>
         <p>hasini@gmail.com</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>07:00am to 09:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>shop location</h3>
         <p>Banglore, india - 400104</p>
      </div>

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>our number</h3>
         <p>956789321</p>
         <p>874653092</p>
      </div>

   </div>

<div class="credit"> &copy; copyright @ <?= date('Y'); ?> by <span>Varija,Nithya,Hasini</span> | all rights reserved! </div>

</section>


<!-- footer section ends -->





















































<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>