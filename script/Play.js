// Get Audio Track
var myAudio = new Audio('https://s2.radio.co/s506afb1b1/listen');
  
// Init isPlaying Variable
var isPlaying = false;

// Pause or Play Audio
function togglePlay() {
  if (isPlaying) {
    jQuery(".play-button").removeClass("pause");
    myAudio.pause()
  } else {
    jQuery(".play-button").addClass("pause");
    myAudio.play();
  }
};

myAudio.onplaying = function() {
  isPlaying = true;
};
  
myAudio.onpause = function() {
  isPlaying = false;
};

$('.social-toggle').on('click', function() {
  $(this).next().toggleClass('open-menu');
});