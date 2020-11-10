<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="Stylesheets/pet_appointments.css">
    <script src="Javascript/globaljs.js"></script>
</head>
<body class="fade-in">
   <?php
        session_start();
        $username = $_SESSION["MM_usernmame"];
        // create database connection
        $conn = mysqli_connect("localhost", "root", "", "m3_januariuslee_190340p_db" );
        // create sql statement
        $sql = "SELECT * FROM pet_info WHERE username = '$username'";
        // execute the SQL statement
        $cartitems = mysqli_query($conn , $sql);
        mysqli_close($conn);
    
        //open connection and select database
        $conn = mysqli_connect("localhost", "root", "","m3_januariuslee_190340p_db" );
        //Write an SQL statement to extract data from product table
        $sql = "SELECT * FROM pet_image WHERE username = '$username' ORDER BY id DESC LIMIT 1";
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
        <h1 id="editpetprofile-txt">PET PROFILE</h1>
        <aside id="editprofilecontainer">
            <section class="box">
                <img src="<?php echo $userimg['petimage']?>" alt="peopleimg" class="center" onerror="this.style.display='none'">
                <form method="POST" action="pet_img_upload.php" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="centerbtn" />
                    <button type="submit" class="centerbtn" id="addpoto">Add a Photo</button>
                </form>
            </section>
            <section class="box">
                   <?php
                        $grandtotal = 0;
                        if($cartitems->num_rows >= 1)
                        {
                                while ($cartitem = mysqli_fetch_assoc($cartitems))
                                {
                            
                    ?>
                                <form method="POST" action="add_pet_profile.php" class="formmargin">
                                    <section id="gridcontainer">
                                        <p><label for="pname" class="txts">Name:</label></p>
                                        <p><input type="text" placeholder="Enter Pet Name" id="pname" name="pname" value="<?php echo $cartitem['petname'];?>"></p>
                                        <p><label class="txts">Please select your gender:</label></p>
                                        <p><input type="radio" id="male" name="gender" <?php echo ($cartitem['petgender'] == 'Male')? 'checked':'' ?> value="Male">
                                        <label for="male" class="txts">Male</label>
                                        <input type="radio" id="female" name="gender" <?php echo ($cartitem['petgender'] == 'Female')? 'checked':'' ?> value="Female">
                                        <label for="female" class="txts">Female</label>
                                        <p><label for="dob" class="txts">Date of Birth:</label></p>
                                        <p><input type="date" placeholder="Enter Date of Birth" id="dob" name="dob" value="<?php echo $cartitem['petdateofbirth'];?>"></p>
                                        <p><label for="Pet/Breed" class="txts">Pet/Breed:</label></p>
                                        <p><input type="text" placeholder="Enter Pet/Breed" id="Pet/Breed" name="Pet/Breed" value="<?php echo $cartitem['petBreed'];?>"></p>
                                        <p><label for="personality" class="txts">Personality:</label></p>
                                        <p><textarea id="personality" name="personality" rows="10" cols="20"><?php echo $cartitem['petpersonality'];?></textarea></p>
                                    </section>
                                </form>
                    <?php
                                }
                        }
                            else
                            {
                    ?>
                                <form method="POST" action="add_pet_profile.php" class="formmargin">
                                    <section id="gridcontainer">
                                        <p><label for="pname" class="txts">Name:</label></p>
                                        <p><input type="text" placeholder="Enter Pet Name" id="pname" name="pname"></p>
                                        <p><label class="txts">Please select your gender:</label></p>
                                        <p><input type="radio" id="male" name="gender" value="Male">
                                        <label for="male" class="txts">Male</label>
                                        <input type="radio" id="female" name="gender" value="Female">
                                        <label for="female" class="txts">Female</label>
                                        <p><label for="dob" class="txts">Date of Birth:</label></p>
                                        <p><input type="date" placeholder="Enter Date of Birth" id="dob" name="dob"></p>
                                        <p><label for="Pet/Breed" class="txts">Pet/Breed:</label></p>
                                        <p><input type="text" placeholder="Enter Pet/Breed" id="Pet/Breed" name="Pet/Breed"></p>
                                        <p><label for="personality" class="txts">Personality:</label></p>
                                        <p><textarea id="personality" name="personality" rows="10" cols="20"></textarea></p>
                                    </section>
                                        <button class="profilebtns" type="submit">Add Profile</button>
                                        <button class="profilebtns" type="submit">Clear</button>
                                </form>   
                    <?php
                            }
                    ?>

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