<?php
/**
 * @version                $Id: component.php $
 * @package                Joomla.Site
 * @subpackage        	   tpl_linking_systems_of_care
 * @copyright              Copyright (C) 2017 NCJFCJ. All rights reserved.
 */

defined( '_JEXEC' ) or die;

?>


<?php if ($this->params->get('show_page_heading', 1)) : ?>



<div class="page-header">
    <h1>
        <?php echo $this->escape($this->params->get('page_heading')); ?>
    </h1>
</div>
<?php endif; ?>

<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
<h2>
    <?php echo $this->escape($this->params->get('page_subheading')); ?>
    <?php if ($this->params->get('show_category_title')) : ?>
    <span class="subheading-category">
        <?php echo $this->category->title;?>
    </span>
    <?php endif; ?>
</h2>
<?php endif; ?>

<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
<div class="category-desc">
    <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
    <img src="<?php echo $this->category->getParams()->get('image'); ?>" />
    <?php endif; ?>
    <?php if ($this->params->get('show_description') && $this->category->description) : ?>
    <?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
    <?php endif; ?>
    <div class="clr"></div>
</div>
<?php endif;

    // content columns
    $current_article_key = 0;
    $num_columns = $this->params->get('num_columns');
    $span_value = 12 / $num_columns;

?>

<main>
<!--Columns on the top -->
<?php if($this->params->get('columns_location') == 'top') : ?>
<div class="columns<?php echo $this->pageclass_sfx;?> row">

    <?php

          if($this->params->get('columns_title')) {
              $heading = filter_var($this->params->get('columns_title'), FILTER_SANITIZE_STRING);
              $heading_tag = $this->params->get('columns_title_tag');
              echo '<h'.  $heading_tag . '>' . $heading . '</h' . $heading_tag . '>';
          }


          for($i = 1; $i <= $num_columns; $i++): ?>
            <section class="col-sm-<?php echo $span_value . ' ' . $this->params->get('column_class'); ?>">
                <?php
                      if(array_key_exists($current_article_key, $this->items)):
                          $articleData = (isset($this->items[$current_article_key]) ? $this->items[$current_article_key] : false);
                          $imgData = (isset($articleData->images) ? json_decode($articleData->images) : false);
                          $linkData = (isset($articleData->urls) ? json_decode($articleData->urls) : false);
                          $article_params = new JRegistry($articleData->attribs);
                          if($imgData && isset($imgData->image_intro)): ?>

                <?php endif;
                          if($article_params->get('show_title') ): ?>
                <h3>
                    <?php echo $articleData->title; ?>
                </h3>
                <?php endif;
                // article text
                echo $articleData->text;
                if($linkData && !empty($linkData->urla)): ?>
                <div class="more-wrapper">
                    <a href="<?php echo $linkData->urla; ?>" class="more">
                        <?php echo (empty($linkData->urlatext) ? 'Learn More' : $linkData->urlatext); ?>
                    </a>
                </div>
                <?php endif;
                      endif; ?>
            </section>
        <?php
            $current_article_key++;
            endfor;?>
</div>

<?php if($this->params->get('show_horizontal_dividers')): ?>
    <hr class="clr divider" />
<?php endif; ?>

<div class="row <?php echo $this->params->get('row_class'); ?>">
    <?php
    // content half columns
    for($i = $num_columns + 1; $i <= count($this->items); $i++):
        if(array_key_exists($current_article_key, $this->items)): ?>
            <?php
            $articleData = (isset($this->items[$current_article_key]) ? $this->items[$current_article_key] : false);
            $linkData = (isset($articleData->urls) ? json_decode($articleData->urls) : false);
            $article_params = new JRegistry($articleData->attribs);
            $article_urls = new JRegistry($articleData->urls);
            ?>

            <div class="clearfix">
                <?php if($article_params->get('show_title')):?>
                    <h3>
                        <?php echo $articleData->title; ?>
                    </h3>
                <?php endif; ?>
                <?php echo $articleData->text;
                        if($linkData && !empty($linkData->urla)): ?>
                <div class="more-wrapper">
                    <a href="<?php echo $linkData->urla; ?>" class="more">
                        <?php echo (empty($linkData->urlatext) ? 'Learn More' : $linkData->urlatext); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <?php
            $current_article_key++;
        endif;
    endfor; ?>
</div>

<?php else: ?>
<!--Columns on the bottom-->

<div class="row <?php echo $this->params->get('row_class'); ?>">
    
    <?php
    // content half columns
    $current_article_key = $num_columns;

    for($i = $num_columns + 1; $i <= count($this->items); $i++):
        if(array_key_exists($current_article_key, $this->items)): ?>
            <?php
            $articleData = (isset($this->items[$current_article_key]) ? $this->items[$current_article_key] : false);
            $linkData = (isset($articleData->urls) ? json_decode($articleData->urls) : false);
            $article_params = new JRegistry($articleData->attribs);
            $article_urls = new JRegistry($articleData->urls);
            ?>

            <div class="clearfix">
                <?php if($article_params->get('show_title')):?>
                    <h3>
                    <?php echo $articleData->title; ?>
                    </h3>
                <?php endif; ?>
                <?php echo $articleData->text;
                if($linkData && !empty($linkData->urla)): ?>
                    <div class="more-wrapper">
                        <a href="<?php echo $linkData->urla; ?>" class="more">
                            <?php echo (empty($linkData->urlatext) ? 'Learn More' : $linkData->urlatext); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php
            $current_article_key++;
        endif;
    endfor; ?>
</div>

<?php if($this->params->get('show_horizontal_dividers')): ?>
    <hr class="clr divider" />
<?php endif; ?>


<div class="columns<?php echo $this->pageclass_sfx;?> row">

    <?php

          if($this->params->get('columns_title')) {
              $heading = filter_var($this->params->get('columns_title'), FILTER_SANITIZE_STRING);
              $heading_tag = $this->params->get('columns_title_tag');
              $heading_class = filter_var($this->params->get('columns_title_class'), FILTER_SANITIZE_STRING);
              echo '<h'.  $heading_tag . ' class="' . $heading_class . '">' . $heading . '</h' . $heading_tag . '>';
          }

    $current_article_key = 0;
    for($i = 1; $i <= $num_columns; $i++): ?>
        <section class="col-sm-<?php echo $span_value . ' ' . $this->params->get('column_class'); ?>">
            <?php
            if(array_key_exists($current_article_key, $this->items)):
                $articleData = (isset($this->items[$current_article_key]) ? $this->items[$current_article_key] : false);
                $imgData = (isset($articleData->images) ? json_decode($articleData->images) : false);
                $linkData = (isset($articleData->urls) ? json_decode($articleData->urls) : false);
                $article_params = new JRegistry($articleData->attribs);
                if($imgData && isset($imgData->image_intro)): ?>

                <?php endif;
                if($article_params->get('show_title') ): ?>
                    <h3>
                    <?php echo $articleData->title; ?>
                    </h3>
                <?php endif;

                // article text
                echo $articleData->text;
                if($linkData && !empty($linkData->urla)): ?>
                    <div class="more-wrapper">
                        <a href="<?php echo $linkData->urla; ?>" class="more">
                            <?php echo (empty($linkData->urlatext) ? 'Learn More' : $linkData->urlatext); ?>
                        </a>
                    </div>
                <?php endif;
            endif; ?>
        </section>
        <?php
        $current_article_key++;
    endfor;?>
</div>

<?php endif; ?>


</main>
