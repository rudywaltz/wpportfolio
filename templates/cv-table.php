<tr>
  <td></td>
  <td class="date"><?php echo $data['year'] ?></td>
</tr>
<?php foreach ( $data['data'] as $loop ) : ?>
  <tr>
    <td></td>
    <td class="data">
      <?php if($loop['link']) : ?>
      <a href="<?php echo $loop['link']?>">
        <?php endif; ?>
        <?php echo $loop['title']?></a>,
      <?php if($loop['link']) : ?>
        </a>
      <?php endif; ?>
      &nbsp;<i><?php echo $loop['gallery']?>, <?php echo $loop['city']?></i>

    </td>
  </tr>
<?php endforeach; ?>
