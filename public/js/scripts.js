// var vid = document.getElementById("bgvid"),
// pauseButton = document.getElementById("vidpause");
// if (window.matchMedia('(prefers-reduced-motion)').matches) {
//     vid.removeAttribute("autoplay");
//     vid.pause();
//     pauseButton.innerHTML = "Paused";
// }

// function vidFade() {
//     vid.classList.add("stopfade");
// }
// vid.addEventListener('ended', function() {
//     // only functional if "loop" is removed 
//      vid.pause();
//   // to capture IE10
//   vidFade();
// });
// pauseButton.addEventListener("click", function() {
//     vid.classList.toggle("stopfade");
//   if (vid.paused) {
// vid.play();
//     pauseButton.innerHTML = "Pause";
//   } else {
//         vid.pause();
//         pauseButton.innerHTML = "Paused";
//   }
// })

// $('body').videoBG({
//     position:"fixed",
//     zIndex:-1,
//     mp4:'christmas_snow.mp4',
//     ogv:'christmas_snow.ogv',
//     webm:'christmas_snow.webm',
//     poster:'christmas_snow.jpg',
//     opacity:0.5
//   });


$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {



    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});