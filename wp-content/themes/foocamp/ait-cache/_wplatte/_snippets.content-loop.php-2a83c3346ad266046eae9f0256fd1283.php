<?php //netteCache[01]000488a:2:{s:4:"time";s:21:"0.16261000 1427821031";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:99:"/afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/snippets/content-loop.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/snippets/content-loop.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'gqw4gw4op8')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<section class="blog clearfix">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($posts) as $post): ?>


	<article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?> clearfix">		

		<div class="entry clearfix">

			<h2 class="entry-title"><a href="<?php echo htmlSpecialChars($post->permalink) ?>
" title="Permalink to <?php echo htmlSpecialChars($post->title) ?>" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>

			<div class="entry-container clearfix">

<?php if ($post->thumbnailSrc != false): ?>
				<div class="entry-thumbnail right">
					<a href="<?php echo htmlSpecialChars($post->permalink) ?>" class="block">
						<img src="<?php echo AitImageResizer::resize($post->thumbnailSrc, array('w' => 340, 'h' => 140)) ?>" class="block" alt="" />
					</a>
				</div>
<?php endif ?>
				
<?php if ($site->isSearch): ?>
					<div class="entry-content loop-content"><?php echo $post->excerpt ?></div>
<?php else: ?>
					<div class="entry-content loop-content"><?php echo $post->content("", 0) ?></div>
<?php endif ?>

			</div> <!-- / .entry-container -->

			<div class="entry-meta clearfix right">
				<a href="<?php echo WpLatteFunctions::getDayLink($post->date) ?>" class="date meta-info" title="<?php echo htmlSpecialChars($template->date($post->date, $site->dateFormat)) ?>
" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "F d, Y"), ENT_NOQUOTES) ?></a>
				<a class="url fn n ln author meta-info" href="<?php echo htmlSpecialChars($post->author->postsUrl) ?>
" title="View all posts by <?php echo htmlSpecialChars($post->author->name) ?>" rel="author"><?php echo NTemplateHelpers::escapeHtml($post->author->name, ENT_NOQUOTES) ?></a>
<?php if ($post->type == 'post' && $post->categories): ?>
				<span class="categories meta-info"><?php echo $post->categories ?></span>
<?php endif ?>
				<span class="comments meta-info"><?php echo NTemplateHelpers::escapeHtml($post->commentsCount, ENT_NOQUOTES) ?></span>
			</div>

		</div> <!-- / .entry -->

	</article>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</section>