<?php $images = get_field('slider'); ?>
<?php if( $images ): ?>
<div class="Wallop Wallop--fade op-slider">
  <div class="Wallop-list">
    <?php foreach( $images as $image ): ?>
    <div class="Wallop-item">
      <div class="op-slider__item">
        <img src="<?php echo $image['sizes']['large']; ?>" alt="" class="op-slider__image" data-adaptive-background="1">
      </div>
    </div>
  <?php endforeach; ?>
  </div>
  <?php /*
  <div class="fixed op-slider__controller">
    <button class="abs Wallop-buttonPrevious">Previous</button>
    <button class="abs Wallop-buttonNext">Next</button>
  </div>
  */?>
</div>
<?php endif; ?>
