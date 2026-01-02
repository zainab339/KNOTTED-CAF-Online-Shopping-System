<?php
include 'header.php';

// if(isset($_SESSION['AdminID'])){
// header("Location: AdminOrders.php");
// }
?>
<style>
    body,.background{
        background-image: url(/Images/bg.jpg);
         background-size: cover; 
      background-position: center; 
      background-repeat: repeat;
    }
    .services{
        background-color: #FFEBD8;
    }
    
    .contact{
        background-image: url(Images/contactbg.png);
        background-size: cover; 
        background-position: center;
        

    }
    .info{
        border-radius: 20px;
        
        text-align: center;
        margin: 10px 30px 30px 10px;


    }
    ul{
        text-align: left;
    }
    p.label{
        margin: -5px 5px 5px 0px;
    }
    h2.special-heading{
        color: #D78180;
        font: 500 1rem, sans-serif;
        padding-top: 15px;
    }
    .container-contact{
        
        background-color: white;
        width: 400px;
        opacity: 0.75;
        border-radius: 20px;
        margin-left: 50px;
        
    }
    div.text-test{
        background-color: white;
        opacity: 0.75;
        border-radius: 15px;
        padding: 10px;
    }
   
    
    /* .intro-text{
        background-color: white;
        border-radius: 15px;
        width: 700px;
        height: 100px;
        text-align: center;
        justify-content: center;
    } */
</style>
    <div class="background">
        <div class="intro-text">
            <h1>Welcome to Knotted Cafe <i class="fa-solid fa-mug-saucer"></i></h1>
        </div>
    </div>
    <div class="services">
        <div class="container">
            <h2 class="special-heading">Services</h2>
            <div class="services-content">
                <div class="card">
                    <img src="Images/hp4.jpg" alt="">
                    <div class="info">
                        <h3>Special Offers</h3>
                        <p>Check out our current promotions and events!</p>
                        <ul>
                            <li>Buy One Get One Free</li>
                            <li>Birthday Special</li>
                            <li>Student Discount</li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <img src="Images/hp3.jpg" alt="">
                    <div class="info">
                        <h3>Health & Safety Measures</h3>
                        <p>Your safety is our top priority!</p>
                        <ul>
                            <li>Regular sanitization of high-touch surfaces.</li>
                            <li>Weekly hygiene inspections executed by specialists.</li>
                            <li>Hand sanitizer stations available throughout the cafe.</li>
                            <li>HEPA air filtration system installed for improved indoor air quality.</li>
                            <li>Contactless payment options available.</li>
                            <li>Staff trained in proper hygiene and safety protocols.</li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <img src="Images/hp5.jpg" alt="">
                    <div class="info">
                        <h3>Upcoming Events</h3>
                        <p>Stay tuned for our exciting events!</p>
                        <ul>
                            <li>Live Music Night</li>
                            <li>Donut Decorating Workshop</li>
                            <li>Donut Tasting Event</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about">
        <div class="container">
            <h2 class="special-heading">About</h2>
            <div class="about-content">
                <div class="image">
                    <img src="Images/hp1.jpg" alt="Knotted1">
                </div>
                <div class="text">
                    <p>Welcome to our cozy little haven, where every bite is a sweet symphony of delight! At Knotted
                        Cafe,
                        we're passionate about crafting irresistible treats that tantalize your taste buds and warm your
                        soul. Our charming cafe exudes warmth and friendliness, inviting you to indulge in a delectable
                        array of freshly baked donuts.
                        From classic favorites like Choco Mousse Donut to innovative
                        creations bursting with flavor, each bite is a testament to our dedication to quality and
                        creativity. Whether you're stopping by for your morning pick-me-up or treating yourself to an
                        afternoon indulgence, our artisanal donuts and pastries promise to elevate your culinary
                        experience.
                        Join us at your nearest location and savor the magic in every bite!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial">
        <div class="container">
            <h2 class="special-heading">Testimonials</h2>
            <div class="testimonial-content">
                <div class="col">
                    <div class="srv">
                        <i class="fa-solid fa-diamond"></i>
                        <div class="text-test">
                            <h3>Ulric Perry</h3>
                            <p>"Best donuts in town! I can't get enough of them!"</p>
                        </div>
                    </div>
                    <div class="srv">
                        <i class="fa-solid fa-diamond"></i>
                        <div class="text-test">
                            <h3>Bob Marley </h3>
                            <p>"I went to the branch in Dhahran and the staff were so friendly and they gave us
                                complementary donuts on
                                our first visit.."</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="srv">
                        <i class="fa-solid fa-diamond"></i>
                        <div class="text-test">
                            <h3>Miley Cyrus </h3>
                            <p>"These are the best donuts I have ever had in my life, they are so soft and delicious. I
                                can buy myself
                                Knotted Donuts"</p>
                        </div>
                    </div>
                    <div class="srv">
                        <i class="fa-solid fa-diamond"></i>
                        <div class="text-test">
                            <h3>Selena Gomez </h3>
                            <p>"I love their donuts like I love songs."</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="image">
                        <img src="Images/hp2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container-contact">
            <h2 class="special-heading">Contact</h2>
            <div class="info">
                <p class="label">Feel free to drop us a line at:</p>
                <a href="mailto:knotted@mail.com?subject=Contact" class="link">knotted@mail.com</a>
                <div class="social">
                    Find Us On Social Networks
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                </div>
            </div>
        </div>
    </div>
<?php
include 'footer.php';
?>