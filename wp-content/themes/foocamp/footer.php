<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

global $latteParams;

WpLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();