<section id="post-<?php the_ID(); ?>" <?php post_class( 'cardList_item' ); ?>>

    <!-- the_permalink()：記事のページへのリンクを取得し出力 -->
    <a href="<?php the_permalink(); ?>" class="card">

        <!-- リンクカード、タグ -->
        <?php
        // カテゴリー情報を取得する処理を変数へ 
        $categories = get_the_category();
        // もし投稿でカテゴリーを決められていたら……
        if($categories):            
        ?> 
        <div class="card_label">
            <!--foreach(配列 as 要素) 
            $categoriesという配列の中身を取得する
            配列の中の要素の分だけ以下の処理を
            繰り返す
            -->
            <?php foreach($categories as $category): ?>  
                
            <!-- カテゴリー情報の中の、カテゴリー名に当たる部分を表示 -->
            <span class="label label-black"><?php echo $category->name; ?></span>
                
            <!-- foreach文終わり -->
            <?php endforeach; ?>
        </div>

        <!-- if文終わり -->
        <?php endif; ?>
                
        <!-- リンクカードアイキャッチ画像 -->
        <!-- アイキャッチを有効にするには、functions.phpに設定を書く必要がある -->
        <div class="card_pic">

            <!-- もしアイキャッチ画像が設定されていたら…… -->
            <?php if (has_post_thumbnail()) : ?>
            <!-- the_post_thumbnail():アイキャッチに設定された画像を取得し出力
            画像の大きさを()内で指定できる(教科書p.69に指定できるサイズ一覧あり) 
            -->
            <?php the_post_thumbnail('medium'); ?>
            <?php else : ?><!-- そうじゃなければ…… -->
                <!-- NO Imageという画像を表示 -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="">
            <?php endif; ?>    
        </div>
                
        <!-- リンクカード情報欄 -->
        <div class="card_body">

            <!-- the_title()：記事のタイトルを取得し出力 -->
            <h2 class="card_title"><?php the_title(); ?></h2>
                    
            <!-- the_time():投稿時間を取得し出力
                出力の形式はY=西暦何年、m=月、d=日を使って()内で指定できる
            -->
            <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日') ?></time>
                
        </div>

    </a>

</section>