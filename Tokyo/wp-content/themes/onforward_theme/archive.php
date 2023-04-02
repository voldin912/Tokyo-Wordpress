<?php 
get_header();

$post_type = get_post_type();


$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$category_id = get_query_var('category_id') ? get_query_var('category_id') : "";

$cat_id = get_query_var('cat') ? get_query_var('cat') : "";

$current_url = getCurrentUrl();

$args = array(
	'post_type' => $post_type,
	'paged' => $paged,
	'posts_per_page' => 10,
    'orderby' => 'post_date',
    'order' => "DESC",
); 

if( !empty($cat_id) ) {
  $args['tax_query'] = [[
    'taxonomy' => 'category',
    'field' => 'term_id',
    'terms' => $cat_id
  ]];
}

?>

<?php $custom_query = new WP_Query( $args ); ?>

<div class="c-heading-visual c-content">
	<!-- c-content-medium -->
	<div class="c-content-medium">
		<!-- c-content__inner -->
		<div class="c-content__inner">
			<!-- c-heading-visual__body -->
			<div class="c-heading-visual__body">
				<div class="c-heading-visual__body__inner">
					<p class="c-heading-visual__title-en">information</p>
					<h1 class="c-heading-visual__title-jp">情報</h1>
				</div>
			</div>
			<!-- /c-heading-visual__body -->
			<!-- c-heading-visual__bg -->
			<div class="c-heading-visual__bg">
				<!-- c-heading-visual__bg__inner -->
				<div class="c-heading-visual__bg__inner">
					<picture>
						<source srcset="<?php echo get_template_directory_uri()?>/assets/image/main/build_02.jpg">
						<img src="<?php echo get_template_directory_uri()?>/assets/image/main/build_02.jpg" alt="株式会社オン・フォワード_情報" class="js-objectfit -size-fit js-objectfit-init js-objectfit-substituted">
					</picture>				
				</div>
				<!-- /c-heading-visual__bg__inner -->
			</div>
			<!-- /c-heading-visual__bg -->
		</div>
		<!-- /c-content__inner -->
	</div>
	<!-- /c-content-medium -->
	<!-- c-breadcrumb -->
	<nav class="c-breadcrumb">
		<ul>
			<li><a href="<?php echo home_url();?>" class="c-link-line">トップ</a></li>
			<li>ニュース</li>
		</ul>
	</nav>
	<!-- /c-breadcrumb -->
</div>

<main class="l-main">
			<!-- section -->
	<section class="u-mt-section">
		<!-- c-content-medium -->
		<div class="c-content-medium">
			<!-- c-content__inner -->
			<div class="c-content__inner">
				<!-- c-flex -->
				<div class="c-flex -type04">
					<!-- c-flex__block -->
					<div class="c-flex__block">
						<!-- l-aside -->
						<aside class="l-aside js-toggle-small">
							<!-- l-aside__header -->
							<header class="l-aside__header js-toggle__switch">
								<p class="l-aside__heading-en">category</p>
								<h2 class="l-aside__heading-jp">カテゴリー</h2>
								<span class="visible-small-less"></span>
							</header>
							<!-- /l-aside__header -->
							<nav class="js-toggle__body">
								<ul class="l-aside__list">
                                    <?php
                                        $current_slug = 'news';
                                        if( $cat_id ) {
                                            $current_cat = get_category($cat_id);
                                            $current_slug = $current_cat->slug;
                                        }
                                    ?>
									<li class="l-aside__list-item<?php echo ( $current_slug === 'news' ) ? ' is-current' : ''; ?>"><a href="<?php echo esc_url( home_url( 'category/news' ) ); ?>" class="c-icon -arrow3">ニュース</a></li>
									<li class="l-aside__list-item<?php echo ( $current_slug === 'blog' ) ? ' is-current' : ''; ?>"><a href="<?php echo esc_url( home_url( 'category/blog' ) ); ?>" class="c-icon -arrow3">スタッフブログ</a></li>
                                </ul>
							</nav>
						</aside>
						<!-- /l-aside -->
					</div>
					<!-- /c-flex__block -->
					<!-- c-flex__block -->
					<div class="c-flex__block">
						<!-- c-list-news -->
                        <?php if( $custom_query->have_posts() ) : ?>
						<ul class="c-list-news">
                            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
							<!-- c-list-news-item -->
							<li class="c-list-news-item">
								<!-- c-list-news-item__inner -->
								<div class="c-list-news-item__inner c-icon -arrow4">
									<a href="<?php the_permalink(); ?>" class="u-block"></a>
									<!-- c-list-news-item__content -->
									<div class="c-list-news-item__content">
										<!-- c-list-news__meta -->
										<div class="c-list-news__meta">
											<time class="c-list-news__time"><?php $day = new DateTime( get_the_time('Y-m-d') ); echo $day->format('Y.m.d'); ?></time>
											<?php $categories = get_the_terms(get_the_ID(), 'category');
                                                foreach ($categories as $category) :
                                            ?>
                                            <p class="c-list-news__category"><a><?php echo $category->name; ?></a></p>
                                            <?php endforeach; ?>
                                        </div>
										<!-- /c-list-news__meta -->
										<p class="c-list-news__title"><?php the_title(); ?></p>
									</div>
									<!-- /c-list-news-item__content -->
								</div>
								<!-- /c-list-news-item__inner -->
							</li>
							<!-- /c-list-news-item -->
							<?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
						</ul>
                        <?php wp_pagenavi( array( 'query' => $custom_query ) );  ?>
						<!-- /c-list-news -->
                        <?php endif ?>
					</div>
					<!-- /c-flex__block -->
				</div>
				<!-- /c-flex -->
			</div>
			<!-- /c-content__inner -->
		</div>
		<!-- /c-content-medium -->
	</section>
	<!--/ section -->
	<!-- c-content-medium2 -->
    <div class="c-content-medium2">
        <!-- c-content__inner -->
        <div class="c-content__inner -inner-clear">
            <div class="l-pagination -line u-mt-pagination -next-on -prev-on">
            
            </div>
            <!-- /l-pagination -->
        </div>
        <!-- /c-content__inner -->
    </div>
<!-- /c-content-medium2 -->
</main>

<?php get_footer(); ?>