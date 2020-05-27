<?php

return array(
	'items'  => array(
		0 =>
			array(
				'title'         => 'Item 1 title',
				'content_raw'   => '<p>
		Item 1 content <img class="alignnone size-full wp-image-7526" src="http://via.placeholder.com/350x150" alt="test alt" width="800" height="541" /> after image
	</p>',
				'content'       => '<p>
		Item 1 content  after image
	</p>',
				'image_id'      => '7526',
				'image_src'     => 'http://via.placeholder.com/350x150',
				'image_link'    => '',
				'image_alt'     => 'test alt',
				'image_caption' => '',
			),
		1 =>
			array(
				'title'         => 'Item 2 title',
				'content_raw'   => '<a href="http://betterstudio.com"><img class="alignnone size-full wp-image-7526" src="http://via.placeholder.com/350x150" alt="" width="800" height="541" /></a>',
				'content'       => '',
				'image_id'      => '7526',
				'image_src'     => 'http://via.placeholder.com/350x150',
				'image_link'    => 'http://betterstudio.com',
				'image_alt'     => '',
				'image_caption' => '',
			),
		2 =>
			array(
				'title'         => 'Item 3 title',
				'content_raw'   => '<p><a href="http://betterstudio.com"><img class="alignnone size-full wp-image-123" src="http://via.placeholder.com/350x150" alt="" width="800" height="541" /></a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>',
				'content'       => '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>',
				'image_id'      => '123',
				'image_src'     => 'http://via.placeholder.com/350x150',
				'image_link'    => 'http://betterstudio.com',
				'image_alt'     => '',
				'image_caption' => '',
			),
	),
	'before' => '<p>Without injuring others or placing your own life in danger, it’s healthy to let go sometimes. You don’t have to be irresponsible to release responsibility and embrace freedom for a change. When life is becoming too burdensome and the weight of obligation and duty seems suffocating, do something that allows you to release yourself from what can feel like a prison.</p>
	
	<h4>Item 4 title</h4>
	
	<p><a href="http://betterstudio.com"><img class="alignnone size-full wp-image-123" src="http://via.placeholder.com/350x150" alt="" width="800" height="541" /></a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
	
	',

	'after' => '
	
	<p>Without injuring others or placing your own life in danger, it’s healthy to let go sometimes. You don’t have to be irresponsible to release responsibility and embrace freedom for a change. When life is becoming too burdensome and the weight of obligation and duty seems suffocating, do something that allows you to release yourself from what can feel like a prison.</p>
	
	<h4>Item 4 title</h4>
	
	<p><a href="http://betterstudio.com"><img class="alignnone size-full wp-image-123" src="http://via.placeholder.com/350x150" alt="" width="800" height="541" /></a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
	
',


);
