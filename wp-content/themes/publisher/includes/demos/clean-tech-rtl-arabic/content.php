<?php

/**
 * Returns content for default demo
 *
 * ->Taxonomies
 * ->Medias
 * ->Posts
 * ->Options
 * ->Widgets
 * ->Menus
 *
 * @return array
 */
function publisher_demo_raw_content() {

	$style_id       = 'clean-tech';
	$demo_id        = 'clean-tech-rtl-arabic';
	$prefix         = $demo_id . '-'; // prevent caching when user installs multiple demos continuously
	$demo_path      = PUBLISHER_THEME_PATH . 'includes/demos/' . $demo_id . '/';
	$demo_image_url = publisher_get_demo_images_url( $demo_id );

	return array(

		//
		// ->Taxonomies
		//
		'taxonomy' => array(
			'multi_steps' => false,
			array(

				//
				// Gadgets
				//
				array(
					'the_id'    => 'bs-gadgets',
					'slug'      => 'bs-gadgets',
					'name'      => 'الأدوات',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'better_slider_style',
							'meta_value' => 'style-15',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0a9e01',
						),
					),
				),


				//
				// Mobile cats
				//
				array(
					'the_id'    => 'bs-mobile',
					'slug'      => 'bs-mobile',
					'name'      => 'الهواتف الذكية',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0a9e01',
						),
					),
				),
				array(
					'the_id'    => 'bs-android',
					'slug'      => 'bs-android',
					'name'      => 'أندرويد',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-mobile%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#85ab21',
						),
					),
				),
				array(
					'the_id'    => 'bs-applications',
					'slug'      => 'bs-applications',
					'name'      => 'التطبيقات',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-mobile%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#4987b9',
						),
					),
				),
				array(
					'the_id'   => 'bs-iphone',
					'slug'     => 'bs-iphone',
					'name'     => 'آيفون',
					'taxonomy' => 'category',
					'parent'   => '%%bs-mobile%%',
				),
				array(
					'the_id'    => 'bs-windows-phone',
					'slug'      => 'bs-windows-phone',
					'name'      => 'ويندوز هاتف',
					'taxonomy'  => 'category',
					'parent'    => '%%bs-mobile%%',
					'term_meta' => array(
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#02a2f6',
						),
					),
				),


				//
				// Reviews cat
				//
				array(
					'the_id'    => 'bs-reviews',
					'slug'      => 'bs-reviews',
					'name'      => 'استعراض',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'blog-5',
						),
						array(
							'meta_key'   => 'slider_type',
							'meta_value' => 'disable',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#0a9e01',
						),
					),
				),


				//
				// Video cat
				//
				array(
					'the_id'    => 'bs-video',
					'slug'      => 'bs-video',
					'name'      => 'فيديو',
					'taxonomy'  => 'category',
					'term_meta' => array(
						array(
							'meta_key'   => 'page_listing',
							'meta_value' => 'grid-1-3',
						),
						array(
							'meta_key'   => 'page_layout',
							'meta_value' => '1-col',
						),
						array(
							'meta_key'   => 'slider_type',
							'meta_value' => 'style-5',
						),
						array(
							'meta_key'   => 'term_color',
							'meta_value' => '#dd3333',
						),
					),
				),

			)
		), // taxonomies


		//
		// ->Medias
		//
		'media'    => array(

			'multi_steps'           => true,
			'uninstall_multi_steps' => false,

			array(
				'the_id' => 'bs-media-email',
				'file'   => $demo_image_url . $prefix . 'email-illustration.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-logo',
				'file'   => $demo_image_url . $prefix . 'logo.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-940x160',
				'file'   => $demo_image_url . $prefix . 'ad-940x160.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-180x480',
				'file'   => $demo_image_url . $prefix . 'ad-180x480.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-728x90',
				'file'   => $demo_image_url . $prefix . 'ad-728x90.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-300x250',
				'file'   => $demo_image_url . $prefix . 'ad-300x250.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-ad-120x240',
				'file'   => $demo_image_url . $prefix . 'ad-120x240.png',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-post-content-1',
				'file'   => $demo_image_url . $prefix . 'post-content-1.jpg',
				'resize' => false,
			),
			array(
				'the_id' => 'bs-media-1',
				'file'   => $demo_image_url . $prefix . 'thumb-1.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-4',
				'file'   => $demo_image_url . $prefix . 'thumb-4.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-8',
				'file'   => $demo_image_url . $prefix . 'thumb-8.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-12',
				'file'   => $demo_image_url . $prefix . 'thumb-12.jpg',
				'resize' => true
			),
			array(
				'the_id' => 'bs-media-16',
				'file'   => $demo_image_url . $prefix . 'thumb-16.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-20',
				'file'   => $demo_image_url . $prefix . 'thumb-20.jpg',
				'resize' => true,
			),
			array(
				'the_id' => 'bs-media-21',
				'file'   => $demo_image_url . $prefix . 'thumb-21.jpg',
				'resize' => true,
			),
		), // media


		//
		// ->Posts
		//
		'posts'    => array(
			'multi_steps' => false,
			array(

				//
				// Homepage
				//
				- 1 => array(
					'the_id'            => 'bs-front-page',
					'post_title'        => 'Front page',
					'post_content_file' => $demo_path . 'front-page.txt',
					'post_type'         => 'page',
					'prepare_vc_css'    => true,
					'post_meta'         => array(
						array(
							'meta_key'   => 'page_layout',
							'meta_value' => '1-col',
						),
						array(
							'meta_key'   => '_hide_title',
							'meta_value' => 1,
						),
						array(
							'meta_key'   => 'post_breadcrumb',
							'meta_value' => 'hide',
						),
					),
				),


				//
				// Gadgets
				//
				// 1
				// gadgets
				2   => array(
					'post_title'        => 'كيف تستثمر خاصية (المشاهدة أولاً) لإعادة الحياة لصفحتك في الفيسبوك',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 2
				// gadgets
				array(
					'post_title'        => 'تعرف على أول كروم بوك مع قلم من سامسونج',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 3
				// gadgets
				array(
					'post_title'        => 'تطبيق كيدستوريز لجعل الطفل يستمع للقصص والحكايات بصوت الآباء',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 4
				// gadgets
				array(
					'post_title'        => 'حظر سامسونج جالكسي نوت ۷ من جميع رحلات الطيران الأمريكية',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 5
				// gadgets
				array(
					'post_title'        => 'سوني قد تُطلق ألعاب بلاي ستيشن على الجوالات في ۲۰۱۸',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 6
				// gadgets
				array(
					'post_title'        => 'قوقل تحذف “هانج أوتس” من هواتف بيكسل لأجل تطبيقي “ألو” و”ديو”',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-1'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 7
				// gadgets
				array(
					'post_title'        => 'سيلزفورس تتخلَّى عن فكرة الاستحواذ على تويتر',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 8
				// gadgets
				array(
					'post_title'        => '“فيسبوك ماسينجر بيتا” يدعم المكالمات على ويندوز ۱۰',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 9
				// gadgets
				array(
					'post_title'        => 'إكس بوكس ون يواصل تفوقه على بلايستيشن للشهر الثالث على التوالي',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 10
				// gadgets
				array(
					'post_title'        => 'سامسونج تطلق اللوحي tabpro s بنظام ويندوز ۱۰ ومواصفات عالية',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 11
				// gadgets
				array(
					'post_title'        => 'هواوي شحنت أكثر من ۱۰۰ مليون هاتف هذا العام',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 12
				// gadgets
				array(
					'post_title'        => 'سامسونج تتوقع زيادة خسائر الربع الأخير إلى 5 مليار دولار بسبب النوت 7',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 13
				// gadgets
				array(
					'post_title'        => 'سمات عصر الانترنت (۲): الوجبات المعلوماتية السريعة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),
				// 14
				// gadgets
				array(
					'post_title'        => 'قوقل ستنشئ فهرس بحث خاص بمواقع الهواتف الذكية',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-1%%',
					'post_terms'        => array(
						'category' => '%%bs-gadgets%%',
					),
				),


				//
				// Mobile cats
				//
				// 1
				// android
				3   => array(
					'post_title'        => 'التقنية الثورية القادمة متوفرة الآن في كل مكان !',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 2
				// android
				array(
					'post_title'        => 'طائرات بدون طيار تبدأ في توفير أكياس الدم لأفريقيا',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 3
				// android
				array(
					'post_title'        => 'الآن يمكنك مشاهدة فيديوهات فيس بوك عبر التلفاز',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 4
				// android
				array(
					'post_title'        => 'قوقل تطور ساعات ذكية ستطلقها مطلع العام القادم',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 5
				// android
				array(
					'post_title'        => 'إتش بي تقرر تسريح ۴۰۰۰ موظف خلال السنوات الثلاث المقبلة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 6
				// android
				array(
					'post_title'        => 'فيريزون قد تنسحب من صفقة الاستحواذ على ياهو',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-1'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 7
				// android
				array(
					'post_title'        => 'بيرسكوب تتيح البث على تويتر بدون الحاجة لهاتف ذكي',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 8
				// android
				array(
					'post_title'        => 'تحديث google photos يجلب إمكانية صنع الصور المتحركة gif',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 9
				// android
				array(
					'post_title'        => 'فيس بوك دفعت ۵ مليون دولار لمكتشفي الثغرات الأمنية',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),
				// 10
				// android
				array(
					'post_title'        => 'تحديث كروم ۵۴ يحسن التعامل مع مقاطع يوتيوب المضمنة في المواقع',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-8%%',
					'post_terms'        => array(
						'category' => '%%bs-android%%',
					),
				),


				// 11
				// applications
				4   => array(
					'post_title'        => 'آبل تطرد موظفين سرقوا صور خاصة للعملاء من هواتف تحت الصيانة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 12
				// applications
				array(
					'post_title'        => 'سامسونج تعرض خصم ۱۰۰$ عند الانتقال من نوت ۷ هاتف جالكسي',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 13
				// applications
				array(
					'post_title'        => 'ويكيليكس تنشر ۱۱۹۳ رسالة بريد إلكتروني مسربة بشأن هيلاري كلينتون',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 14
				// applications
				array(
					'post_title'        => 'سامسونج تفكر في التخلي عن علامة نوت',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 15
				// applications
				array(
					'post_title'        => 'قوقل تحذف “هانج أوتس” من هواتف بيكسل لأجل تطبيقي “ألو” و”ديو” كيف تستثمر',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 16
				// applications
				array(
					'post_title'        => 'تقرير شفافية قوقل: زيادة في طلبات الحكومات .. ورفض لطلبات المملكة!',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 17
				// applications
				array(
					'post_title'        => 'كلين ماستر على أندرويد يحصل على شريط جانبي بإختصارات مفيدة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 18
				// applications
				array(
					'post_title'        => 'بلايستيشن ۴ يدعم الصور والفيديور ۳۶۰ درجة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 19
				// applications
				array(
					'post_title'        => 'تحديث كبير يطال تطبيق دروب بوكس على ios',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),
				// 20
				// applications
				array(
					'post_title'        => 'جالكسي s7 إيدج قادم باللون الأزرق قريباً',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-1'
					),
					'thumbnail_id'      => '%%bs-media-12%%',
					'post_terms'        => array(
						'category' => '%%bs-applications%%',
					),
				),


				// 21
				// iphone
				1   => array(
					'post_title'        => 'سكايب على أندرويد يحل مشكلة تغيير الإتجاه أثناء تسجيل رسالة فيديو',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 22
				// iphone
				array(
					'post_title'        => 'من التصوير إلى الطباعة: “كانون” تسهّل رحلة محبي التصوير في مهرجان إكسبوجر في الشارقة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 23
				// iphone
				array(
					'post_title'        => 'لوحة مفاتيح قوقل لديها الآن ثيمات هواتف بكسل الجديدة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 24
				// iphone
				array(
					'post_title'        => 'أندرويد ۷.۱ نوجا قادم إلى أجهزة نكسوس في ديسمبر',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 25
				// iphone
				array(
					'post_title'        => 'سامسونج لا تعرف سبب انفجار جالكسي نوت ۷',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 26
				// iphone
				array(
					'post_title'        => 'أمازون تُطلق ’موسيقى بلا حدود’ وتدعم أجهزة إيكو',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 27
				// iphone
				array(
					'post_title'        => 'الاتصالات السعودية تتحالف استراتيجيا مع جنرال الكتريك في مجال التحول الرقمي',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 28
				// iphone
				array(
					'post_title'        => 'تراجع شحنات الحواسب الشخصية للعام الثاني على التوالي',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 29
				// iphone
				array(
					'post_title'        => 'نسخة المعاينة من أندرويد ۷.۱ قادمة هذا الشهر',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// 30
				// iphone
				array(
					'post_title'        => 'ياهو تمنع المستخدمين من ترك خدمة بريدها الإلكتروني “بحيلةٍ عرجاء!”',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'قوقل تطلق أداة “data studio” لتحويل البيانات إلى تقارير',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'التحقيق في قضية إنفجار هاتف آيفون ۷ بوجه مستخدم صيني',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'انطلاق “كلوب فاكتوري” لأول مرة في منطقة الشرق الأوسط',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'Honor s1 ساعة ذكية من هواوي قادمة في ۱۸ أكتوبر',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'أبل وسامسونج وجهًا لوجه في المحكمة العليا لوضع حد لنزاع براءات الاختراع',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),
				// iphone
				array(
					'post_title'        => 'أبل تخطط لتوحيد خدماتها في منصة سحابية واحدة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-16%%',
					'post_terms'        => array(
						'category' => '%%bs-iphone%%',
					),
				),


				// 31
				// windows-phone
				5   => array(
					'post_title'        => 'سيانوجين تتخلى عن تطوير رومات أندرويد كاملة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 32
				// windows-phone
				array(
					'post_title'        => 'احتراق نوت ۷ قد يخسر سامسونج ۱۷ مليار دولار',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 33
				// windows-phone
				array(
					'post_title'        => 'تطبيق climendo لتقديم توقعات طقس دقيقة ومحتملة لموقعك',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 34
				// windows-phone
				array(
					'post_title'        => 'عاجل : سامسونج تطلب وقف بيع جالكسي نوت 7 في جميع أنحاء العالم',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 35
				// windows-phone
				array(
					'post_title'        => 'Ios ۱۰ يصل إلى 66% من الأجهزة في أقل من شهر',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 36
				// windows-phone
				array(
					'post_title'        => 'فيس بوك تطلق شبكتها الاجتماعية للأعمال workplace',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 37
				// windows-phone
				array(
					'post_title'        => 'مميز: تطبيق الرسم الإحترافي infinite painter على اندرويد و ios',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 38
				// windows-phone
				array(
					'post_title'        => 'Open camera تطبيق كاميرا إحترافي وخير بديل للتطبيق الإفتراضي',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 39
				// windows-phone
				array(
					'post_title'        => 'شاومي تعلن عن هاتف “مي ماكس برايم” بشاشة عملاقة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),
				// 40
				// windows-phone
				array(
					'post_title'        => 'ون بلس تخطط للكشف عن هاتف oneplus ۳ plus بكاميرا مزدوجة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-20%%',
					'post_terms'        => array(
						'category' => '%%bs-windows-phone%%',
					),
				),


				// 1
				// video
				array(
					'post_title'        => 'ظهور ساعة اتش تي سي الذكية في صور مسرّبة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 2
				// video
				array(
					'post_title'        => 'هواوي تستعد للكشف عن هاتف honor 6x يوم ۱۸ اكتوبر',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-1'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 3
				// video
				array(
					'post_title'        => 'رسميًا: سامسونج تضبط إنتاج نوت 7 ولم توقفه بعد',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 4
				// video
				array(
					'post_title'        => 'قوقل كروم يخفف من استهلاك الرام .. أخيراً',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 5
				// video
				array(
					'post_title'        => '’رسال’ إهداء باقات الورد لم يكن بهذه السهولة من قبل',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 6
				// video
				array(
					'post_title'        => 'نسخة جديدة من هواوي نوفا بذاكرة عشوائية ۳ غيغابايت',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
				),
				// 7
				// video
				array(
					'post_title'        => 'سامسونج توقف إنتاج جالاكسي نوت ۷ بشكل مؤقت',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 8
				// video
				array(
					'post_title'        => 'تطبيق giphy cam لإنشاء الصور المتحركة gif على أندرويد',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 9
				// video
				array(
					'post_title'        => 'تقدير عالمي للمبتكرين في عالم التقنيات الحديثة في الإمارات',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),
				// 10
				// video
				array(
					'post_title'        => 'ثالث هاتف نوت ۷ “آمن” يحترق وسامسونج تكتفي بالطمأنة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-21%%',
					'post_terms'        => array(
						'category' => '%%bs-video%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_featured_embed_code',
							'meta_value' => 'https://www.youtube.com/watch?v=GeoUELDgyM4',
						)
					),
					'post_format'       => 'video',
				),


				// 1
				// review
				0   => array(
					'post_title'        => 'آیفون ۷ مراجعة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '8',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '4',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '9',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '7',
								),
							),
						),
					),
				),
				// 2
				// review
				array(
					'post_title'        => 'مايكروسوفت السطح برو ۴ مراجعة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '8',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '4',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '1',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '2',
								),
							),
						),
					),
				),
				// 3
				// review
				array(
					'post_title'        => 'مايكروسوفت السطح برو ۴ مراجعة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '8',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '3',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '9',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '2',
								),
							),
						),
					),
				),
				// 4
				// review
				array(
					'post_title'        => 'مراجعة ps4 سوني',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '8',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '2',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '9',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '4',
								),
							),
						),
					),
				),
				// 5
				// review
				array(
					'post_title'        => 'Icq على أندرويد يحصل على ميزة ردود الأفعال في القصص',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '8',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '3',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '5',
								),
							),
						),
					),
				),
				// 6
				// review
				array(
					'post_title'        => 'مراجعة xiaomi الهواء ۱۲',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '8',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '9',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '5',
								),
							),
						),
					),
				),
				// 7
				// review
				array(
					'post_title'        => 'مراجعة Themeforest',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '2',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '7',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '9',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '6',
								),
							),
						),
					),
				),
				// 8
				// review
				array(
					'post_title'        => 'مراجعة BetterStudio',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-1'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '2',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '8',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '7',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '9',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '2',
								),
							),
						),
					),
				),
				// 9
				// review
				array(
					'post_title'        => 'مراجعة الناشر الموضوع',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '4',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '7',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '7',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '4',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '8',
								),
							),
						),
					),
				),
				// 10
				// review
				array(
					'post_title'        => 'أفضل مراجعة',
					'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
					'remote_content'    => array(
						'content_id' => 'clean-tech-rtl-arabic-2'
					),
					'thumbnail_id'      => '%%bs-media-4%%',
					'post_terms'        => array(
						'category' => '%%bs-reviews%%',
					),
					'post_meta'         => array(
						array(
							'meta_key'   => '_bs_review_enabled',
							'meta_value' => '1',
						),
						array(
							'meta_key'   => '_bs_review_pos',
							'meta_value' => 'top-bottom',
						),
						array(
							'meta_key'   => '_bs_review_rating_type',
							'meta_value' => 'stars',
						),
						array(
							'meta_key'   => '_bs_review_heading',
							'meta_value' => 'عنوان مخصصة للمراجعة؟',
						),
						array(
							'meta_key'   => '_bs_review_criteria',
							'meta_value' => array(
								array(
									'label' => 'معايير ۱',
									'rate'  => '5',
								),
								array(
									'label' => 'معايير ۲',
									'rate'  => '6',
								),
								array(
									'label' => 'معايير ۳',
									'rate'  => '4',
								),
								array(
									'label' => 'معايير ۴',
									'rate'  => '9',
								),
								array(
									'label' => 'معايير ۵',
									'rate'  => '7',
								),
							),
						),
					),
				),


				//
				// BetterAds posts
				//
				array(
					'the_id'     => 'bs-post-ad-940x160',
					'post_title' => '940x180 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- الإعلانات -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-940x180}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-180x480',
					'post_title' => '180x480 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- الإعلانات -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-180x480}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-728x90',
					'post_title' => '728x90 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- الإعلانات -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-728x90}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-300x250',
					'post_title' => '300x250 Banner',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- الإعلانات -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-300x250}:\'full\'%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-120x240-2',
					'post_title' => '120x240 Banner - 2',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- الإعلانات -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-120x240}:\'full\'%%'
						),
						array(
							'meta_key'   => 'campaign',
							'meta_value' => '%%bs-post-ad-campaign-1%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-120x240-1',
					'post_title' => '120x240 Banner - 1',
					'post_type'  => 'better-banner',
					'post_meta'  => array(
						array(
							'meta_key'   => 'type',
							'meta_value' => 'image'
						),
						array(
							'meta_key'   => 'caption',
							'meta_value' => '- الإعلانات -'
						),
						array(
							'meta_key'   => 'url',
							'meta_value' => 'http://betterstudio.com/'
						),
						array(
							'meta_key'   => 'img',
							'meta_value' => '%%bf_product_demo_media_url:{bs-media-ad-120x240}:\'full\'%%'
						),
						array(
							'meta_key'   => 'campaign',
							'meta_value' => '%%bs-post-ad-campaign-1%%'
						),
					)
				),
				array(
					'the_id'     => 'bs-post-ad-campaign-1',
					'post_title' => '120 Banners Campaign',
					'post_type'  => 'better-campaign',
				),
			),
		), // post


		//
		// ->Options
		//
		'options'  => array(

			'multi_steps' => false,

			//step one
			array(
				//
				// Panel options
				//
				array(
					'type'              => 'option',
					'option_name'       => publisher_get_theme_panel_id(),
					'option_value_file' => $demo_path . 'options.json',
				),
				array(
					'type'          => 'option',
					'option_name'   => publisher_get_theme_panel_id(),
					'option_value'  => array(
						'logo_text'         => 'Publisher',
						'logo_image'        => '%%bf_product_demo_media_url:{bs-logo}:\'full\'%%',
						'logo_image_retina' => '',
					),
					'merge_options' => true,
				),

				// Theme Style
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_style',
					'option_value' => $style_id,
				),

				// Theme Demo
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_demo',
					'option_value' => $style_id,
				),


				//
				// Update front page
				//
				array(
					'type'         => 'option',
					'option_name'  => 'page_on_front',
					'option_value' => '%%bs-front-page%%',
				),
				array(
					'type'         => 'option',
					'option_name'  => 'show_on_front',
					'option_value' => 'page',
				),


				//
				// Aside Ad
				//
				array(
					'type'          => 'option',
					'merge_options' => true,
					'option_name'   => 'better_ads_manager',
					'option_value'  => array(
						'header_aside_logo_type'   => 'banner',
						'header_aside_logo_banner' => '%%bs-post-ad-728x90%%',
						'header_aside_logo_align'  => is_rtl() ? 'left' : 'right',
					),
				),

			)
		), // options


		//
		// ->Widgets
		//
		'widgets'  => array(
			'multi_steps' => false,
			array(

				//
				// Primary sidebar
				//
				'primary-sidebar'   => array(
					'remove_all_widgets' => true,
					array(
						'widget_id'       => 'better-social-counter',
						'widget_settings' => array(
							'title' => 'ابقى معنا',
							'order' => 'facebook,twitter,google,youtube,instagram,vimeo,pinterest,envato',
						)
					),
					array(
						'widget_id'       => 'bs-mix-listing-3-4',
						'widget_settings' => array(
							'category' => '%%bs-gadgets%%',
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'  => '',
							'type'   => 'banner',
							'banner' => '%%bs-post-ad-300x250%%',
						)
					),
					array(
						'widget_id'       => 'bs-text-listing-1',
						'widget_settings' => array(
							'title' => 'أحدث الأخبار',
							'count' => 3,
						)
					),
					array(
						'widget_id'       => 'bs-newsletter-mailchimp',
						'widget_settings' => array(
							'title'          => 'النشرة الإخبارية',
							'mailchimp-code' => '<form action="//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b" method="post"',
							'mailchimp-url'  => '//betterstudio.us9.list-manage.com/subscribe/post?u=ed62711f285e19818a5c11811&id=4450ad741b',
							'msg'            => 'اشترك في النشرة الإخبارية لدينا من أجل مواكبة التطورات.نخ',
							'image'          => '%%bf_product_demo_media_url:{bs-media-email}:\'full\'%%',
						)
					),
				),

				//
				// Secondary sidebar
				//
				'secondary-sidebar' => array(
					'remove_all_widgets' => true,

					array(
						'widget_id'       => 'bs-text-listing-4',
						'widget_settings' => array(
							'title'                    => 'أخبار',
							'count'                    => 8,
							'paginate'                 => 'slider',
							'slider-control-dots'      => 'style-1',
							'slider-control-next-prev' => 'off',
							'bf-widget-title-icon'     => array(
								'type' => 'fontawesome',
								'icon' => 'fa-rss',
							),
						)
					),
					array(
						'widget_id'       => 'better-ads',
						'widget_settings' => array(
							'title'  => '',
							'type'   => 'banner',
							'banner' => '%%bs-post-ad-180x480%%',
						)
					),
				),
			),
		), // widgets


		//
		// ->Menus
		//
		'menus'    => array(
			'multi_step' => false,

			array(
				//
				// Main navigation
				//
				array(
					'menu-name'     => 'Main Navigation',
					'menu-location' => 'main-menu',
					'recently-edit' => true,
					'items'         => array(
						array(
							'the_id'    => 'bs-menu-main-home',
							'item_type' => 'page',
							'page_id'   => '%%bs-front-page%%',
							'title'     => 'الصفحة الرئيسية',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-home',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-mobile%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-mobile-phone',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
								array(
									'meta_key'   => 'mega_menu',
									'meta_value' => 'tabbed-grid-posts',
								),
								array(
									'meta_key'   => 'drop_menu_anim',
									'meta_value' => 'slide-bottom-in',
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-gadgets%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-cubes',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-video%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-play-circle',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
								array(
									'meta_key'   => 'mega_menu',
									'meta_value' => 'grid-posts',
								),
								array(
									'meta_key'   => 'drop_menu_anim',
									'meta_value' => 'slide-fade',
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-reviews%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-star-half-empty',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-android%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-android',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-iphone%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-apple',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),

					)
				),

				//
				// Topbar navigation
				//
				array(
					'menu-name'     => 'Topbar Navigation',
					'menu-location' => 'top-menu',
					'items'         => array(
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-gadgets%%',
							'taxonomy'  => 'category',
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-mobile%%',
							'taxonomy'  => 'category',
						),
					)
				),

				//
				// Footer navigation
				//
				array(
					'menu-name'     => 'Footer Navigation',
					'menu-location' => 'footer-menu',
					'items'         => array(
						array(
							'item_type' => 'page',
							'page_id'   => '%%bs-front-page%%',
							'title'     => 'الصفحة الرئيسية',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-home',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-mobile%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-mobile-phone',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-android%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-android',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							)
						),
						array(
							'item_type' => 'term',
							'term_id'   => '%%bs-iphone%%',
							'taxonomy'  => 'category',
							'item_meta' => array(
								array(
									'meta_key'   => 'menu_icon',
									'meta_value' => array(
										'icon'   => 'fa-apple',
										'type'   => 'fontawesome',
										'width'  => '',
										'height' => '',
									),
								),
							),
						),
					)
				),
			),

		), // menus

	);
}