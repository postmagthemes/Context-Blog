<?php
/**
 * This template to show dropdown category list
 *
 * @package context-blog
 */

if ( ! class_exists( 'context_blog_My_Dropdown_Category_Control' ) ) :
	class context_blog_My_Dropdown_Category_Control extends WP_Customize_Control {


		public $type = 'dropdown-category';

		protected $dropdown_args = false;

		protected function render_content() {
			?><label>
			<?php

			if ( ! empty( $this->label ) ) :
				?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php
endif;

			if ( ! empty( $this->description ) ) :
				?>
	<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php
endif;

			$dropdown_args = wp_parse_args(
				$this->dropdown_args,
				array(
					'taxonomy'          => 'category',
					'show_option_all'   => __( 'Among all the categories', 'context-blog' ),
					'orderby'           => 'name',
					'order'             => 'ASC',
					'show_count'        => 1,
					'hide_empty'        => 1,
					'echo'              => 1,
					'child_of'          => 0,
					'exclude'           => '',
					'hierarchical'      => 1,
					'id'                => $this->id,
					'depth'             => 0,
					'tab_index'         => 0,
					'hide_if_empty'     => false,
					'option_none_value' => 0,
					'value_field'       => 'term_id',
				)
			);

			$dropdown_args['echo'] = false;

			$dropdown = wp_dropdown_categories( $dropdown_args );
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
			echo ( $dropdown );

			?>
			</label>
			<?php

		}
	}
endif;