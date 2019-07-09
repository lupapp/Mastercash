<?php

	$values = get_post_custom( $post->ID );
	global $nz_ninzio;

	$nz_blog_layout    = ($nz_ninzio['blog-layout']) ? $nz_ninzio['blog-layout'] : "medium";
	$nz_featured_media = isset($values["featured_media"][0]) ? $values["featured_media"][0] : "true";
	$nz_audio_mp3      = isset($values["audio_mp3"][0]) ? $values["audio_mp3"][0] : "";
	$nz_audio_ogg      = isset($values["audio_ogg"][0]) ? $values["audio_ogg"][0] : "";
	$nz_audio_embed    = isset($values["audio_embed"][0]) ? $values["audio_embed"][0] : "";
	$nz_video_mp4      = isset($values["video_mp4"][0]) ? $values["video_mp4"][0] : "";
	$nz_video_ogv      = isset($values["video_ogv"][0]) ? $values["video_ogv"][0] : "";
	$nz_video_webm     = isset($values["video_webm"][0]) ? $values["video_webm"][0] : "";
	$nz_video_embed    = isset($values["video_embed"][0]) ? $values["video_embed"][0] : "";
	$nz_video_poster   = isset($values["video_poster"][0]) ? $values["video_poster"][0] : "";
	$nz_img_url        = isset($values["image_url"][0]) ? $values["image_url"][0] : "";
	$nz_img_desc       = isset($values["image_description"][0]) ? $values["image_description"][0] : "";
	$nz_status_author  = isset($values["status_author"][0]) ? $values["status_author"][0] : "";
	$nz_quote_author   = isset($values["quote_author"][0]) ? $values["quote_author"][0] : "";
	$nz_link_url       = isset($values["link_url"][0]) ? $values["link_url"][0] : "";


	if (has_post_format('video') || has_post_format('audio')) {$nz_featured_media = "false";}

	if (!is_single()){
		if (has_post_format('gallery')) {
			ninzio_post_gallery($nz_blog_layout, $post->ID);
		} else {
			if (($nz_blog_layout == "standard" && has_post_format('video')) || ($nz_blog_layout == "standard" && has_post_format('audio'))) {
				echo "";
			} else {
				ninzio_thumbnail($nz_blog_layout, $post->ID);
			}
		}
	} else {
		if ($nz_featured_media == "true") {
			if (has_post_format('gallery')) {
				ninzio_post_gallery($nz_blog_layout, $post->ID);
			} else {
				ninzio_thumbnail($nz_blog_layout, $post->ID);
			}
		}
	}	
?>
<?php if (has_post_format('image')): ?>
	<?php if (!empty($nz_img_url)): ?>

		<a class="nz-more media" href="<?php echo $nz_img_url; ?>">
	        <div class="nz-thumbnail">
	            <img src="<?php echo $nz_img_url; ?>" alt="<?php echo $nz_img_desc; ?>">
	            <div class="ninzio-overlay"></div>
	            <div class="post-date"><span><?php echo get_the_date("d");?></span><span><?php echo get_the_date("M");?></span></div>
	        </div>
	    </a>

	<?php endif ?>
<?php endif ?>
<div class="post-body">

	<?php if(is_single() || (!is_single() && $nz_blog_layout == "standard")) : ?>

		<?php if (has_post_format('audio')): ?>

			<?php if (!empty($nz_audio_mp3) || !empty($nz_audio_ogg) || !empty($nz_audio_embed)): ?>

				<div class="post-audio media">
					<?php 
						if(!empty($nz_audio_embed) && empty($nz_audio_ogg) && empty($nz_audio_mp3)) {
							echo "<div class='post-audio-embed'>".$nz_audio_embed."</div>";
						} elseif (!empty($nz_audio_ogg) || !empty($nz_audio_mp3)) {
							echo do_shortcode('[audio mp3="'.$nz_audio_mp3.'" ogg="'.$nz_audio_ogg.'"][/audio]'); 
						}
					?>
				</div>

			<?php endif ?>
		<?php endif ?>

		<?php if (has_post_format('video')): ?>
			<?php if (!empty($nz_video_mp4) || !empty($nz_video_ogv) || !empty($nz_video_webm) || !empty($nz_video_embed)): ?>
				<div class="post-video media">
					<?php
						if(!empty($nz_video_embed) && empty($nz_video_mp4) && empty($nz_video_ogv) && empty($nz_video_webm)) {
							echo "<div class='post-video-embed'><div class='flex-mod'>".$nz_video_embed."</div></div>";
						} elseif((!empty($nz_video_mp4) || !empty($nz_video_ogv) || !empty($nz_video_webm))) {
							echo do_shortcode('[video mp4="'.$nz_video_mp4.'" ogv="'.$nz_video_ogv.'" webm="'.$nz_video_webm.'" poster="'.$nz_video_poster.'"][/video]');
						}
					?>
				</div>
			<?php endif; ?>
		<?php endif ?>
			
		<?php if(!is_single() &&$nz_blog_layout == "standard"){get_template_part('/includes/blog/content-blog-meta');} ?>

		<?php if (has_post_format('link')): ?>
			<div class="post-content nz-clearfix"><a href="<?php echo $nz_link_url; ?>" rel="bookmark" title="<?php echo __("Go to", TEMPNAME).' '.$nz_link_url; ?>" target="_blank"><?php echo $nz_link_url; ?></a></div>
		<?php else: ?>
			<?php if ( '' != get_the_content() ): ?>
				<div class="post-content nz-clearfix">
					<?php
						if (!is_single() && $nz_blog_layout == "standard") {
							echo nz_excerpt(400);
						} else {
							the_content(); 
							$defaults = array(
								'before'           => '<div id="page-links">',
								'after'            => '</div>',
								'link_before'      => '',
								'link_after'       => '',
								'next_or_number'   => 'next',
								'separator'        => ' ',
								'nextpagelink'     => __( 'Continue reading', TEMPNAME ),
								'previouspagelink' => __( 'Go back' , TEMPNAME),
								'pagelink'         => '%',
								'echo'             => 1
							);
							wp_link_pages($defaults);
						}
					?>
				</div>
			<?php endif; ?>
		<?php endif ?>

		<?php if (has_post_format('status')): ?>
			<?php if (!empty($nz_status_author)) : ?>
				<div class="status-author">
					<?php echo "- ". $nz_status_author; ?>
				</div>
			<?php endif; ?>
		<?php endif ?>

		<?php if (has_post_format('quote')): ?>
			<?php if (!empty($nz_quote_author)) : ?>
				<div class="quote-author">
					<?php echo "- ". $nz_quote_author; ?>
				</div>
			<?php endif; ?>
		<?php endif ?>

		<?php if (!is_single() && $nz_blog_layout == "standard") { ?>
			<a href="<?php echo get_the_permalink(); ?>" class="button search-button read-more small"><?php echo __("Read more", TEMPNAME); ?></a>
		<?php } ?>

		<?php if (has_tag() && is_single()): ?>
			<div class="post-tags"><?php the_tags('', '', ''); ?></div>
		<?php endif ?>

	<?php else: ?>
		<?php if (has_post_format('link')): ?>
			<a href="<?php echo $nz_link_url; ?>" title="<?php echo __("Go to", TEMPNAME).' '.$nz_link_url; ?>" target="_blank">
		<?php else: ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo __("Read more about", TEMPNAME).' '.get_the_title(); ?>" rel="bookmark">
		<?php endif ?>

				<?php if ( '' != get_the_title() ): ?>
					<h5 class="post-title"><?php the_title(); ?></h5>
				<?php endif ?>
				<div class="post-excerpt">
					<?php echo nz_excerpt(100); ?>
				</div>

			</a>
	<?php endif; ?>

</div>

<?php if (is_single()): ?>
	<?php if ($nz_ninzio['blog-ss'] && $nz_ninzio['blog-ss'] == 1): ?>
		<div class="post-social-share social-links nz-clearfix left">
		    <a class="post-facebook-share icon-facebook5" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><span class="bubble"><?php echo __("Share on Facebook", TEMPNAME); ?></span><span class="text"><?php echo __("share", TEMPNAME); ?></span></a>
			<a class="post-twitter-share icon-twitter4" target="_blank" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>"><span class="bubble"><?php echo __("Tweet this!", TEMPNAME); ?></span><span class="text"><?php echo __("tweet", TEMPNAME); ?></span></a>
		    <a class="post-linkedin-share icon-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"><span class="bubble"><?php echo __("Share on LinkedIn", TEMPNAME); ?></span><span class="text"><?php echo __("share", TEMPNAME); ?></span></a>
		    <a class="post-google-share icon-googleplus6" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="bubble"><?php echo __("Share on Google+", TEMPNAME); ?></span><span class="text"><?php echo __("+1", TEMPNAME); ?></span></a>
		    <a class="post-pinterest-share icon-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>"><span class="bubble"><?php echo __("Share on Pinterest", TEMPNAME); ?></span><span class="text"><?php echo __("pin it", TEMPNAME); ?></span></a>
		</div>
	<?php endif; ?>
<?php endif ?>
