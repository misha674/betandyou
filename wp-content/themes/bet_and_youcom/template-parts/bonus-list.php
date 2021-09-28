<?php if( have_rows('bonus') ): ?>
<section class="bonus">
  <div class="container">
    <div class="bonus__body">
      <?php while( have_rows('bonus') ) : the_row();

        $name = get_sub_field('bonus_name');
        $image = get_sub_field('bonus_image'); ?>

      <div class="bonus__item item">
        <div class="item__top">
          <div class="item__name">
            <?php echo $name; ?>
          </div>
          <div class="item__img">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
          </div>
        </div>
        <div class="item__bottom">
          <button data-link="Z28tYmV0" class="btn btn_o item__button">
            <span>Saiba mais</span>
          </button>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>
