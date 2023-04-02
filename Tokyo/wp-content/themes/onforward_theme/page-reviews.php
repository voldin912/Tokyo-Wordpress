<?php
$post_type = get_post_type('ranking');

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_per_page = get_query_var('posts_per_page') ? get_query_var('posts_per_page') : 10;
$rank_type = get_query_var('rank_type') ? get_query_var('rank_type') : 'teacher';
$name = get_query_var('name') ? get_query_var('name') : '';
print_r($_SERVER);
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
 

<?php get_footer(); ?>



