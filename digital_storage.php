<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/Digital_storage.css">
    <script src="Javascript/globaljs.js"></script>
</head>
<body class="fade-in">
   <?php
        session_start();
        $username = $_SESSION["MM_usernmame"];
        // create database connection
        $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
        // create sql statement
        $sql = "SELECT * FROM digital_storage WHERE username = '$username'";
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
        <h1 id="storage-txt">Digital-STORAGE</h1>
        <section id="membergrid">
           <?php
                while ($cartitem = mysqli_fetch_assoc($cartitems))
                {
            ?>
            <section class="box">
                <img src="<?php echo $cartitem['image']?>" alt="peopleimg" class="center" onerror="this.style.display='none'">
            </section>
            <?php
                }
            ?>
        </section>
        <section id="txtes">
            <?php if(isset($_GET['fail'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Invalid file type</font>";?>
            <?php if(isset($_GET['fail2'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Invalid file size</font>";?>
        </section>
        <form method="POST" action="uploadstorage.php" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" class="centerbtn" />
            <button type="submit" class="centerbtn" id="addpoto">Add a Photo</button>
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