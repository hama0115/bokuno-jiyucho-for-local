<?php get_header(); ?>

    <main class="main">    
      <div class="content-wrapper">
        <div class="content">

          <div class="article-content">
            <p>お探しのページは、削除されたか、名前が変更された可能性があります。<br>
            直接アドレスを入力された場合は、アドレスが正しく入力されているかもう一度ご確認下さい。</p>
            <p>ブラウザの再読込みを行ってもこのページが表示される場合は、<a href="<?php echo esc_url( home_url('/')); ?>">トップページ</a>から目的のページをお探しください。</p>
          </div>
          
          <section class="latest-pages">
            <h2 class="latest-pages-title">最新の記事</h2>
            <?php
            if ( is_404() ) {
              $postid = get_the_ID();
              $authorid = get_the_author_meta( 'ID' );

              $args = [
                'posts_per_page' => 5,
                'author' => $authorid,
                'orderby' => 'date',
                'exclude' => $postid,
              ];

              $myposts = get_posts( $args );
              
              if ( $myposts ) :
                echo '<ul>';
                foreach ( $myposts as $post ) :
                  setup_postdata( $post ) ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
                <?php endforeach;
                wp_reset_postdata();
                echo '</ul>';
              else :
                echo '記事はありません。';
              endif ;
            }?>
          </section>
          <section class="profile-area">
             <h2 class="profile-top">プロフィール</h2>
             <div class="profile-img-area">
               <img src="<?php echo get_template_directory_uri(); ?>/img/sample-thumbnail.jpg" alt="プロフィール画像">
               <div class="profile-name-wrapper">
                 <p class="profile-name">暖房冷房</p>
               </div>
             </div>
             <p class="profile-description">1985年あたりに生まれ、武庫川大学歴史学科を卒業。いくらでも寝ることができます。</p>
           </section>
        </div>
      </div>
    </main>
    
<?php get_footer(); ?>