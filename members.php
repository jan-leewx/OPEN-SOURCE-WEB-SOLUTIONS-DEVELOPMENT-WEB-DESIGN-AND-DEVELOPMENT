<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/members.css">
    <script src="Javascript/globaljs.js"></script>
    <script src="Javascript/form_validation.js"></script>
</head>
<body class="fade-in">
   <?php
        session_start();
        if(isset($_SESSION['MM_usernmame']))
        {
            header("Location:members_access.php");
        }
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
        <p id="memberpara" class="box">As members, you will be able to book, view and change your appointments with our professional photographers, gain special benefits like promo codes
        pet profiles and digital storage where the photos taken are uploaded and stored there.</p>
        <aside id="membercontainer">
            <section id="signin" class="box">
                <h2 id="signinhead">Sign-in</h2>
                <form method="POST" action="checklogin.php" class="formmargin" name="signin" onsubmit="return signinvalidate()">
                        <section id="gridcontainer2">
                            <p><label for="Username" class="txts">Username:</label></p>
                            <p><input type="text" placeholder="Enter Username" id="Username" name="Username"></p>
                            <p><label for="npword" class="txts">Password:</label></p>
                            <p><input type="password" placeholder="New Password" id="pword" name="pword" class="txtbox"></p>
                            <p><input type="checkbox" checked="checked" name="remember" id="remember"> <label for="remember" class="txts">Remember me</label></p>
                            <p><button type="submit">Sign-in</button></p>
                            <p><?php if(isset($_GET['fail'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Invalid username or password</font>";?></p>
                        </section>
                    </form>
            </section>
            <section id="signup" class="box">
                <h2 id="signuphead">Sign-up</h2>
                <form method="POST" action="newuser.php" class="formmargin" name="signup" onsubmit="return signupvalidate()">
                    <section id="gridcontainer">
                        <p><label for="fname" class="txts">First name:</label></p>
                        <p><input type="text" placeholder="Enter First Name" id="fname" name="fname"></p>
                        <p><label for="lname" class="txts">Last name:</label></p>
                        <p><input type="text" placeholder="Enter Last Name" id="lname" name="lname"></p>
                        <p><label for="email" class="txts">Email:</label></p>
                        <p><input type="text" placeholder="Enter Email" id="email" name="email"></p>
                        <p><label for="newUsername" class="txts">Username:</label></p>
                        <p><input type="text" placeholder="Enter Username" id="newUsername" name="newUsername"></p>
                        <p><label for="npword" class="txts">New Password:</label></p>
                        <p><input type="password" placeholder="New Password" id="npword" name="npword" class="txtbox"></p>
                        <p><label for="cfmnpword" class="txts">Confirm New Password:</label></p>
                        <p><input type="password" placeholder="Confirm New Password" id="cfmnpword" name="cfmnpword" class="txtbox"></p>
                        <p></p>
                        <p>
                            <?php if(isset($_GET['fails'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>User already exits.</font>";?>
                            <?php if(isset($_GET['fails2'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Uanble to sign-up.</font>";?>
                            <?php if(isset($_GET['success'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Successfully signed up.</font>";?>
                        </p>
                        <button type="submit">Sign-up</button>
                        <button type="submit">Clear</button>
                    </section>
                </form>
            </section>
        </aside>
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