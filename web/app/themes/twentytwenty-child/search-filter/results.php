<?php
/**
 * Results Template for Water for Grassroots to work with the Search & Filter Pro plug-in
 * Adapted from the Search & Filter sample Results template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
    <p class="num-results"><?php echo $query->found_posts; ?> organizations</p>
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		<div>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<?php
		if( function_exists( 'waterforgrassroots_render_regions' ) )
		{
		?>
			<ul>
				<?php 
				/* regions render as list items, so wrap them in <ul> tag above */
				waterforgrassroots_render_regions( get_the_id() ); 
		}
		?>
			</ul>		
			<p class="results-excerpt"><?php the_excerpt(); ?></p>
		</div>
		
		<hr />
		<?php
	}
	?>
	<p class="page-of-page">Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?></p>
	
	<div class="pagination">
		
		<span class="nav-previous"><?php previous_posts_link( '&lt;' ); ?></span>
		<span class="nav-next"><?php next_posts_link( '&gt;', $query->max_num_pages ); ?></span>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo '<p class="no-results">No Results Found</p>';
}
?>
