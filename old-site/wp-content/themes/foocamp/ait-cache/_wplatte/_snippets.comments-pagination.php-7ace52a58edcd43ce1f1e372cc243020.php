<?php //netteCache[01]000513a:2:{s:4:"time";s:21:"0.30141300 1416529564";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:123:"/afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/snippets/comments-pagination.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/snippets/comments-pagination.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'ud02u851c6')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if ($post->willCommentsPaginate): ?>
		<nav id="comment-nav-<?php echo htmlSpecialChars($location) ?>">

			<?php ob_start() ?> <?php echo NTemplateHelpers::escapeHtml(__('&larr; Older Comments', 'ait'), ENT_NOQUOTES) ?>
 <?php $prev = ob_get_clean() ?>

			<?php ob_start() ?> <?php echo NTemplateHelpers::escapeHtml(__('Newer Comments &rarr;', 'ait'), ENT_NOQUOTES) ?>
 <?php $next = ob_get_clean() ?>


			<div class="nav-previous"><?php previous_comments_link($prev) ?></div>
			<div class="nav-next"><?php next_comments_link($next) ?></div>
		</nav>
<?php endif ;
