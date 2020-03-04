<?php
$prefix = 'tj_';
$meta_box = array(
	'id' => 'tj-meta-box-portfolio',
	'title' =>  __('Image Settings', 'themejunkie'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
			'name' =>  __('Image 1', 'themejunkie'),
			'desc' => __('630px x unlimited', 'themejunkie'),
			'id' => $prefix.'portfolio_image1',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix.'portfolio_image_button1',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' =>  __('Image 2', 'themejunkie'),
			'desc' => __('630px x unlimited', 'themejunkie'),
			'id' => $prefix.'portfolio_image2',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix.'portfolio_image_button2',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' =>  __('Image 3', 'themejunkie'),
			'desc' => __('630px x unlimited', 'themejunkie'),
			'id' => $prefix.'portfolio_image3',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix.'portfolio_image_button3',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' =>  __('Image 4', 'themejunkie'),
			'desc' => __('630px x unlimited', 'themejunkie'),
			'id' => $prefix.'portfolio_image4',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix.'portfolio_image_button4',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' =>  __('Image 5', 'themejunkie'),
			'desc' => __('630px x unlimited', 'themejunkie'),
			'id' => $prefix.'portfolio_image5',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix.'portfolio_image_button5',
			'type' => 'button',
			'std' => 'Browse'
		),
	),
	
);
$meta_box_portfolio_video = array(
	'id' => 'tj-meta-box-portfolio-video',
	'title' => __('Video Settings', 'themejunkie'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
        array( "name" => __('Video Embedded Code','themejunkie'),
				"desc" => __('best width: 630px','themejunkie'),
				"id" => $prefix."video_embed_portfolio",
				"type" => "textarea"
			)
	),
	
);
$meta_box_info = array(
	'id' => 'tj-meta-box-portfolio-info',
	'title' => __('Additional Info Settings', 'themejunkie'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
    array(
			'name' =>  __('Brief Description', 'themejunkie'),
			'desc' => 'A brief description of the project.',
			'id' => $prefix.'portfolio_brief_desc',
			'type' => 'text',
			'std' => ''
		),	
	array(
			'name' =>  __('External Link', 'themejunkie'),
			'desc' => 'The link to the project.',
			'id' => $prefix.'portfolio_link',
			'type' => 'text',
			'std' => ''
		)
	),
	
);
add_action('admin_menu', 'tj_add_box_portfolio');
/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function tj_add_box_portfolio() {
	global $meta_box, $meta_box_portfolio_video, $meta_box_info;
 	
	add_meta_box($meta_box_info['id'], $meta_box_info['title'], 'tj_show_box_portfolio_info', $meta_box_info['page'], $meta_box_info['context'], $meta_box_info['priority']);
	
	add_meta_box($meta_box['id'], $meta_box['title'], 'tj_show_box_portfolio', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
	add_meta_box($meta_box_portfolio_video['id'], $meta_box_portfolio_video['title'], 'tj_show_box_portfolio_video', $meta_box_portfolio_video['page'], $meta_box_portfolio_video['context'], $meta_box_portfolio_video['priority']);
}
/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/
function tj_show_box_portfolio() {
	global $meta_box, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Upload an image and then click "insert into post". To delete an image, simply clear the field.', 'themejunkie').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
		}
	}
 
	echo '</table>';
}
function tj_show_box_portfolio_video() {
	global $meta_box_portfolio_video, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to embed videos into your portfolio pages.', 'themejunkie').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If textarea		
			case 'textarea':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
		}
	}
 
	echo '</table>';
}
function tj_show_box_portfolio_info() {
	global $meta_box_info, $post;
 	
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_info['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If textarea		
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;
		}
	}
 
	echo '</table>';
}
 
add_action('save_post', 'tj_save_data_portfolio');
/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function tj_save_data_portfolio($post_id) {
	global $meta_box, $meta_box_portfolio_video, $meta_box_info;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['tj_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($meta_box_portfolio_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($meta_box_info['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}

//Queue Scripts
 
function tj_admin_scripts_portfolio() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('tj-upload', get_template_directory_uri() . '/includes/js/upload-button.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('tj-upload');
}
function tj_admin_styles_portfolio() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'tj_admin_scripts_portfolio');
add_action('admin_print_styles', 'tj_admin_styles_portfolio');