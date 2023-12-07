// << when the user scrolls down by 20px
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// << when click on button, scroll to top
function topFunction() {
  document.body.scrollTop = 0; // For Mobiles
  document.documentElement.scrollTop = 0; // for chrome
}

