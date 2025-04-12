<section class="profile-area"> <!-- 著者のプロフィール情報 「CFT」使用 -->
  <h2 class="profile-top">プロフィール</h2>
  <div class="profile-img-area">
    <?php //プロフィール画像を取得
    $img_attr = wp_get_attachment_image_src(post_custom('profile-image'), 'full');
    if($img_attr):
    ?>
    <img src="<?php echo $img_attr[0]; ?>">
    <?php endif; ?>
    <div class="profile-name-wrapper">
      <?php if(post_custom('profile-name')): //著者の名前を取得 ?>
      <p class="profile-name"><?php echo esc_html(post_custom('profile-name')); ?></p>
      <?php endif; ?>
    </div>
  </div>
  <?php if(post_custom('profile-description')): //著者の概要を取得 ?>
  <p class="profile-description"><?php echo esc_html(post_custom('profile-description')); ?></p>
  <?php endif; ?>
</section>