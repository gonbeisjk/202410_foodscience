<?php get_header(); ?><!-- header.php読み込み -->

<main>
    <div class="section">
      <div class="section_inner">
        <!-- if文：もし記事があったら -->
        <?php if ( have_posts() ) : ?>
            <!-- while文：記事がある分繰り返す
                ＆記事の情報を取得する    
            -->
            <?php while ( have_posts() ) : the_post() ;?>
            <!-- Q：繰り返しちゃったら、記事が延々に続
            いていかない？一個だけ表示したいのに…… -->
            <!-- A：いかない。WordPressのメインクエリ
            という命令が、「投稿ページってことは一回
            だよね？」とループ回数の空気を読んでくれるから -->


                <!-- articleタグに、最適なID名とclass名を付与 -->
                <article id="post-0<?php the_ID(); ?>" <?php post_class('post'); ?>>
                <header class="section_header">
                    <!-- 記事のタイトルを取得して表示 -->
                    <h1 class="heading heading-primary"><?php the_title(); ?></h1>
                </header>
                <div class="post_content">
                    <!-- 記事の情報から投稿時間を取得して表示 -->
                    <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y年m月d日') ?></time>
                    <div class="content">
                        <!-- 記事の内容を取得して表示 -->
                        <?php the_content(); ?>
                    </div>
                </div>


                <footer class="post_footer">
                    <!-- 変数categoriesに、記事のカテゴリー情報を取得して代入
                    if文：もしカテゴリー情報があったら…… 
                    -->
                    <?php
                        $categories = get_the_category();
                        if($categories):
                    ?>
                    <div class="category">
                    <div class="category_list">
                        <!-- foreach文開始：カテゴリー情報の文だけ繰り返し -->
                        <?php foreach($categories as $category) : ?>
                        <div class="category_item">
                            <!-- カテゴリーのリンクを取得して(echoで)表示 -->
                            <a href="<?php echo get_category_link($category); ?>" class="btn btn-sm is-active">
                                <!-- カテゴリー情報からカテゴリー名を取得して(echoで)表示 -->
                                <?php echo $category->name; ?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                        <!-- foreach文終了 -->
                    </div>
                </div>
                <?php endif; ?>
                <!-- if文終了 -->
                    
                    <div class="prevNext">
                        <!-- 変数previous_postに、
                            この記事の一つ前の記事
                            の情報を代入
                            if文：もし一つ前に記事が
                            あったら……
                        -->
                        <?php
                        $previous_post = get_previous_post();
                        if ( $previous_post ) :
                        ?>
                    <div class="prevNext_item prevNext_item-prev">
                        <!-- 一つ前の記事のリンクを取得して表示 -->
                        <a href="<?php the_permalink($previous_post) ?>">
                        <svg width="20" height="38" viewBox="0 0 20 38"><path d="M0,0,19,19,0,38" transform="translate(20 38) rotate(180)" fill="none" stroke="#224163" stroke-width="1" /></svg>
                        <!-- 一つ前の記事のタイトルを取得して(echoで)表示 -->
                        <span><?php echo get_the_title($previous_post) ?></span>
                        </a>
                    </div>
                    <?php endif; ?>
                    <!-- if文終了 -->
                    
                    <?php
                        $next_post = get_next_post();
                        if ($next_post) :
                            ?>
                    <div class="prevNext_item prevNext_item-next">
                        <!-- 次の記事のリンクを取得して表示 -->
                        <!-- 次の記事のタイトルを取得して(echoで)表示 -->
                        <a href="<?php the_permalink($next_post) ?>">
                            <span><?php echo get_the_title($next_post); ?></span>
                        <svg width="20" height="38" viewBox="0 0 20 38"><path d="M1832,1515l19,19L1832,1553" transform="translate(-1832 -1514)" fill="none" stroke="#224163" stroke-width="1" /></svg>
                    </a>
                    </div>
                    <?php endif; ?>
                    <!-- if文終了 -->

                    </div>
                </footer>
                </article>
            <?php endwhile; ?>
            <!-- 一番外側のwhile文終了 -->
        <?php endif ?>
        <!-- 一番外側のif文終了 -->
      </div>
    </div>
  </main>

<?php get_footer(); ?><!-- footer.php読み込み -->