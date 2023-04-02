<?php
$post_type = get_post_type('ranking');

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_per_page = get_query_var('posts_per_page') ? get_query_var('posts_per_page') : 10;
$rank_type = get_query_var('rank_type') ? get_query_var('rank_type') : 'total';

$current_url = getCurrentUrl(); 

$args = array(
  'post_type' => 'ranking',
  'paged' => $paged,
  'posts_per_page' => $posts_per_page,
    'category' => array(7,6),
    'meta_key'=> $rank_type,
    'orderby' => 'meta_value',
    'order' => "DESC",
); 


get_header();
?>
<?php 
$custom_query = new WP_Query( $args ); 
?>
  <!-- main -->
  <main id="main">
    <div class="kv">
      <div class="kv-area">東京都</div>
        <h1><img src="<?php echo get_template_directory_uri()?>/assets/img/kv_title02_kg.png" alt="東京都のこども園・認可保育園・認可外保育園(総合)ランキング"></h1>
        <div class="kv-category">2023</div>
    </div>
    <!-- kgMod-refine -->
    <div class="kgMod-refine">
      <div class="kgMod-refine-box">
        <dl>
          <dt><span>エリア</span></dt>
            <dd class="kgMod-refine-box__center">東京都</dd>
        </dl>
      </div>
      <div class="kgMod-refine-box">
        <dl>
          <dt>
            <span>園の種類</span>で絞り込む
          </dt>
          <dd>こども園,認可保育園,認可外保育園</dd>
        </dl>
      </div>
    </div>
    <div class="tab">
      <ul>
        <li>
          <?php if($rank_type == 'total') :?>
          <span>総合</span>
          <?php else : ?>
          <a href="/">総合</a>
          <?php endif;?>
        </li>
        <li>
          <?php if($rank_type == 'teacher') :?>
          <span>先生</span>
          <?php else : ?>
          <a href="/teacher-ranking">先生</a>
          <?php endif;?>
        </li>
        <li>
          <?php if($rank_type == 'education') :?>
          <span>教育内容</span>
          <?php else : ?>
          <a href="/education-ranking">教育内容</a>
          <?php endif;?>
        </li>
        <li>
          <?php if($rank_type == 'access') :?>
          <span>アクセス・立地</span>
          <?php else : ?>
          <a href="/access-ranking">アクセス・立地</a>
          <?php endif;?>
        </li>
      </ul>
    </div>

    <!-- ranking-search-sortpager -->
    <div class="ranking-search-sortpager" id="ranking-search-detail">
      <div class="mod-pager">
    <div class="mod-pagerNum mod-pagerNum__st">
      <span>3581</span>件中 <span>1-<?php echo $posts_per_page?></span>件を表示</div>
    </div>
    <!-- ranking-search-sortpager -->

    <!-- mod-adsenseSearch -->
    <!-- mod-adsenseSearch -->
  
      <div class="mod-adsenseSearch mod-adsenseSearch__top">
        <div id="afscontainer1"></div>
      </div>
      <div class="mod-adsenseSearch mod-adsenseSearch__top">
        <div id="afscontainer2"></div>
      </div>
    <!-- /mod-adsenseSearch -->
    <!-- /mod-adsenseSearch -->
  <!-- schoolBox -->
  <?php if($custom_query->have_posts()) : 
    $rank_num = ($paged-1) * $posts_per_page;
    $classNo1 = "schoolBox-rank__no1";
    ?>
    <?php while ( $custom_query->have_posts()) : 
        $custom_query->the_post();
        $title = get_the_title(get_the_ID());
        $review_cnt=0;
        $args1 = array (
        'post_type' => 'reviews',
        'posts_per_page' => -1,
        'meta_query' => [
          [
            'key'     => 'target',
            'value'   => $title,
            'compare' => '='
          ]
        ]
        );
        
        $reviews = get_posts($args1);
        $review_cnt = count($reviews);
    ?>
    <div class="schoolBox">
      <a href="<?php the_permalink();?>">
        <div class="schoolBox-info">
          <div class="schoolBox-name">
            <h2><span class="schoolBox-rank <?php if($rank_num === 0) echo $classNo1; ?>  "><em><?php echo $rank_num+1; ?></em>位</span>
              <p><?php the_title() ?></p>
            </h2>
            <div class="schoolBox-icon">
              <?php $categories = get_the_terms(get_the_ID(),'category'); ?>
              <ul>
                <?php foreach ($categories as $category) : ?>
                  <li><?php echo $category->name; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <span class="schoolBox-area"><?php echo get_post_meta( get_the_ID(), 'nearstation', true ); ?></span>
          </div>
          <div class="schoolBox-review">
            <div class="schoolBox-review-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/star_005.gif" alt="★★★★★"></div>
              <div class="schoolBox-review-pointTotal"><span><?php echo get_post_meta( get_the_ID(), 'total', true ); ?></span></div>
              <div class="schoolBox-review-countReview">
              <i><?php echo $review_cnt ?>件</i>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php
    $rank_num++; 
    endWhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php endif ?>
  <!-- /schoolBox -->
  
  <!-- mod-adsenseSearch -->
  
    <div class="mod-adsenseSearch mod-adsenseSearch__bottom">
      <div id="afscontainer3"></div>
    </div>
    <div class="mod-adsenseSearch mod-adsenseSearch__bottom">
      <div id="afscontainer4"></div>
    </div>
    <div class="mod-adsenseSearch mod-adsenseSearch__bottom">
      <div id="afscontainer5"></div>
    </div>
    <!-- /mod-adsenseSearch -->
    <!-- /mod-adsenseSearch -->
    <div class="mod-ad mod-ad__change"></div>
    <div class="mod-pager">
      <div class="mod-pagerNum mod-pagerNum__st">全<span>3581</span>件 <span>1-<?php echo $posts_per_page?></span>件を表示</div>
      <ul class="mod-pagerList">
        <li class="disabled">前へ</li>      
        <li class="current">1</li>
        <li><a href="/kinder/ranking/review/tokyo%2Ft%3D5%2C2%2C3/page=2">2</a></li>
        <li><a href="/kinder/ranking/review/tokyo%2Ft%3D5%2C2%2C3/page=3">3</a></li>
        <li><a href="/kinder/ranking/review/tokyo%2Ft%3D5%2C2%2C3/page=4">4</a></li>
        <li><a href="/kinder/ranking/review/tokyo%2Ft%3D5%2C2%2C3/page=5">5</a></li>
        <li><a href="/kinder/ranking/review/tokyo%2Ft%3D5%2C2%2C3/page=6">6</a></li>
        <li class="next"><a href="/kinder/ranking/review/tokyo%2Ft%3D5%2C2%2C3/page=2">次へ</a></li>      
      </ul>
    </div>
  </main>
  <!-- /#main -->

  <div class="mod-ad mod-ad__footer">
  </div>
  <!-- #sub -->
  <div id="sub">
    <div class="subRanking">
      <h3>ランキング</h3>
      <div class="subRanking-inner">
      <ul>
          <li class="<?php if($rank_type == 'total') echo "subRanking-inner__active"?>"><a href="/">総合ランキング</a></li>
          <li class="<?php if($rank_type == 'teacher') echo "subRanking-inner__active"?>"><a href="/teacher-ranking">先生ランキング</a></li>
          <li class="<?php if($rank_type == 'content') echo "subRanking-inner__active"?>"><a href="/education-ranking">教育内容ランキング</a></li>
          <li class="<?php if($rank_type == 'access') echo "subRanking-inner__active"?>"><a href="/access-ranking">アクセス・立地ランキング</a></li>
        </ul>
      </div>
    </div>  
    <div class="mod-ad mod-ad__sideTop">
      <div id="div-gpt-ad-pc_ki_sidebar-top-0"></div>
    </div><!-- sub-sitelink -->
    <div class="sub-sitelink">
      <h3>オススメサイト</h3>
      <div class="sub-sitelink-inner">
        <dl class="sub-sitelink-cont">
          <dt><a href="/vcollege/ranking/popularity/pref=tokyo/" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri()  ?>/assets/img/side_img_013.gif" alt="みんなの専門学校情報"></a></dt>
          <dd><a href="/vcollege/ranking/popularity/pref=tokyo/" target="_blank" rel="nofollow">全国専門学校選びNo.1口コミサイト<br>東京都の専門学校情報</a>みんなの専門学校情報は、日本最大級の専門学校の口コミサイトです。</dd>
        </dl>
        <dl class="sub-sitelink-cont">
          <dt><a href="/university/ranking/deviation/pref=tokyo/ct=1/" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri()  ?>/assets/img/side_img_014.gif" alt="みんなの大学情報"></a></dt>
          <dd><a href="/university/ranking/deviation/pref=tokyo/ct=1/" target="_blank" rel="nofollow">全国大学選びNo.1口コミサイト<br>東京都の大学情報</a>みんなの大学情報は、偏差値や口コミなどの情報が満載の大学検索サイトです。</dd>
        </dl>
        <dl class="sub-sitelink-cont">
          <dt><a href="https://www.jyukunavi.jp/rank/13.html?pid=10592&add=&type=1" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri()  ?>/assets/img/side_img_006.gif" alt="東京都の塾・予備校情報"></a></dt>
          <dd><a href="https://www.jyukunavi.jp/rank/13.html?pid=10592&add=&type=1" target="_blank" rel="nofollow">東京都の塾・予備校情報</a>塾ナビは、学習塾や予備校を探している生徒や保護者のための学習塾検索サイトです。</dd>
        </dl>
        <dl class="sub-sitelink-cont">
          <dt><a href="https://www.katekyohikaku.net/search/tokyo/" target="_blank"><img src="<?php echo get_template_directory_uri()  ?>/assets/img/side_img_007.gif" alt="東京都のオススメの家庭教師検索サイト"></a></dt>
          <dd><a href="https://www.katekyohikaku.net/search/tokyo/" target="_blank">東京都のオススメの家庭教師検索サイト</a>家庭教師比較ネットは、日本最大級の家庭教師検索サイトです。</dd>
        </dl>
        <dl class="sub-sitelink-cont">
          <dt><a href="https://kodomo-booster.com/rank/tokyo" target="_blank"><img src="<?php echo get_template_directory_uri()  ?>/assets/img/side_img_015.gif" alt="東京都でおすすめの習い事情報"></a></dt>
          <dd><a href="https://kodomo-booster.com/rank/tokyo" target="_blank">東京都でおすすめの習い事情報</a>コドモブースターは、国内最大級の子どもの習い事検索サイトです。</dd>
        </dl>
      </div>
    </div>
    <!-- /sub-sitelink -->
    <div class="mod-ad js-mod-ad__sideBottom mod-ad__sideBottom">
      <div id="div-gpt-ad-pc_ki_sidebar-bottom-1"></div>
    </div>
  </div>
</div>


<?php get_footer(); ?>



