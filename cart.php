<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/cart.css">
    <script src="Javascript/globaljs.js"></script>
    <script src="Javascript/calender.js"></script>
</head>
<body class="fade-in">
    <?php
        session_start();
        $username = $_SESSION["MM_usernmame"];

        // create database connection
        $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
        // create sql statement
        $sql = "SELECT * FROM user_appointment WHERE username = '$username' ORDER BY id DESC LIMIT 1";
        // execute the SQL statement
        $cartitems = mysqli_query($conn , $sql);
        mysqli_close($conn);
    ?>
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
        <h1 id="cart-txt">CART</h1>
        <section>
            <section class="progressbar">
                <section class="baritems active">Login</section>
                <section class="baritems active">Select Service</section>
                <section class="baritems active">Select Add-ons</section>
                <section class="baritems">Checkout</section>
            </section>
        </section>
        <section id="container" class="box">
            <table>
                <thead role="rowgroup">
                <tr>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Category</th>
                    <th>Grooming</th>
                    <th>Warm-up</th>
                    <th>Accessories</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody role="rowgroup">
                <?php
                    while ($cartitem = mysqli_fetch_assoc($cartitems))
                    {
                ?>
                <tr>
                    <td><?php echo $cartitem['username']; ?></td>
                    <td><?php echo $cartitem['date']; ?></td>
                    <td><?php echo $cartitem['time']; ?></td>
                    <td><?php echo $cartitem['endtime']; ?></td>
                    <td><?php echo $cartitem['category']; ?></td>
                    <td><?php echo $cartitem['Grooming']; ?></td>
                    <td><?php echo $cartitem['Warm_up']; ?></td>
                    <td><?php echo $cartitem['Accessories']; ?></td>
                    <td>
                        <form action="deletecart.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $cartitem['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <form method="POST" action="deletepromo.php" id="promoform">
                <input type="text" id="promobox" name="code">
                <input type="submit" id="promosub" value="submit">
            </form>
        </section>
        <input type="submit" value="Back to main" id="back-btn" onclick="window.location.href='members_access.php'">
        <input type="submit" value="Confirm Booking" id="submit-btn" onclick="window.location.href='success.html'">
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