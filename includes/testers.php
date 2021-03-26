<script type="text/javascript" src="http://lalanii.com/scripts/ckeditor/ckeditor.js"></script>
<textarea id="inputAdd" name="blogDetail" style="width:700px; height:400px"><? echo $blogDetail; ?></textarea>
					<script>
						CKEDITOR.replace( 'inputAdd' );
						CKEDITOR.config.removePlugins = 'about,flash,iframe,forms,stylescombo';						
						CKEDITOR.config.filebrowserImageBrowseUrl= 'http://lalanii.com/includes/imagemanager.php';
						CKEDITOR.config.filebrowserWindowWidth='650';
						CKEDITOR.config.filebrowserWindowHeight='480';				
					</script>