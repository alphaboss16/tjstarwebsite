<?php //netteCache[01]000493a:2:{s:4:"time";s:21:"0.18572700 1416529740";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:103:"/afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/category.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/category.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'h8d3kreicn')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb741a734f2d_content')) { function _lb741a734f2d_content($_l, $_args) { extract($_args)
?>

<section class="section content-section blog-section category-section">

	<div id="container" class="subpage blog category wrapper <?php if(is_active_sidebar("blog-sidebar")): else: ?>
onecolumn<?php endif ?>">

<?php if ($posts): ?>

		<div id="content" class="entry-content clearfix" role="main">
			<div class="content-wrapper">

				<header class="entry-title subpage-header">
					<h1 class="page-title">
						<?php echo NTemplateHelpers::escapeHtml(__('Category Archives: ', 'ait'), ENT_NOQUOTES) ?>
<span><?php echo NTemplateHelpers::escapeHtml($category->title, ENT_NOQUOTES) ?></span>
					</h1>
					<span class="breadcrumbs"><?php echo NTemplateHelpers::escapeHtml(__('You are here:', 'ait'), ENT_NOQUOTES) ?>
 <?php echo WpLatteFunctions::breadcrumbs(array()) ?></span>
				</header>

<?php if (strlen($category->description) !== 0): ?>
					<div class="category-archive-meta"><?php echo $category->description ?></div>
<?php endif ?>

<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-above') + $template->getParams(), $_l->templates['h8d3kreicn'])->render() ?>

<?php NCoreMacros::includeTemplate("snippets/content-loop.php", array('posts' => $posts) + $template->getParams(), $_l->templates['h8d3kreicn'])->render() ?>

<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-below') + $template->getParams(), $_l->templates['h8d3kreicn'])->render() ?>

			</div> <!-- /.content-wrapper -->
		</div> <!-- /#content -->

<?php if(is_active_sidebar("blog-sidebar")): ?>
		<div class="page-sidebar blog-sidebar right clearfix">
<?php dynamic_sidebar('blog-sidebar') ?>
		</div>
<?php endif ?>


<?php else: ?>

		<div id="content" class="entry-content" role="main">
			<div class="content-wrapper">

<?php NCoreMacros::includeTemplate("snippets/nothing-found.php", $template->getParams(), $_l->templates['h8d3kreicn'])->render() ?>

			</div> <!-- /.content-wrapper -->
		</div> <!-- /#content -->

<?php endif ?>

	</div> <!-- /#container -->

</section>

<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = true; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
$_l->extends = $layout ?>

<?php 
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
