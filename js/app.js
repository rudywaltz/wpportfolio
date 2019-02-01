document.addEventListener("DOMContentLoaded", function () {
  if(typeof baguetteBox !== 'undefined') {
    baguetteBox.run('.js-gallery', {
      overlayBackgroundColor: 'white',
      buttons: true
    });
  }
});

(function(){
  if(typeof Wallop !== 'undefined') {
    var wallopEl = document.querySelector('.Wallop');
    if(!wallopEl) {
      return;
    }
    var slider = new Wallop(wallopEl);

    var autoPlayMs = 4500,
      nextTimeout,
      sliderLoadNext = function() {
        var nextIndex = (slider.currentItemIndex + 1) % slider.allItemsArray.length;
        slider.goTo(nextIndex);
      };
    nextTimeout = setTimeout(function() {
      sliderLoadNext();
    }, autoPlayMs);
    slider.on('change', function() {
      console.log('change');
      clearTimeout(nextTimeout);
      nextTimeout = setTimeout(function() {
        sliderLoadNext();
      }, autoPlayMs);
    });
    wallopEl.addEventListener('mouseenter', function() {
      clearTimeout(nextTimeout);
    });
    wallopEl.addEventListener('mouseleave', function() {
      nextTimeout = setTimeout(function() {
        sliderLoadNext();
      }, autoPlayMs);
    });

    AdaptiveBackgrounds();
  }
})();
