<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   header('location:index.php');
}

if(isset($_POST['check'])){

   $check_in = $_POST['check_in'];
   $check_in = filter_var($check_in, FILTER_SANITIZE_STRING);

   $total_rooms = 0;

   $check_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE check_in = ?");
   $check_bookings->execute([$check_in]);

   while($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)){
      $total_rooms += $fetch_bookings['rooms'];
   }

   // if the hotel has total 30 rooms 
   if($total_rooms >= 30){
      $warning_msg[] = 'rooms are not available';
   }else{
      $success_msg[] = 'rooms are available';
   }

}

if(isset($_POST['book'])){

   $booking_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $rooms = $_POST['rooms'];
   $rooms = filter_var($rooms, FILTER_SANITIZE_STRING);
   $check_in = $_POST['check_in'];
   $check_in = filter_var($check_in, FILTER_SANITIZE_STRING);
   $check_out = $_POST['check_out'];
   $check_out = filter_var($check_out, FILTER_SANITIZE_STRING);
   $adults = $_POST['adults'];
   $adults = filter_var($adults, FILTER_SANITIZE_STRING);
   $childs = $_POST['childs'];
   $childs = filter_var($childs, FILTER_SANITIZE_STRING);

   $total_rooms = 0;

   $check_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE check_in = ?");
   $check_bookings->execute([$check_in]);

   while($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)){
      $total_rooms += $fetch_bookings['rooms'];
   }

   if($total_rooms >= 30){
      $warning_msg[] = 'rooms are not available';
   }else{

      $verify_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE user_id = ? AND name = ? AND email = ? AND number = ? AND rooms = ? AND check_in = ? AND check_out = ? AND adults = ? AND childs = ?");
      $verify_bookings->execute([$user_id, $name, $email, $number, $rooms, $check_in, $check_out, $adults, $childs]);

      if($verify_bookings->rowCount() > 0){
         $warning_msg[] = 'room booked alredy!';
      }else{
         $book_room = $conn->prepare("INSERT INTO `bookings`(booking_id, user_id, name, email, number, rooms, check_in, check_out, adults, childs) VALUES(?,?,?,?,?,?,?,?,?,?)");
         $book_room->execute([$booking_id, $user_id, $name, $email, $number, $rooms, $check_in, $check_out, $adults, $childs]);
         $success_msg[] = 'room booked successfully!';
      }

   }

}

if(isset($_POST['send'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_message->execute([$name, $email, $number, $message]);

   if($verify_message->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css">
    <title>reservations.africa</title>
</head>
<body>
    <!-- THE HEADER SECTION -->
    <?php include 'components/user_header.php'; ?>

    <!-- THE HOME SECTION -->
    <section class="home">
        <div class="swiper homeSlider">
            <div class="swiper-wrapper">
                <div class="box swiper-slide">
                    <div class="flex">
                        <img src="src/img/home0.jpg" alt="">
                        <h3>clasic rooms</h3>
                        <a href="#availability" class="btn">check availability</a>
                    </div>
                </div>
                <div class="box swiper-slide">
                    <div class="flex">
                        <img src="src/img/home1.jpg" alt="">
                        <h3>clasic restuarents</h3>
                        <a href="#reservations" class="btn">make reservations</a>
                    </div>
                </div>
                <div class="box swiper-slide">
                    <div class="flex">
                        <img src="src/img/home2.jpg" alt="">
                        <h3>clasic conference rooms</h3>
                        <a href="#contacts" class="btn">contact us</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- THE AVAILABILITY SECTION -->
    <section id="availability" class="availability">
        <form action="" method="post">
            <div class="flex">
                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" name="checkIn" class="input" required>
                </div>
                <div class="box">
                    <p>check out <span>*</span></p>
                    <input type="date" name="checkOut" class="input" required>
                </div>
                <div class="box">
                    <p>adults <span>*</span></p>
                    <select name="adults" class="input">
                        <option value="1">1 adults</option>
                        <option value="2">2 adults</option>
                        <option value="3">3 adults</option>
                        <option value="4">4 adults</option>
                        <option value="5">5 adults</option>
                    </select>
                </div>
                <div class="box">
                    <p>children <span>*</span></p>
                    <select name="children" class="input">
                        <option value="0">0 children</option>
                        <option value="1">1 children</option>
                        <option value="2">2 children</option>
                        <option value="3">3 children</option>
                        <option value="4">4 children</option>
                        <option value="5">5 children</option>
                    </select>
                </div>
                <div class="box">
                    <p>rooms <span>*</span></p>
                    <select name="rooms" class="input">
                        <option value="1">1 rooms</option>
                        <option value="2">2 rooms</option>
                        <option value="3">3 rooms</option>
                        <option value="4">4 rooms</option>
                        <option value="5">5 rooms</option>
                    </select>
                </div>
            </div>
            <input type="button" value="check availability" class="btn">
        </form>
    </section>

    <!-- THE ABOUT SECTION -->
    <section id="about" class="about">
        <div class="row">
            <div class="image">
                <img src="src/img/service.jpg" alt="">
            </div>
            <div class="content">
                <h3>friendly customer service</h3>
                <p>
                    Reservations.Africa invites you to experience the epitome of luxury and hospitality. From our elegant accommodations to our impeccable service, we strive to create unforgettable experiences for every guest.
                    At Reservations.Africa, we blend modern comfort with timeless elegance, offering a sanctuary of relaxation amidst the bustling energy of the city.
                </p>
                <a href="#reservations" class="btn">make reservations</a>
            </div>
        </div>
        <div class="row revers">
            <div class="image">
                <img src="src/img/cuisine.jpg" alt="">
            </div>
            <div class="content">
                <h3>best cuisine</h3>
                <p>
                    Reservations.Africa invites you to experience the epitome of luxury and hospitality. From our elegant accommodations to our impeccable service, we strive to create unforgettable experiences for every guest.
                    At Reservations.Africa, we blend modern comfort with timeless elegance, offering a sanctuary of relaxation amidst the bustling energy of the city. Whether you're visiting for business or leisure, our attentive staff is dedicated to ensuring your stay exceeds your expectations.
                </p>
                <a href="#contact" class="btn">contact us</a>
            </div>
        </div>
        <div class="row">
            <div class="image">
                <img src="src/img/spa.jpg" alt="">
            </div>
            <div class="content">
                <h3>world class spa</h3>
                <p>
                    Reservations.Africa invites you to experience the epitome of luxury and hospitality. From our elegant accommodations to our impeccable service, we strive to create unforgettable experiences for every guest.
                    At Reservations.Africa, we blend modern comfort with timeless elegance, offering a sanctuary of relaxation amidst the bustling energy of the city. Whether you're visiting for business or leisure, our attentive staff is dedicated to ensuring your stay exceeds your expectations.
                </p>
                <a href="#availability" class="btn">check availability</a>
            </div>
        </div>

    </section>

    <!-- THE SERVICES SECTION -->
    <section class="services">
        <div class="box-container">
            <div class="box">
                <img src="src/img/fast-food.png" alt="">
                <h3>food and drinks</h3>
                <p>At Reservations.Africa, we believe that food is not just sustenance but a celebration of life.</p>
            </div>
            <div class="box">
                <img src="src/img/spa.png" alt="">
                <h3>spa treatment</h3>
                <p>Immerse yourself in a world of tranquility and luxury at our exquisite spa, where personalized treatments and holistic therapies await.</p>
            </div>
            <div class="box">
                <img src="src/img/swimming.png" alt="">
                <h3>swimming pools</h3>
                <p>At Reservations.Africa, we invite you to immerse yourself in the tranquility of our swimming pool and experience the epitome of luxury and hospitality</p>
            </div>
            <div class="box">
                <img src="src/img/terrace.png" alt="">
                <h3>outdoor dinning</h3>
                <p>Experience the enchantment of al fresco dining at our charming outdoor venues</p>
            </div>
            <div class="box">
                <img src="src/img/sea.png" alt="">
                <h3>beach view</h3>
                <p>Experience the ultimate seaside escape as you wake up to breathtaking views of the glistening ocean and golden sands</p>
            </div>
            <div class="box">
                <img src="src/img/wedding-arch.png" alt="">
                <h3>decorations</h3>
                <p>Step into a world of elegance and charm, where every detail is thoughtfully curated to create an atmosphere of refined luxury.</p>
            </div>
        </div>
        
    </section>

    <!-- THE RESERVATION SECTION -->
    <section class="reservation" id="reservations">
        <form action="" method="post">
            <h3>make a reservation</h3>
            <div class="flex">
                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" name="checkIn" class="input" required>
                </div>
                <div class="box">
                    <p>check out <span>*</span></p>
                    <input type="date" name="checkOut" class="input" required>
                </div>
                <div class="box">
                    <p>adults <span>*</span></p>
                    <select name="adults" class="input">
                        <option value="1">1 adults</option>
                        <option value="2">2 adults</option>
                        <option value="3">3 adults</option>
                        <option value="4">4 adults</option>
                        <option value="5">5 adults</option>
                    </select>
                </div>
                <div class="box">
                    <p>children <span>*</span></p>
                    <select name="children" class="input">
                        <option value="0">0 children</option>
                        <option value="1">1 children</option>
                        <option value="2">2 children</option>
                        <option value="3">3 children</option>
                        <option value="4">4 children</option>
                        <option value="5">5 children</option>
                    </select>
                </div>
                <div class="box">
                    <p>rooms <span>*</span></p>
                    <select name="rooms" class="input">
                        <option value="1">1 rooms</option>
                        <option value="2">2 rooms</option>
                        <option value="3">3 rooms</option>
                        <option value="4">4 rooms</option>
                        <option value="5">5 rooms</option>
                    </select>
                </div>
            </div>
            <input type="button" value="check availability" class="btn">
        </form>
    </section>

    <!-- THE GALARY SECTION -->
    <section class="gallery" id="gallery">
        <div class="swiper gallerySlider">
            <div class="swiper-wrapper">
                <img src="src/img/gallary0.jpg" alt="" class="swiper-slide">
                <img src="src/img/gallary1.jpg" alt="" class="swiper-slide">
                <img src="src/img/gallary2.jpg" alt="" class="swiper-slide">
                <img src="src/img/gallary3.jpg" alt="" class="swiper-slide">
                <img src="src/img/gallary4.jpg" alt="" class="swiper-slide">
                <img src="src/img/gallary5.jpg" alt="" class="swiper-slide">
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- THE CONTACT SECTION -->
    <section class="contact" id="contact">
        <div class="row">
            <form action="" method="post">
                <h3>ask us question</h3>
                <input type="text" name="name" class="box" required maxlength="50" placeholder="enter your name">
                <input type="email" name="email" class="box" required maxlength="50" placeholder="enter your email">
                <input type="number" name="number" class="box" required maxlength="50" min="0" max="9999999999" placeholder="enter your number">
                <textarea name="message" class="box" required maxlength="1000" cols="30" rows="10" placeholder="enter your message"></textarea>
                <input type="button" name="send" class="btn" value="send message">
            </form>
            <div class="faq">
                <h3 class="title">frequently asked questions</h3>
                <div class="box">
                    <h3>do you have facilities for events and meetings?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, explicabo.</p>
                </div>
                <div class="box">
                    <h3>how to cancel?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, explicabo.</p>
                </div>
                <div class="box">
                    <h3>is parking available at the hotel?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, explicabo.</p>
                </div>
                <div class="box">
                    <h3>what recreational activities are available at the hotel?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, explicabo.</p>
                </div>
                <div class="box">
                    <h3>do you offer dining options onsite?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, explicabo.</p>
                </div>
                <div class="box">
                    <h3>what amenities are included with my stay?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, explicabo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- THE FOOTER SECTION -->
    <?php include 'components/footer.php'; ?>


    <!-- THE SCRIPS SECTION -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>

    <?php include 'components/message.php'; ?>

</body>
</html>