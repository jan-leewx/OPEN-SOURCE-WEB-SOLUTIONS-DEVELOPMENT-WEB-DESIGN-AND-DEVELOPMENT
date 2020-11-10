<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/members_access.css">
    <script src="Javascript/globaljs.js"></script>
</head>
<body class="fade-in">
   <?php
        session_start();
        $username = $_SESSION["MM_usernmame"];
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
        <h1 id="member-txt">MEMBERS</h1>
        <h2 id="member-name">Welcome, <?php echo $username?></h2>
        <section id="membergrid">
            <section class="box">
                <a href="edit_profile.php"><img src="photos/Icons/man.png" alt="editprofile"
                onmouseover="this.src='photos/Icons/man(orange).png'"
                onmouseout="this.src='photos/Icons/man.png'" class="iconsbig"></a>
                <a href="edit_profile.php"><p class="iconname">Edit Profile</p></a>
            </section>
            <section class="box">
                <a href="book_appointments.php"><img src="photos/Icons/book.png" alt="bookappointment"
                onmouseover="this.src='photos/Icons/book(orange).png'"
                onmouseout="this.src='photos/Icons/book.png'" class="iconsbig"></a>
                <a href="book_appointments.php"><p class="iconname">Book Appointments</p></a>
            </section>
            <section class="box">
                <a href="manage_bookings.php"><img src="photos/Icons/calendar%20(1).png" alt="manageappointment"
                onmouseover="this.src='photos/Icons/calendar%20(1)(orange).png'"
                onmouseout="this.src='photos/Icons/calendar%20(1).png'" class="iconsbig"></a>
                <a href="manage_bookings.php"><p class="iconname">Manage Appointments</p></a>
            </section>
            <section class="box">
                <a href="pet_profile.php"><img src="photos/Icons/dog.png" alt="petprofile"
                onmouseover="this.src='photos/Icons/dog(orange).png'"
                onmouseout="this.src='photos/Icons/dog.png'" class="iconsbig"></a>
                <a href="pet_profile.php"><p class="iconname">Pet Profile</p></a>
            </section>
            <section class="box">
                <a href="digital_storage.php"><img src="photos/Icons/cloud-storage.png" alt="digitalstorage"
                onmouseover="this.src='photos/Icons/cloud-storage(orange).png'"
                onmouseout="this.src='photos/Icons/cloud-storage.png'" class="iconsbig"></a>
                <a href="digital_storage.php"><p class="iconname">Digital Storage</p></a>
            </section>
            <section class="box">
                <a href="referal.php"><img src="photos/Icons/app.png" alt="referalcode"
                onmouseover="this.src='photos/Icons/app(orange).png'"
                onmouseout="this.src='photos/Icons/app.png'" class="iconsbig"></a>
                <a href="referal.php"><p class="iconname">Referal Codes</p></a>
            </section>
        </section>
            <form method="POST" action="logout.php" class="box">
                <button type="submit">Logout</button>
            </form>
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