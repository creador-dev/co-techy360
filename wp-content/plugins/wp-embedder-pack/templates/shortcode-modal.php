<form method="post" class="wep-form">
	<div class="sidebar">

		{{{icon}}}

		{{#filename}}
		<div class="filename">{{filename}}</div>
		{{/filename}}

		{{#filesize}}
		<div class="filesize">{{filesize}}</div>
		{{/filesize}}

	</div>
	<div class="options">

		<label for="wep-width" class="wep-field-align wep-form-field">
			<?php _e( 'Width', 'wp-embedder-pack' ) ?>:
			<input type="text" name="width" id="wep-width" value="100%">
		</label>

		<label for="wep-height" class="wep-field-align wep-form-field">
			<?php _e( 'Height', 'wp-embedder-pack' ) ?>:
			<input type="text" name="height" id="wep-height" value="400px">
		</label>

		{{#download_able}}

		<label for="wep-download-link" class="wep-field-align wep-form-field">
			<?php _e( 'Download link', 'wp-embedder-pack' ) ?>:

			<select name="download" id="wep-download-link">
				<option value="all"><?php _e( 'All users', 'wp-embedder-pack' ) ?></option>
				<option value="logged-in"><?php _e( 'Logged in', 'wp-embedder-pack' ) ?></option>
				<option value="off"><?php _e( 'Hide', 'wp-embedder-pack' ) ?></option>
			</select>
		</label>

		<label for="wep-download-text" class="wep-field-align wep-form-field">
			<?php _e( 'Download text', 'wp-embedder-pack' ) ?>:

			<input type="text" name="download-text" id="wep-download-text"
			       placeholder="<?php echo bew_translation_get( 'download' ) ?>">
		</label>
		{{/download_able}}

		<label for="wep-url" class="wep-form-field cb last">
			<?php _e( 'Document Url', 'wp-embedder-pack' ) ?>:
			<input type="text" name="url" id="wep-url" value="{{url}}" readonly>
		</label>

		<input type="hidden" name="url" value="{{url}}" readonly>
	</div>
</form>