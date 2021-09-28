<?php

$posts = get_posts( array(
	'numberposts' => 5,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => $stream,
	'suppress_filters' => true,
) );

?>

<?php if ($posts) : ?>
<div class="table" data-link="Z28tYmV0">
<?php foreach( $posts as $num => $post ) :
	setup_postdata($post);

  $table = get_field($stream); ?>

  <?php if($num == 0) :?>
    <div class="table__header desktop">
      <div class="table__row">
        <div class="table__cell">
          <span class="trim"><?php echo $table['chemp_name']; ?></span>
        </div>
        <div class="table__cell small">
          <div class="table__col">1</div>
          <div class="table__col">x</div>
          <div class="table__col">2</div>
        </div>
        <div class="table__cell small">
          <div class="table__col">1x</div>
          <div class="table__col">12</div>
          <div class="table__col">2x</div>
        </div>
        <div class="table__cell small">
          <div class="table__col">
            <span class="trim">ABAIXO</span>
          </div>
          <div class="table__col">
            <span class="trim">TOTAL</span>
          </div>
          <div class="table__col">
            <span class="trim">ACIMA</span>
          </div>
        </div>
      </div>
    </div>
    <div class="table__body">
  <?php endif; ?>

    <div class="table__row">
      <div class="info">
        <div class="table__cell mobile">
          <span class="trim bold"><?php echo $table['chemp_name']; ?></span>
        </div>
        <div class="table__cell players">
          <span class="trim name"><?php echo $table['player1']; ?></span>
          <span class="sep mobile"> - </span>
          <span class="trim name"><?php echo $table['player2']; ?></span>
        </div>
      </div>
      <div class="values">
        <div class="table__cell number">
          <div class="table__col">
            <span class="number__head mobile">1</span>
            <span class="number__val"><?php echo $table['col1'][0] ? $table['col1'][0]: '-'; ?></span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">x</span>
            <span class="number__val"><?php echo $table['col1'][1] ? $table['col1'][1]: '-'; ?></span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">2</span>
            <span class="number__val"><?php echo $table['col1'][2] ? $table['col1'][2]: '-'; ?></span>
          </div>
        </div>
        <div class="table__cell number">
          <div class="table__col">
            <span class="number__head mobile">1x</span>
            <span class="number__val"><?php echo $table['col2'][0] ? $table['col2'][0]: '-'; ?></span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">12</span>
            <span class="number__val"><?php echo $table['col2'][1] ? $table['col2'][1]: '-'; ?></span>
          </div>
          <div class="table__col">
            <div class="number__head mobile">2x</div>
            <span class="number__val"><?php echo $table['col2'][2] ? $table['col2'][2]: '-'; ?></span>
          </div>
        </div>
        <div class="table__cell number">
          <div class="table__col">
            <span class="number__head mobile">ABAIXO</span>
            <span class="number__val"><?php echo $table['col3'][0] ? $table['col3'][0]: '-'; ?></span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">TOTAL</span>
            <span class="number__val"><?php echo $table['col3'][1] ? $table['col3'][1]: '-'; ?></span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">ACIMA</span>
            <span class="number__val"><?php echo $table['col3'][2] ? $table['col3'][2]: '-'; ?></span>
          </div>
        </div>
      </div>
    </div>

<?php endforeach; ?>
  </div>
</div>
<?php wp_reset_postdata(); ?>

<button data-link="Z28tYmV0" class="btn btn_o table__button">
  <span>Veja todas as apostas AO VIVO</span>
</button>

<?php endif; ?>