// Get Audio Track
var myAudio = new Audio('http://hestia.cdnstream.com:80/1569_128');
  
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