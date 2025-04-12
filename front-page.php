<?php get_header(); ?>

    <main class="main">    
      <div class="content-wrapper">
        <div class="content">
          <h1 class="page-title">最新の投稿</h1>
          <div class="article-list-wrapper">
            <ul class="article-list">
              <?php //最新の投稿を取得するサブループ開始
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
              );
              $new_query = new WP_Query($args);
              if($new_query->have_posts()): while($new_query->have_posts()): $new_query->the_post(); ?>    

              <li>
                <a href="<?php the_permalink(); ?>" >
                
                <div class="thumbnail-area">
                  <?php //アイキャッチ画像があれば表示
                  if(has_post_thumbnail()):
                    the_post_thumbnail('full');

                  else: ?>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sample-thumbnail.jpg" alt="ダミーのサムネイル">

                  <?php endif; ?>
                </div>
                
                  <div class="text">
                    <time class="entry-date"><?php echo get_the_date(); ?></time>
                    <p class="article-title"><?php the_title(); ?></p>

                    <?php /* カテゴリーをリンクなしで表示 */
                    $cats = get_the_category();
                    if($cats):
                    ?>
                      <ul class="category-list">
                      <?php foreach($cats as $cat): ?>
                        <li class="article-category"><?php echo $cat->name; ?></li>
                      <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </a>
              </li>

              <?php endwhile;
              wp_reset_postdata();
              else: ?>
                <p>投稿はありません。</p>
              <?php endif; ?>
            </ul>
          </div>
          <div class="btn-area"><button class="page-btn"><a href="<?php echo esc_url(home_url('/latest-posts'))?>">もっとみる</a></button></div>
        </div>
      </div>      
      <div class="content-wrapper">
        <div class="content">
          <section class="profile-area">
            <h2 class="profile-top">プロフィール</h2>
            <div class="profile-img-area">
              <img src="<?php echo get_template_directory_uri(); ?>/img/sample-thumbnail.jpg" alt="プロフィール画像">
              <div class="profile-name-wrapper">
                <p class="profile-name">アル</p>
              </div>
            </div>
            <p class="profile-description">1985年あたりに生まれ、武庫川大学歴史学科を卒業。いくらでも寝ることができます。</p>
          </section>
          
        </div>
      </div>
    </main>

<?php get_footer(); ?>