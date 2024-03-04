
// videoControls.js

export function videoControls() {
  const videoPlayer = document.querySelector('.video-player');
  const controls = document.querySelector('.controls'); 
  const video = document.querySelector('#myVideo');
  const playButton = document.querySelector('#playButton');
  const pauseButton = document.querySelector('#pauseButton');
  const restartButton = document.querySelector('#restartButton');



  playButton.addEventListener('click', function () {
    video.play();
  });

  pauseButton.addEventListener('click', function () {
    video.pause();
  });

  restartButton.addEventListener('click', function () {
    video.currentTime = 0;
    video.play();
  });

    videoPlayer.addEventListener('mouseover', function () {

      controls.style.display = 'flex';
  
  });


  videoPlayer.addEventListener('mouseout', function() {
    controls.style.display = 'none';
    
  });

}
