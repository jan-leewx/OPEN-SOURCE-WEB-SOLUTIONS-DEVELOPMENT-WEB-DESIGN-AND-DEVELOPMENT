<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/edit_profile.css">
    <script src="Javascript/globaljs.js"></script>
<script src="Javascript/form_validation.js"></script>
</head>
<body class="fade-in">
   <?php
        session_start();
        $username = $_SESSION["MM_usernmame"];
        // create database connection
        $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
        // create sql statement
        $sql = "SELECT * FROM user_info WHERE username = '$username'";
        // execute the SQL statement
        $cartitems = mysqli_query($conn , $sql);
        mysqli_close($conn);
    
        //open connection and select database
        $conn = mysqli_connect("localhost", "root", "","m3_januariuslee_190340p_db" );
        //Write an SQL statement to extract data from product table
        $sql = "SELECT * FROM user_image WHERE username = '$username' ORDER BY id DESC LIMIT 1";
        //execute the SQL statement
        $img = mysqli_query($conn , $sql);
        //fetch the product
        $userimg = mysqli_fetch_assoc($img);
        // close sql connection
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
        <h1 id="editprofile-txt">Edit Profile</h1>
        <aside id="editprofilecontainer">
            <section class="box">
                <img src="<?php echo $userimg['profileimage']?>" alt="peopleimg" class="center" onerror="this.style.display='none'">
                <form method="POST" action="img_upload.php" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="centerbtn" />
                    <button type="submit" class="centerbtn" id="addpoto">Add a Photo</button>
                </form>
            </section>
            <section class="box">
                   <?php
                        $grandtotal = 0;
                        while ($cartitem = mysqli_fetch_assoc($cartitems))
                        {
                    ?>
                    <form method="POST" action="change_profile.php" class="formmargin" name="editprofile">
                        <section id="gridcontainer">
                            <p><label for="fname" class="txts">First name:</label></p>
                            <p><input type="text" placeholder="Enter First Name" id="fname" name="fname" value="<?php echo $cartitem['firstname'];?>"></p>
                            <p><label for="lname" class="txts">Last name:</label></p>
                            <p><input type="text" placeholder="Enter Last Name" id="lname" name="lname" value="<?php echo $cartitem['lastname'];?>"></p>
                            <p><label class="txts">Please select your gender:</label></p>
                            <p><input type="radio" id="male" name="gender" <?php echo ($cartitem['gender'] == 'Male')? 'checked':'' ?> value="Male">
                            <label for="male" class="txts">Male</label>
                            <input type="radio" id="female" name="gender" <?php echo ($cartitem['gender'] == 'Female')? 'checked':'' ?> value="Female">
                            <label for="female" class="txts">Female</label>
                            <p><label for="email" class="txts">Email:</label></p>
                            <p><input type="text" placeholder="Enter Email" id="email" name="email" value="<?php echo $cartitem['email'];?>"></p>
                            <p><label for="Username" class="txts">Username:</label></p>
                            <p><input type="text" placeholder="Enter Username" id="Username" name="Username" value="<?php echo $cartitem['username'];?>"></p>
                            <p><label for="address" class="txts">Address:</label></p>
                            <p><input type="text" placeholder="Enter Address" id="address" name="address" value="<?php echo $cartitem['address'];?>"></p>
                            <p><label for="dob" class="txts">Date of Birth:</label></p>
                            <p><input type="date" placeholder="Enter Date of Birth" id="dob" name="dob" value="<?php echo $cartitem['dateofbirth'];?>"></p>
                            <p><label for="Contact_Number" class="txts">Contact Number:</label></p>
                            <p><input type="text" placeholder="Enter Contact Number" id="Contact_Number" name="Contact_Number" value="<?php echo $cartitem['contactnum'];?>"></p>
                        </section>
                            <button class="profilebtns" type="submit">Update Profile</button>
                            <button class="profilebtns" type="submit">Clear</button>
                    <?php
                        }
                    ?>
                    </form>
                    <form method="POST" action="change_password.php" class="formmargin" name="changepass" onsubmit="return changepassvalidate()">
                        <section id="gridcontainer2">
                            <p><label for="cpword" class="txts">Current Password:</label></p>
                            <p><input type="password" placeholder="Enter Password" id="cpword" name="cpword" class="txtbox" required></p>
                            <p><label for="npword" class="txts">New Password:</label></p>
                            <p><input type="password" placeholder="New Password" id="npword" name="npword" class="txtbox" required></p>
                            <p><label for="cfmnpword" class="txts">Confirm New Password:</label></p>
                            <p><input type="password" placeholder="Confirm New Password" id="cfmnpword" name="cfmnpword" class="txtbox" required></p>
                            <p><?php if(isset($_GET['fail'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Passwords do not match</font>";?></p>
                            <p><?php if(isset($_GET['success'])) echo "<font color=#1C1C21 font face='Raleway-Thin' font weight: 'bold' size='5px'>Password change success</font>";?></p>
                        </section>
                            <button class="profilebtns" type="submit">Update password</button>
                            <button class="profilebtns" type="submit">Clear</button>
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