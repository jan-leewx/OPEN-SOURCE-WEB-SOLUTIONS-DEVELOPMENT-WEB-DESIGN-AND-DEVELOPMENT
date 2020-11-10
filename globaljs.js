function menutoggle() 
        {
            var element = document.getElementById("nav");
            element.classList.toggle("activenav");
        }   
function removetab()
    {
        setTimeout(function(){ document.getElementById("tab").style.display = "none"; }, 300);
    }
function navbar()
    {
        menutoggle();
        removetab();
    }

