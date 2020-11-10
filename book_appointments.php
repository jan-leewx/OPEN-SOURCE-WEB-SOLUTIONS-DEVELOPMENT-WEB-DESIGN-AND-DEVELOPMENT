<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/book_appointments.css">
    <script src="Javascript/globaljs.js"></script>
    <script src="Javascript/calender.js"></script>
</head>
<body class="fade-in">
    <header>
       <div class="bg-imgindoor">
           <a href="index.html"><img src="photos/Icons/logo(filled%20BORDER%20large%20black)-01.png" alt="JANUARIUS PHOTOGRAPHY" id="logo" class="center"></a>
           <nav id="nav">
               <ul class="menu">
                   <li><a href="index.html">HOME</a></li>
                   <li><a href="services.html">SERVICES</a>
                       <ul>
                           <li><a href="indoor.html">INDOOR</a></li>
                           <li><a href="outdoor.html">OUTDOOR</a></li>
                           <li id="studiomen"><a href="studio.html">STUDIO</a></li>
                       </ul>
                   </li>
                   <li><a href="about.html">ABOUT</a></li>
                   <li><a href="portfolio.html">PORTFOLIO</a></li>
                   <li class="activemenu"><a href="members.php">MEMBERS</a></li>
                   <li><a href="contact.html">CONTACT</a></li>
               </ul>
                <form action="/action_page.php" id="form">
                    <input type="search" placeholder="  Search" name="search" id="searchbar">
                </form>
           </nav>
           <div class="menu-toggle" onclick="navbar()"><p id="menutxt">HOME</p></div>
           <div class="tab" id="tab" onclick="navbar()">
              <hr id="border-delete" class="hidden">
              <div class="arrow-down"></div>
           </div>
       </div>
    </header>
    <article>
        <h1 id="bookappts-txt">BOOK APPOINTMENT</h1>
        <section>
            <section class="progressbar">
                <section class="baritems active">Login</section>
                <section class="baritems">Select Service</section>
                <section class="baritems">Select Add-ons</section>
                <section class="baritems">Checkout</section>
            </section>
        </section>
            <section id="gridcontainer">
                <section id="subcontainer">
                    <section class="box">
                        <img src="photos/jay-wennington-CdK2eYhWfQ0-unsplash.jpg" alt="profilepic" id="indoor" class="pics">
                        <h2 class="carthead">INDOOR</h2>
                        <h2 class="carthead">($300)</h2>
                        <h2 class="carttxt">2 hour slots per selection</h2>
                        <form method="POST" action="book_appointment.php">
                            <input type="hidden" name="category" value="Indoor">
                            <input type="date" name="newQty">
                            <input type="time" name="newTime">
                            <input type="submit" value="Add to cart">
                        </form>
                    </section>
                    <section class="box">
                        <img src="photos/jordyn-montague-8g0CStP6_Mk-unsplash.jpg" alt="profilepic" id="outdoor" class="pics">
                        <h2 class="carthead">OUTDOOR</h2>
                        <h2 class="carthead">($400)</h2>
                        <h2 class="carttxt">2 hour slots per selection</h2>
                        <form method="POST" action="book_appointment.php">
                            <input type="hidden" name="category" value="Outdoor">
                            <input type="date" name="newQty">
                            <input type="time" name="newTime">
                            <input type="submit" value="Add to cart">
                        </form>
                    </section>
                    <section class="box">
                        <img src="photos/ilya-shishikhin-a01Y4ijMFRA-unsplash.jpg" alt="profilepic" id="studio" class="pics">
                        <h2 class="carthead">STUDIO</h2>
                        <h2 class="carthead">($500)</h2>
                        <h2 class="carttxt">2 hour slots per selection</h2>
                        <form method="POST" action="book_appointment.php">
                            <input type="hidden" name="category" value="Studio">
                            <input type="date" name="newQty">
                            <input type="time" name="newTime">
                            <input type="submit" value="Add to cart">
                        </form>
                    </section>
                </section>
            </section>
            <section class="box">
                <?php if(isset($_GET['fails'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Time is not avaliable.</font>";?>
        </section>
            <input type="submit" value="Back to main" id="back-btn" onclick="window.location.href='members_access.php'">
    </article>
    <footer>
       <section id="mediaicons">
            <a href="https://www.instagram.com/piak_piaks/"><img src="photos/Icons/instagram.png" alt="instagram" class="icons"></a>
            <a href="https://www.facebook.com/leejanuarius"><img src="photos/Icons/facebook.png" alt="facebook" class="icons"></a>
            <a href="https://www.linkedin.com/in/januarius-lee"><img src="photos/Icons/linkedin.png" alt="linkedin" class="icons"></a>
            <a href="mailto:Leejanuarius1@gmail.com"><img src="photos/Icons/mail.png" alt="mail" class="icons"></a>
        </section>
        <p id="footertxt">Made by : Januarius Lee ( 190340P ) &copy; 2020</p>
    </footer>
    <script>
        let div = document.querySelector('div');
        window.addEventListener('scroll' , function(){
            let value = 1 + window.scrollY/-1300;
            div.style.opacity = value;
        });
    </script>
</body>
</html>