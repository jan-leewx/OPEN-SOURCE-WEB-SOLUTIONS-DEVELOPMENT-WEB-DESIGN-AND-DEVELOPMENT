var i = 0;
var img = [];
var time = 3000;

img[0] = "photos/jamie-street-zwW7ZQO5-Lo-unsplash.jpg";
img[1] = "photos/jamie-street-zwW7ZQO5-Lo-unsplash.jpg";
img[2] = "photos/jamie-street-zwW7ZQO5-Lo-unsplash.jpg";
img[3] = "photos/jamie-street-zwW7ZQO5-Lo-unsplash.jpg";

function changeImage()
{
    document.slideshow.src = img[i];

    if(i < img.length - 1)
        {
          i++; 
        } 
    else 
        { 
            i = 0;
        }
    setTimeout("changeImage()", time);
}
window.onload = changeImage();