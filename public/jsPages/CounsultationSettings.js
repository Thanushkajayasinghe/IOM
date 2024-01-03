var audio = new Audio("http://www.stephaniequinn.com/Music/Allegro%20from%20Duet%20in%20C%20Major.mp3");

$('#play-pause-button').on("click",function(){
   
  if($(this).hasClass('fa-play-circle'))
   {
     $(this).removeClass('fa-play-circle');
     $(this).addClass('fa-pause-circle');
     audio.play();
   }
  else
   {
     $(this).removeClass('fa-pause-circle');
     $(this).addClass('fa-play-circle');
     audio.pause();
   }
});

audio.onended = function() {
     $("#play-pause-button").removeClass('fa-pause-circle');
     $("#play-pause-button").addClass('fa-play-circle');
};

