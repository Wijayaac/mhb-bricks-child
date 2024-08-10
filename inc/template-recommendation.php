<?php
function mhb_get_recommendations()
{
  // Query the Rekomendasi post type and filter using include
  $recommendations = pods()->field('recommendations', array('output' => 'ids'));
  $query = new WP_Query(array(
    'post_type' => 'rekomendasi',
    'post__in' => $recommendations,
    'orderby' => 'post__in',
    'posts_per_page' => 5,
  ));

  $content = '<div id="brxe-divwic" class="brxe-container">';
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $title = get_the_title();
      $permalink = get_permalink();
      $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');

      $content .= "
      <div class='recommendation-card'>
        <a href='$permalink'>
          <div class='recommendation-card__thumbnail'>
            <img src='$thumbnail' alt='$title' class='recommendation-card__thumbnail__img' />
          </div>
          <p class='h4'>$title</p>
        </a>
      </div>
      ";
    }
    wp_reset_postdata();
  } else {
    $content = "<p>No recommendations available.</p>";
  }
  $content .= '</div>';
  return $content;
}
