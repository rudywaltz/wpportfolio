(function(){
  if(typeof Wallop !== 'undefined') {
    var wallopEl = document.querySelector('.Wallop');
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
