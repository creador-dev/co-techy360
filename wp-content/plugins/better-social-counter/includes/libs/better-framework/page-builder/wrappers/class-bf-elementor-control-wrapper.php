<?php


class BF_Elementor_Control_Wrapper extends \Elementor\Base_Data_Control {

	/**
	 * @var string
	 */
	public $bf_field_type;


	/**
	 * Get emoji one area control type.
	 *
	 * Retrieve the control type, in this case `emojionearea`.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {

		return $this->bf_field_type;
	}


	/**
	 * Enqueue emoji one area control scripts and styles.
	 *
	 * Used to register and enqueue custom scripts and styles used by the emoji one
	 * area control.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function enqueue() {
	}


	/**
	 * Get emoji one area control default settings.
	 *
	 * Retrieve the default settings of the emoji one area control. Used to return
	 * the default settings while initializing the emoji one area control.
	 *
	 * @since  1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {

		return array();
	}


	/**
	 * Render emoji one area control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function content_template() {

		$control_uid = $this->get_control_uid();
		?>

		<div class="elementor-control-field">
			<label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">
				{{{ data.label }}}
			</label>
			<div class="elementor-control-input-wrapper">
				<?php
				$this->render_field();
				?>
			</div>
		</div>
		<# if ( data.description ) { #>
			<div class="elementor-control-field-description">{{{ data.description }}}</div>
			<# } #>
		<?php
	}


	/**
	 * @param string $field_type
	 */
	public function set_bf_field_type( $field_type ) {

		$this->bf_field_type = $field_type;
	}


	/**
	 * @return string
	 */
	public function get_bf_field_type() {

		return $this->bf_field_type;
	}


	/**
	 *
	 */
	protected function render_field() {

		$fields_dir = BF_PATH . 'core/field-generator/fields/';
		$field_file = sprintf( '%s.php', $this->bf_field_type );


		$options = array(
			'value'      => '',
			'input_name' => '___INPUT_NAME_PLACEHOLDER___',
		);

		ob_start();

		include $fields_dir . $field_file;

		$field_markup = ob_get_clean();

		echo $this->embed_unique_id( $field_markup );
	}


	/**
	 * @param string $html
	 *
	 * @return html
	 */
	public function embed_unique_id( $html ) {


		$pattern = '/(
			\< \s*   [a-z]+    [^\>]*
				name\s*=\s*
				([\'\"])?
				___INPUT_NAME_PLACEHOLDER___
				(?(2) \\2)
				[^\>]*
			\>)/isx';

		return preg_replace_callback( $pattern, array( $this, 'embed_unique_id_in_field' ), $html );
	}


	public function embed_unique_id_in_field( $matches ) {

		$field          = $matches[1];
		$modified_field = preg_replace( '/ id\s*=\s* ([^\s\>]+)/isx', 'id="' . $this->get_control_uid() . '"', $field );

		if ( $modified_field !== $field ) {
			return $modified_field;
		}

		return preg_replace( '/(.+)\>/', '$1 id="' . $this->get_control_uid() . '">', $field );
	}
}
