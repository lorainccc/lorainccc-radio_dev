<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" role="presentation">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); 

        if ( is_active_sidebar( 'lccc-radio-content-area-sidebar' ) ) {
            dynamic_sidebar( 'lccc-radio-content-area-sidebar' ); 
            }         
        ?>

<div id="listenlive">
<!--<object id="fmp256" type="application/x-shockwave-flash" data="<?php echo get_stylesheet_directory_uri(); ?>/data/minicaster.swf" width="180" height="70">
<param name="movie" value="<?php echo get_stylesheet_directory(); ?>/data/minicaster.swf" />
<param name="wmode" value="transparent" />
<div class="stirfry">
<h4>Minicaster Radio Playhead</h4>
<p class="copyright">To listen you must <a href="http://www.macromedia.com/go/getflashplayer/" title="Click here to install the Flash browser plugin from Macromedia">install Flash Player</a>.<br />Visit <a href="http://www.draftlight.net/dnex/mp3player/minicaster/" title="Draftlight Networks">Draftlight Networks</a> for more info.</p>
</div>
</object>-->
<div class="audio-player">
<audio id="music" preload="true">
<source src="http://68.168.103.13:8218/;stream.mp3">
</audio>
<div id="audioplayer">
<button id="pButton" class="radio_play" onclick="play()"></button>
<!-- <div id="timeline">    
<div id="playhead"></div>
</div>-->
</div>
<div id="nowplaying">
</div>
<?php //echo do_shortcode( '[audio src="http://68.168.103.13:8218/;stream.mp3" autoplay="true" ]' ); ?>

</div><!-- @end .audio-player -->
<script>
var music = document.getElementById('music'); // id for audio element
var duration; // Duration of audio clip
var pButton = document.getElementById('pButton'); // play button

var playhead = document.getElementById('playhead'); // playhead

var timeline = document.getElementById('timeline'); // timeline
// timeline width adjusted for playhead
var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

// timeupdate event listener
music.addEventListener("timeupdate", timeUpdate, false);

//Makes timeline clickable
timeline.addEventListener("click", function (event) {
moveplayhead(event);
music.currentTime = duration * clickPercent(event);
}, false);

// returns click as decimal (.77) of the total timelineWidth
function clickPercent(e) {
return (e.pageX - timeline.offsetLeft) / timelineWidth;
}

// Makes playhead draggable 
playhead.addEventListener('mousedown', mouseDown, false);
window.addEventListener('mouseup', mouseUp, false);

// Boolean value so that mouse is moved on mouseUp only when the playhead is released 
var onplayhead = false;
// mouseDown EventListener
function mouseDown() {
onplayhead = true;
window.addEventListener('mousemove', moveplayhead, true);
music.removeEventListener('timeupdate', timeUpdate, false);
}(jQuery);
// mouseUp EventListener
// getting input from all mouse clicks
function mouseUp(e) {
if (onplayhead == true) {
moveplayhead(e);
window.removeEventListener('mousemove', moveplayhead, true);
// change current time
music.currentTime = duration * clickPercent(e);
music.addEventListener('timeupdate', timeUpdate, false);
}
onplayhead = false;
}(jQuery);
// mousemove EventListener
// Moves playhead as user drags
function moveplayhead(e) {
var newMargLeft = e.pageX - timeline.offsetLeft;
if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
playhead.style.marginLeft = newMargLeft + "px";
}
if (newMargLeft < 0) {
playhead.style.marginLeft = "0px";
}
if (newMargLeft > timelineWidth) {
playhead.style.marginLeft = timelineWidth + "px";
}
}

// timeUpdate 
// Synchronizes playhead position with current point in audio 
function timeUpdate() {
var playPercent = timelineWidth * (music.currentTime / duration);
playhead.style.marginLeft = playPercent + "px";
if (music.currentTime == duration) {
pButton.className = "";
pButton.className = "radio_play";
}
}

//Play and Pause
function play() {
// start music
if (music.paused) {
music.play();
// remove play, add pause
pButton.className = "";
pButton.className = "radio_pause";
}else {// pause music
music.pause();
// remove pause, add play
pButton.className = "";
pButton.className = "radio_play";
}
}

// Gets audio file duration
music.addEventListener("canplaythrough", function () {
duration = music.duration;  
}, false);

</script>

</div><!-- closes the listenlive tag-->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

  // Display the Shared Content Feed
  
   $sharedcontentsiteurl = get_post_meta( $post->ID, 'lc_shared_content_site_url_field', true );
   $sharedcontentpostslug = get_post_meta( $post->ID, 'lc_shared_content_post_slug_field', true );
    
     if ($sharedcontentsiteurl != ''){
        
    $contenturl = trailingslashit( 'http://' . $_SERVER['SERVER_NAME'] . '/' . $sharedcontentsiteurl ) . 'wp-json/wp/v2/posts?slug=' . $sharedcontentpostslug;
    
    $sharedcontenturl = new lcEndPoints( $contenturl );
    
    $sharedcontent = new lcContent( 1 );
    $sharedcontent->lc_add_endpoint ( $sharedcontenturl );
    $sharedposts = $sharedcontent->lc_get_posts();
        if(empty($sharedposts)){
		   echo 'No Posts Found!';
	   }
    
    foreach ( $sharedposts as $post ){
     echo $post->content->rendered;
    }
   }
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lorainccc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'lorainccc' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
	<?php endif; ?>
</article><!-- #post-## -->
