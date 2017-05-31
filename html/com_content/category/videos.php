<?php
/**
 * @version                $Id: component.php $
 * @package                Joomla.Site
 * @subpackage        	   tpl_ta2ta
 * @copyright              Copyright (C) 2013 NCJFCJ. All rights reserved.
 */

defined( '_JEXEC' ) or die;

// Determines wether or not the user is logged in.
$logged_in = false;
	
// get the user groups for this user
$user_groups = JFactory::getUser()->getAuthorisedGroups();	

// check if the user is a member of 'guests'
if(!in_array(9, $user_groups)){
	$logged_in = true;
}
?>


	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<div class="page-header">
		<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
	</div>
	<?php endif; ?>
	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
	<h2> <?php echo $this->escape($this->params->get('page_subheading')); ?>
		<?php if ($this->params->get('show_category_title')) : ?>
		<span class="subheading-category"><?php echo $this->category->title;?></span>
		<?php endif; ?>
	</h2>
	<?php endif; ?>

	<?php if ($this->params->get('show_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
		<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
	<?php endif; ?>

	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	<div class="category-desc">
		<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
			<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
		<?php endif; ?>
		<?php if ($this->params->get('show_description') && $this->category->description) : ?>
			<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
		<?php endif; ?>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

<main class="videos-list">
	<?php
		// sort videos for display
		function cmp($a, $b){
			if($a->access == $b->access){
	    	return strcmp($b->created, $a->created);
			}else{
	    	return strcmp($b->access, $a->access);
			}
		}
		usort($this->items, "cmp");
	
		// loop through and display each video
		foreach($this->items as $video):
		$urls = json_decode($video->urls); 
		$videoID = substr($urls->urla, strrpos($urls->urla, '/') + 1);
		?>
		<div class="row">
			<div class="col-sm-8 col-lg-8">
				<h2 class="blue"><?php echo $video->title; ?></h2>
				<em><?php echo date('F j, Y', strtotime($video->created)); ?></em>
				<?php echo $video->introtext; ?>
			</div>
			<div class="col-sm-4 col-lg-4">
				<div class="youtube-player" data-id="<?php	echo $videoID; ?>"></div>
				<?php if(!empty($urls->urlb)): ?>
				<a class="btn btn-block btn-blue" href="<?php	echo $urls->urlb; ?>" target="_blank"><?php	echo (empty($urls->urlbtext) ? 'Download' : $urls->urlbtext); ?></a>
				<?php endif;
				if(!empty($urls->urlc)): ?>
				<a class="btn btn-block btn-blue" href="<?php	echo $urls->urlc; ?>" target="_blank"><?php	echo (empty($urls->urlctext) ? 'Download' : $urls->urlctext); ?></a>
				<?php endif; ?>
			</div>			
		</div>
		<?php if($video !== end($this->items)): ?>
		<hr>
		<?php endif;
	endforeach; ?>
</main>



<script>

    /* Light YouTube Embeds by @labnol */
    /* Web: http://labnol.org/?p=27941 */

    document.addEventListener("DOMContentLoaded",
        function() {
            var div, n,
                v = document.getElementsByClassName("youtube-player");
            for (n = 0; n < v.length; n++) {
                div = document.createElement("div");
                div.setAttribute("data-id", v[n].dataset.id);
                div.innerHTML = labnolThumb(v[n].dataset.id);
                div.onclick = labnolIframe;
                v[n].appendChild(div);
            }
        });

    function labnolThumb(id) {
        var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
            play = '<div class="play"></div>';
        return thumb.replace("ID", id) + play;
    }

    function labnolIframe() {
        var iframe = document.createElement("iframe");
        var embed = "https://www.youtube.com/embed/ID?autoplay=1";
        iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
        iframe.setAttribute("frameborder", "0");
        iframe.setAttribute("allowfullscreen", "1");
        this.parentNode.replaceChild(iframe, this);
    }

</script>