function signinvalidate()
{
    var username = document.forms["signin"]["Username"];
    var password = document.forms["signin"]["pword"];
    
    if (username.value == "")                                  
        { 
            window.alert("Please enter your username."); 
            username.focus(); 
            return false; 
        } 
    else if (password.value == "")                                  
        { 
            window.alert("Please enter your Password."); 
            password.focus(); 
            return false; 
        } 
}
function signupvalidate()
{
    var fname = document.forms["signup"]["fname"];
    var lname = document.forms["signup"]["lname"];
    var email = document.forms["signup"]["email"];
    var newUsername = document.forms["signup"]["newUsername"];
    var npword = document.forms["signup"]["npword"];
    var cfmnpword = document.forms["signup"]["cfmnpword"];
    
    if (fname.value == "")                                  
        { 
            window.alert("Please enter your First Name."); 
            fname.focus(); 
            return false; 
        } 
    else if (lname.value == "")                                  
        { 
            window.alert("Please enter your Last Name."); 
            lname.focus(); 
            return false; 
        } 
    else if (email.value == "")                                  
        { 
            window.alert("Please enter your Email."); 
            email.focus(); 
            return false; 
        } 
    else if (newUsername.value == "")                                  
        { 
            window.alert("Please enter your Username."); 
            newUsername.focus(); 
            return false; 
        } 
    else if (npword.value == "")                                  
        { 
            window.alert("Please enter your Password."); 
            npword.focus(); 
            return false; 
        } 
    else if (cfmnpword.value == "")                                  
        { 
            window.alert("Please reenter your Password."); 
            cfmnpword.focus(); 
            return false; 
        }
}
function changepassvalidate()
{
    var cpword = document.forms["signin"]["cpword"];
    var npword = document.forms["signin"]["npword"];
    var cfmnpword = document.forms["signin"]["cfmnpword"];
    
    if (cpword.value == "")                                  
        { 
            window.alert("Please enter your current password."); 
            cpword.focus(); 
            return false; 
        } 
    else if (npword.value == "")                                  
        { 
            window.alert("Please enter your New Password."); 
            npword.focus(); 
            return false; 
        } 
    else if (cfmnpword.value == "")
        {
            window.alert("Please reenter your New Password."); 
            cfmnpword.focus(); 
            return false;  
        }
    else if (cfmnpword.value != npword.value)
        {
            window.alert("Your password do not match.");
            return false;  
        }
    else
        {
            window.alert("Password change success."); 
        }
}