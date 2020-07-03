<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_blocks' );

function crb_attach_blocks() {
	Block::make( __( 'Hero' ) )
	     ->add_fields([
		     Field::make( 'text', 'heading', __( 'Block Heading' ) ),
		     Field::make( 'text', 'sub_heading', __( 'Block Sub Heading' ) ),
		     Field::make( 'image', 'bg_image', __( 'Block background Image' ) ),
		     Field::make( 'text', 'sub_button_label', 'Button Label'),
		     Field::make( 'text', 'sub_button_url', 'Button Url'),
		     Field::make( 'complex', 'crb_logos', __( 'Logos' ) )
		          ->add_fields([
			          Field::make( 'image', 'icon', __( 'Icon' ) )
		          ])
	     ])->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		     ?>
             <section class="hero" style="background-image: url(<?php echo wp_get_attachment_url( $fields['bg_image'] ); ?>)">
                 <div class="container">
                     <div class="columns">
                         <div class="column is-7">
                             <h1><?php echo esc_html( $fields['heading'] ); ?></h1>
                             <p class="subtitle"><?php echo esc_html($fields['sub_heading']); ?></p>
                             <a href="<?php echo esc_html($fields['sub_button_url']); ?>" class="btn"><?php echo esc_html($fields['sub_button_label']); ?></a>
                             <div class="hero-logos">
                                 <?php foreach ($fields['crb_logos'] as $logo): ?>
                                    <img src="<?php echo wp_get_attachment_image_src($logo['icon'], 'full')[0]; ?>">
                                <?php endforeach; ?>
                             </div>
                         </div>
                         <div class="column is-5 headset">
                             <img src="<?php echo get_template_directory_uri()?>/images/headset.png">
                         </div>
                     </div>
                 </div>
             </section>
		     <?php
	     } );

	Block::make( __( 'Application' ) )
        ->add_fields([
	        Field::make( 'text', 'application_block_heading', __( 'Block Heading' ) ),
	        Field::make( 'complex', 'crb_application_items', __( 'Applications' ) )
	             ->add_fields([
		             Field::make( 'separator', 'crb_separator_1', __( 'Header' ) ),
		             Field::make( 'text', 'application_heading', __( 'Heading' ) ),
		             Field::make( 'text', 'application_sub_heading', __( 'Sub Heading' ) ),
		             Field::make( 'image', 'application_icon', __( 'Icon' ) ),
		             Field::make( 'separator', 'crb_separator_2', __( 'Body' ) ),
		             Field::make( 'rich_text', 'application_body_content', __( 'Content' ) ),
		             Field::make( 'separator', 'crb_separator_3', __( 'Footer' ) ),
		             Field::make( 'rich_text', 'application_footer_content', __( 'Content' ) ),
		             Field::make( 'separator', 'crb_separator_4', __( 'Gallery' ) ),
		             Field::make( 'media_gallery', 'crb_media_gallery', __( 'Media Gallery' ) ),
		             Field::make( 'separator', 'crb_separator_5', __( 'Video' ) ),
		             Field::make( 'textarea', 'application_iframe', __( 'Iframe' ) ),
             ])->set_header_template( '<%- application_heading %>'  )->set_collapsed(true)
        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) { ?>
            <section class="applications">
                <div class="container">
                    <p class="title"><?php echo $fields['application_block_heading']; ?></p>
                    <div class="applications-list">
                        <?php foreach ($fields['crb_application_items'] as $application): ?>
                            <div class="application-item">
                                <div class="columns">
                                    <div class="column is-5">
                                        <div class="application-header">
                                            <div class="application-img">
	                                            <?php echo wp_get_attachment_image($application['application_icon'], 'full'); ?>
                                            </div>
                                            <div class="application-name">
                                                <p class="application-title"><?php echo esc_html($application['application_heading']); ?></p>
                                                <p class="application-subtitle"><?php echo esc_html($application['application_sub_heading']); ?></p>
                                            </div>
                                        </div>
                                        <div class="application-body">
	                                        <?php echo wpautop($application['application_body_content']); ?>
                                        </div>
                                        <div class="application-footer">
	                                        <?php echo wpautop($application['application_footer_content']); ?>
                                        </div>
                                        <div class="applycation-gallery">
                                            <?php foreach ($application['crb_media_gallery'] as $g_image): ?>
                                                <a href="<?php echo wp_get_attachment_image_src($g_image, 'full')[0]; ?>" class="image-popup-vertical-fit">
                                                    <?php echo wp_get_attachment_image($g_image) ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="column is-7 video-wrap">
                                        <div class="video-container">
                                            <?php echo $application['application_iframe']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php
        });

	Block::make( __( 'Application Overview with gray background' ) )
	     ->add_fields([
		     Field::make( 'text', 'aog_heading', __( 'Heading' ) ),
		     Field::make( 'rich_text', 'aog_sub_heading', __( 'Sub Heading' ) ),
		     Field::make( 'textarea', 'aog_iframe', 'Iframe'),
		     Field::make( 'complex', 'aog_image_gallery', __( 'Image Gallery' ) )
		          ->add_fields([
			          Field::make( 'image', 'icon', __( 'Icon' ) ),
                      Field::make( 'text', 'title', 'Label')
		          ])->set_header_template( '<%- title %>'  )->set_collapsed(true)
	     ])->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			?>
                <section class="data-portal">
                    <div class="container">
                        <div class="columns">
                            <div class="column is-5">
                                <p class="title"><?php echo esc_html($fields['aog_heading']); ?></p>
                                <?php echo wpautop($fields['aog_sub_heading'])?>
                            </div>
                            <div class="column is-7 video-wrap">
                                <div class="video-container">
                                    <?php echo $fields['aog_iframe']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="data-portal-list">
                            <?php foreach ($fields['aog_image_gallery'] as $aig): ?>
                                <div class="data-portal-item">
                                    <a href="<?php echo wp_get_attachment_image_src($aig['icon'], 'full')[0]; ?>" class="image-popup-vertical-fit">
	                                    <img src="<?php echo wp_get_attachment_image_src($aig['icon'], 'full')[0]; ?>">
                                    </a>
                                    <p><?php echo $aig['title']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
			<?php
		} );

	Block::make( __( 'Application Overview with white background' ) )
	     ->add_fields([
		     Field::make( 'text', 'aow_heading', __( 'Heading' ) ),
		     Field::make( 'rich_text', 'aow_sub_heading', __( 'Sub Heading' ) ),
		     Field::make( 'textarea', 'aow_iframe', 'Iframe'),
		     Field::make( 'complex', 'aow_market_links', __( 'Market Links' ) )
		          ->add_fields([
			          Field::make( 'image', 'icon', __( 'Icon' ) ),
			          Field::make( 'text', 'link', 'URL')
		          ])->set_header_template( '<%- link %>'  )->set_collapsed(true),
		     Field::make( 'complex', 'aow_image_gallery', __( 'Image Gallery' ) )
		          ->add_fields([
			          Field::make( 'image', 'icon', __( 'Icon' ) ),
			          Field::make( 'text', 'title', 'Label')
		          ])->set_header_template( '<%- title %>'  )->set_collapsed(true)
	     ])->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			?>
                <section class="external-control">
                    <div class="container">
                        <div class="columns">
                            <div class="column is-5">
                                <p class="title"><?php echo esc_html($fields['aow_heading']); ?></p>
								<?php echo wpautop($fields['aow_sub_heading'])?>
                                <?php if (count($fields['aow_market_links'])): ?>
                                    <div class="external-logo">
                                        <?php foreach ($fields['aow_market_links'] as $ml): ?>
                                        <a href="<?php echo $ml['link']; ?>">
	                                       <img src="<?php echo wp_get_attachment_image_src($ml['icon'], 'full')[0]; ?>" />
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="column is-7 video-wrap">
                                <div class="video-container">
									<?php echo $fields['aow_iframe']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="external-control-list">
							<?php foreach ($fields['aow_image_gallery'] as $aig): ?>
                                <div class="external-control-item">
                                    <a class="image-popup-vertical-fit" href="<?php echo wp_get_attachment_image_src($aig['icon'], 'full')[0]; ?>">
                                        <img src="<?php echo wp_get_attachment_image_src($aig['icon'], 'full')[0]; ?>">
                                    </a>
                                    <p><?php echo $aig['title']; ?></p>
                                </div>
							<?php endforeach; ?>
                        </div>
                    </div>
                </section>
			<?php
		} );

	Block::make( __( 'Application Overview with blue background' ) )
	     ->add_fields([
		     Field::make( 'text', 'aob_heading', __( 'Heading' ) ),
		     Field::make( 'rich_text', 'aob_sub_heading', __( 'Sub Heading' ) ),
		     Field::make( 'image', 'aob_image', 'Image'),
		     Field::make( 'complex', 'aob_market_links', __( 'Market Links' ) )
		          ->add_fields([
			          Field::make( 'image', 'icon', __( 'Icon' ) ),
			          Field::make( 'text', 'link', 'URL')
		          ])->set_header_template( '<%- link %>'  )->set_collapsed(true),
	     ])->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			?>
                <section class="xrhealth">
                    <div class="container">
                        <div class="columns">
                            <div class="column is-5 xrhealth-wrap">
                                <p class="title"><?php echo esc_html($fields['aob_heading']); ?></p>
                                <div class="xrhealth-content">
	                                <?php echo wpautop($fields['aob_sub_heading']); ?>
                                    <?php if (count($fields['aow_market_links'])): ?>
                                        <div class="xrhealth-logo">
	                                        <?php foreach ($fields['aob_market_links'] as $ml): ?>
                                                <a href="<?php echo $ml['link']; ?>">
                                                    <img src="<?php echo wp_get_attachment_image_src($ml['icon'], 'full')[0]; ?>" />
                                                </a>
	                                        <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="column is-6 xrhealth-img">
                                <img src="<?php echo wp_get_attachment_image_src($fields['aob_image'], 'full')[0] ?>">
                            </div>
                        </div>
                    </div>
                </section>
			<?php
		} );

	Block::make( __( 'Certificates' ) )
	     ->add_fields([
		     Field::make( 'text', 'cert_heading', __( 'Heading' ) ),
		     Field::make( 'rich_text', 'cert_sub_heading', __( 'Sub Heading' ) ),
		     Field::make( 'complex', 'cert_images', __( 'Cerificates' ) )
		          ->add_fields([
			          Field::make( 'image', 'icon', __( 'Icon' ) ),
		          ])->set_collapsed(true),
	     ])->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			?>
                <section class="compliance">
                    <div class="container">
                        <div class="columns">
                            <div class="column is-5">
                                <p class="title"><?php echo esc_html($fields['cert_heading']); ?></p>
                                <div class="compliance-content">
	                                <?php echo wpautop($fields['cert_sub_heading']); ?>
                                </div>
                            </div>
                            <div class="column is-7">
                                <div class="sertificate-slider">
                                    <?php foreach ($fields['cert_images'] as $cert_image): ?>
                                        <div class="sertificate-item">
                                            <img src="<?php echo wp_get_attachment_image_src($cert_image['icon'], 'full')[0] ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
			<?php
		} );

	Block::make( __('Release Notes'))
        ->add_fields([
	        Field::make( 'text', 'rn_heading', __( 'Heading' ) ),
	        Field::make( 'complex', 'release_notes', __( 'Release Notes' ) )
	             ->add_fields([
		             Field::make( 'text', 'rn_heading', __( 'Application' ) ),
		             Field::make( 'complex', 'release_notes', __( 'Release Notes' ) )
			             ->add_fields([
				             Field::make( 'text', 'rn_version', __( 'Version' ) ),
				             Field::make( 'text', 'rn_date', __( 'Date' ) ),
                             Field::make( 'rich_text', 'rn_changes', 'Changes')
                         ])->set_header_template( '<%- rn_version %>'  )->set_collapsed(true),
	             ])->set_header_template( '<%- rn_heading %>'  )->set_collapsed(true),
        ])->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			?>
                <section class="release-notes">
                    <div class="container">
                        <p class="title"><?php echo $fields['rn_heading']; ?></p>
                        <div class="tabs_wrapper">
                            <ul class="tabs">
                                <?php foreach ($fields['release_notes'] as $index => $tab): ?>
                                    <?php if ($index == 0): ?>
                                        <li class="active" rel="tab<?php echo $index?>"><?php echo $tab['rn_heading']; ?></li>
                                    <?php else: ?>
                                        <li rel="tab<?php echo $index?>"><?php echo $tab['rn_heading']; ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tab_container">
	                            <?php foreach ($fields['release_notes'] as $index => $tab): ?>
		                            <?php if ($index == 0): ?>
                                        <h3 class="d_active tab_drawer_heading" rel="tab<?php echo $index;?>"><?php echo $tab['rn_heading']; ?></h3>
                                        <div id="tab<?php echo $index;?>" class="tab_content mCustomScrollbar">
                                            <?php foreach ($tab['release_notes'] as $trn): ?>
                                                <p><b><?php echo $trn['rn_version']; ?></b></p>
                                                <p><?php echo $trn['rn_date']; ?></p>
                                                <?php echo wpautop($trn['rn_changes']); ?>
                                            <?php endforeach; ?>
                                        </div>
		                            <?php else: ?>
                                        <h3 class="tab_drawer_heading" rel="tab<?php echo $index;?>"><?php echo $tab['rn_heading']; ?></h3>
                                        <div id="tab<?php echo $index;?>" class="tab_content mCustomScrollbar">
	                                        <?php foreach ($tab['release_notes'] as $trn): ?>
                                                <p><b><?php echo $trn['rn_version']; ?></b></p>
                                                <p><?php echo $trn['rn_date']; ?></p>
		                                        <?php echo wpautop($trn['rn_changes']); ?>
	                                        <?php endforeach; ?>
                                        </div>
		                            <?php endif; ?>
	                            <?php endforeach; ?>
                            </div>
                            <!-- .tab_container -->
                        </div>
                    </div>
                </section>
			<?php
		} );

	Block::make( __('FAQ\'s'))
		->add_fields([
			Field::make( 'text', 'faq_heading', __( 'Heading' ) ),
			Field::make( 'complex', 'faq', __( 'FAQ' ) )
			     ->add_fields([
				     Field::make( 'text', 'faq_heading_section', __( 'Section' ) ),
				     Field::make( 'complex', 'tabs', __( '' ) )
				          ->add_fields([
					          Field::make( 'text', 'faq_question', __( 'Question' ) ),
					          Field::make( 'rich_text', 'faq_answer', 'Answer')
				          ])->set_header_template( '<%- faq_question %>'  )->set_collapsed(true),
			     ])->set_header_template( '<%- faq_heading_section %>'  )->set_collapsed(true),
		])->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
                <section class="faqs">
                    <div class="container">
                        <p class="title"><?php echo esc_html($fields['faq_heading']); ?></p>
                        <div class="faqs_wrapper">
                            <?php foreach ($fields['faq'] as $i => $faq): ?>
                                <div class="faqs-item">
                                    <p class="faq-title"><?php echo esc_html($faq['faq_heading_section']); ?></p>
                                    <div class="faqs-accordion">
                                        <?php foreach ($faq['tabs'] as $index => $tab): ?>
                                            <div class="tab">
                                                <input id="tabs<?php echo $i; ?>-<?php echo $index; ?>" type="radio" name="tabs<?php echo $index; ?>">
                                                <label for="tabs<?php echo $i; ?>-<?php echo $index; ?>"><?php echo esc_html($tab['faq_question']); ?></label>
                                                <div class="tab-content">
                                                    <?php echo wpautop($tab['faq_answer']); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
        <?php
		    } );
}