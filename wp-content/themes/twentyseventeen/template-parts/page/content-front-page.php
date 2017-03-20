<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
$apiKey = "AIzaSyDy297Ybz3L5m_Ik9jKN_ewNQwHV73_iko";
$playlistId = 'PLBFDuUOPixgCYZmg_vfJ5TSWf7L1Ou1Q4';
$linkVideos = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=".$playlistId."&key=".$apiKey."&maxResults=6";
$response = file_get_contents($linkVideos);
$res = json_decode($response);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >
	<?php
	//$t = wp_get_post_tags(the_ID());
	?>
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );

		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>
		<div class="wrap" style="border: 1px solid black; height: 300px; text-align: center;">
			<div class="today" style="padding-top: 10%;">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
</article><!-- #post-## -->
		</div>
	</div>	
<div class="row">
		<div class="title col-md-12">
			<h2>
				VIDEO
			</h2>
		</div>
	</div>	 
<div class="row">
	<?php
	$x=1;
for ($i=0; $i < count($res->items) ; $i++) {
     
if(isset($res->items[$i]->snippet->description))
{
    $description=$res->items[$i]->snippet->description;
    $description=substr($description, 0,125);
    //dpm($description);
}                                                
if(isset($res->items[$i])&&isset($res->items[$i]->snippet)&&isset($res->items[$i]->snippet->thumbnails)&&isset($res->items[$i]->snippet->thumbnails->maxres)&&isset($res->items[$i]->snippet->thumbnails->maxres->url)){
$thumbnails = $res->items[$i]->snippet->thumbnails->maxres->url;
}
else if(isset($res->items[$i])&&isset($res->items[$i]->snippet)&&isset($res->items[$i]->snippet->thumbnails)&&isset($res->items[$i]->snippet->thumbnails->standard)&&isset($res->items[$i]->snippet->thumbnails->standard->url)){
$thumbnails = $res->items[$i]->snippet->thumbnails->standard->url;
}

else if(isset($res->items[$i])&&isset($res->items[$i]->snippet)&&isset($res->items[$i]->snippet->thumbnails)&&isset($res->items[$i]->snippet->thumbnails->high->url)){
$thumbnails = $res->items[$i]->snippet->thumbnails->high->url;
}
                                                    
else{
$thumbnails = "";
}   
                                                    
if(isset($res->items[$i])&&isset($res->items[$i]->snippet)&&isset($res->items[$i]->snippet->title)){
$titleThumb = $res->items[$i]->snippet->title;
}
else{
$titleThumb = "";
}
if(isset($res->items[$i])&&isset($res->items[$i]->snippet)&&isset($res->items[$i]->snippet->resourceId)&&isset($res->items[$i]->snippet->resourceId->videoId)){
$idVideo = $res->items[$i]->snippet->resourceId->videoId;   
}
if(isset($res->items[$i]->snippet->publishedAt)){
$data = $res->items[$i]->snippet->publishedAt;
}
else{
$data = "";
}
?>
					<div class="col-md-4 col-sm-4 video-homepage"> 
                        <div class="half">
                            <article class="article">
                                <a href="<?php echo "./video-details?videoid=$idVideo"?>">
                                <figure class="gallery-media">
                                    <img src="<?php echo $thumbnails; ?>" alt="">
                                </figure>
                                </a>
                                <footer>
                                    <span class="date"><?php echo date('d/m/Y',strtotime($data));?></span>
                                    <h2><?php echo $titleThumb;?></h2>
                                    <?php if($description!=""){?>
                                    <p><?php echo($description); ?>..</p>
                                    <?php } ?>
                                </footer>
                            </article>
                        </div>
                     </div>
<?php 
$x++; 
if($x>3){
	$x=1;
	echo('</div><div class="row">');
}
}
?>     
</div>
