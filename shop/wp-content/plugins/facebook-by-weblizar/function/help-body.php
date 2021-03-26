<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>	
<div class="block ui-tabs-panel " id="option-general">		
	<div class="col-md-9">
		<div id="heading"><h2><?php _e( 'Facebook Like Box Shortcode Settings', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></h2></div>
			<div class="col-md-6">
			<form name='fb-form' id='fb-form'>
			<p>
				<p><label><?php _e( 'Facebook Page URL', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></label></p>
				<input class="widefat" id="facebook-page-url" name="facebook-page-url" type="text" value="<?php echo esc_attr( $FacebookPageUrl ); ?>">
			</p>
			<br>
			
			<p><label><?php _e( 'Show Faces', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></label>
				<select id="show-fan-faces" name="show-fan-faces">
					<option value="true" <?php if($ShowFaces == "true") echo "selected=selected" ?>><?php _e( 'Yes', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></option>
					<option value="false" <?php if($ShowFaces == "false") echo "selected=selected" ?>><?php _e( 'No', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></option>
				</select>
			</p>
			<br>			
			<p>
				<label><?php _e( 'Show Live Stream', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></label>
				<select id="show-live-stream" name="show-live-stream">
					<option value="true" <?php if($Stream == "true") echo "selected=selected" ?>><?php _e( 'Yes', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></option>
					<option value="false" <?php if($Stream == "false") echo "selected=selected" ?>><?php _e( 'No', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></option>
				</select>
			</p>
			<br>			
			<p>
				<p><label><?php _e( 'Widget Width', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></label></p>
				<input class="widefat" id="widget-width" name="widget-width" type="text" value="<?php echo esc_attr( $Width ); ?>">
			</p>
			<br>			
			<p>
				<p><label><?php _e( 'Widget Height', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></label></p>
				<input class="widefat" id="widget-height" name="widget-height" type="text" value="<?php echo esc_attr( $Height ); ?>">
			</p>
			<br>			
			<p>
				<p><label><?php _e( 'Facebook App ID', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> (<?php _e('Optional', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?>)</label></p>
				<input class="widefat" id="fb-app-id" name="fb-app-id" type="text" value="<?php echo esc_attr( $FbAppId ); ?>">
				<?php _e('Get Your Own Facebook APP Id', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?>: <a href="http://weblizar.com/get-facebook-app-id/" target="_blank"><?php _e( 'HERE', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></a>
			</p>
			<br>
			<p>
				<p><label><?php _e('Select Language for Like Button', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></label></p>
				<!-- <?php					
					if(!isset($locale_fb_like)){
						wp_dropdown_languages( $args = array() );
					}
					else{
						wp_dropdown_languages( $args = array(
							'selected'     => $locale_fb_like,
						) );
					}
					
				?> -->
				<select name="weblizar_locale_fb" id="weblizar_locale_fb">
                    <option value="af_ZA" <?php if($weblizar_locale_fb == "af_ZA") echo 'selected="selected"' ?> ><?php _e('Afrikaans', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ar_AR" <?php if($weblizar_locale_fb == "ar_AR") echo 'selected="selected"' ?> ><?php _e('Arabic', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="az_AZ" <?php if($weblizar_locale_fb == "az_AZ") echo 'selected="selected"' ?> ><?php _e('Azerbaijani', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="be_BY" <?php if($weblizar_locale_fb == "be_BY") echo 'selected="selected"' ?> ><?php _e('Belarusian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="bg_BG" <?php if($weblizar_locale_fb == "bg_BG") echo 'selected="selected"' ?> ><?php _e('Bulgarian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="bn_IN" <?php if($weblizar_locale_fb == "bn_IN") echo 'selected="selected"' ?> ><?php _e('Bengali', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="bs_BA" <?php if($weblizar_locale_fb == "bs_BA") echo 'selected="selected"' ?> ><?php _e('Bosnian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ca_ES" <?php if($weblizar_locale_fb == "ca_ES") echo 'selected="selected"' ?> ><?php _e('Catalan', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="cs_CZ" <?php if($weblizar_locale_fb == "cs_CZ") echo 'selected="selected"' ?> ><?php _e('Czech', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="cy_GB" <?php if($weblizar_locale_fb == "cy_GB") echo 'selected="selected"' ?> ><?php _e('Welsh', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="da_DK" <?php if($weblizar_locale_fb == "da_DK") echo 'selected="selected"' ?> ><?php _e('Danish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="de_DE" <?php if($weblizar_locale_fb == "de_DE") echo 'selected="selected"' ?> ><?php _e('German', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="el_GR" <?php if($weblizar_locale_fb == "el_GR") echo 'selected="selected"' ?> ><?php _e('Greek', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="en_GB" <?php if($weblizar_locale_fb == "en_GB") echo 'selected="selected"' ?> ><?php _e('English (UK)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="en_PI" <?php if($weblizar_locale_fb == "en_PI") echo 'selected="selected"' ?> ><?php _e('English (Pirate)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="en_UD" <?php if($weblizar_locale_fb == "en_UD") echo 'selected="selected"' ?> ><?php _e('English (Upside Down)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="en_US" <?php if($weblizar_locale_fb == "en_US") echo 'selected="selected"' ?> ><?php _e('English (US)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="eo_EO" <?php if($weblizar_locale_fb == "eo_EO") echo 'selected="selected"' ?> ><?php _e('Esperanto', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="es_ES" <?php if($weblizar_locale_fb == "es_ES") echo 'selected="selected"' ?> ><?php _e('Spanish (Spain)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="es_LA" <?php if($weblizar_locale_fb == "es_LA") echo 'selected="selected"' ?> ><?php _e('Spanish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="et_EE" <?php if($weblizar_locale_fb == "et_EE") echo 'selected="selected"' ?> ><?php _e('Estonian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="eu_ES" <?php if($weblizar_locale_fb == "eu_ES") echo 'selected="selected"' ?> ><?php _e('Basque', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="fa_IR" <?php if($weblizar_locale_fb == "fa_IR") echo 'selected="selected"' ?> ><?php _e('Persian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="fb_LT" <?php if($weblizar_locale_fb == "fb_LT") echo 'selected="selected"' ?> ><?php _e('Leet Speak', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="fi_FI" <?php if($weblizar_locale_fb == "fi_FI") echo 'selected="selected"' ?> ><?php _e('Finnish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="fo_FO" <?php if($weblizar_locale_fb == "fo_FO") echo 'selected="selected"' ?> ><?php _e('Faroese', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="fr_CA" <?php if($weblizar_locale_fb == "fr_CA") echo 'selected="selected"' ?> ><?php _e('French (Canada)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="fr_FR" <?php if($weblizar_locale_fb == "fr_FR") echo 'selected="selected"' ?> ><?php _e('French (France)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="fy_NL" <?php if($weblizar_locale_fb == "fy_NL") echo 'selected="selected"' ?> ><?php _e('Frisian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ga_IE" <?php if($weblizar_locale_fb == "ga_IE") echo 'selected="selected"' ?> ><?php _e('Irish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="gl_ES" <?php if($weblizar_locale_fb == "gl_ES") echo 'selected="selected"' ?> ><?php _e('Galician', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="he_IL" <?php if($weblizar_locale_fb == "he_IL") echo 'selected="selected"' ?> ><?php _e('Hebrew', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="hi_IN" <?php if($weblizar_locale_fb == "hi_IN") echo 'selected="selected"' ?> ><?php _e('Hindi', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="hr_HR" <?php if($weblizar_locale_fb == "hr_HR") echo 'selected="selected"' ?> ><?php _e('Croatian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="hu_HU" <?php if($weblizar_locale_fb == "hu_HU") echo 'selected="selected"' ?> ><?php _e('Hungarian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="hy_AM" <?php if($weblizar_locale_fb == "hy_AM") echo 'selected="selected"' ?> ><?php _e('Armenian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="id_ID" <?php if($weblizar_locale_fb == "id_ID") echo 'selected="selected"' ?> ><?php _e('Indonesian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="is_IS" <?php if($weblizar_locale_fb == "is_IS") echo 'selected="selected"' ?> ><?php _e('Icelandic', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="it_IT" <?php if($weblizar_locale_fb == "it_IT") echo 'selected="selected"' ?> ><?php _e('Italian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ja_JP" <?php if($weblizar_locale_fb == "ja_JP") echo 'selected="selected"' ?> ><?php _e('Japanese', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ka_GE" <?php if($weblizar_locale_fb == "ka_GE") echo 'selected="selected"' ?> ><?php _e('Georgian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="km_KH" <?php if($weblizar_locale_fb == "km_KH") echo 'selected="selected"' ?> ><?php _e('Khmer', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ko_KR" <?php if($weblizar_locale_fb == "ko_KR") echo 'selected="selected"' ?> ><?php _e('Korean', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ku_TR" <?php if($weblizar_locale_fb == "ku_TR") echo 'selected="selected"' ?> ><?php _e('Kurdish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="la_VA" <?php if($weblizar_locale_fb == "la_VA") echo 'selected="selected"' ?> ><?php _e('Latin', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="lt_LT" <?php if($weblizar_locale_fb == "lt_LT") echo 'selected="selected"' ?> ><?php _e('Lithuanian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="lv_LV" <?php if($weblizar_locale_fb == "lv_LV") echo 'selected="selected"' ?> ><?php _e('Latvian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="mk_MK" <?php if($weblizar_locale_fb == "mk_MK") echo 'selected="selected"' ?> ><?php _e('Macedonian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ml_IN" <?php if($weblizar_locale_fb == "ml_IN") echo 'selected="selected"' ?> ><?php _e('Malayalam', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ms_MY" <?php if($weblizar_locale_fb == "ms_MY") echo 'selected="selected"' ?> ><?php _e('Malay', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="nb_NO" <?php if($weblizar_locale_fb == "nb_NO") echo 'selected="selected"' ?> ><?php _e('Norwegian (bokmal)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ne_NP" <?php if($weblizar_locale_fb == "ne_NP") echo 'selected="selected"' ?> ><?php _e('Nepali', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="nl_NL" <?php if($weblizar_locale_fb == "nl_NL") echo 'selected="selected"' ?> ><?php _e('Dutch', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="nn_NO" <?php if($weblizar_locale_fb == "nn_NO") echo 'selected="selected"' ?> ><?php _e('Norwegian (nynorsk)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="pa_IN" <?php if($weblizar_locale_fb == "pa_IN") echo 'selected="selected"' ?> ><?php _e('Punjabi', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="pl_PL" <?php if($weblizar_locale_fb == "pl_PL") echo 'selected="selected"' ?> ><?php _e('Polish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ps_AF" <?php if($weblizar_locale_fb == "ps_AF") echo 'selected="selected"' ?> ><?php _e('Pashto', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="pt_BR" <?php if($weblizar_locale_fb == "pt_BR") echo 'selected="selected"' ?> ><?php _e('Portuguese (Brazil)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="pt_PT" <?php if($weblizar_locale_fb == "pt_PT") echo 'selected="selected"' ?> ><?php _e('Portuguese (Portugal)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ro_RO" <?php if($weblizar_locale_fb == "ro_RO") echo 'selected="selected"' ?> ><?php _e('Romanian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ru_RU" <?php if($weblizar_locale_fb == "ru_RU") echo 'selected="selected"' ?> ><?php _e('Russian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="sk_SK" <?php if($weblizar_locale_fb == "sk_SK") echo 'selected="selected"' ?> ><?php _e('Slovak', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="sl_SI" <?php if($weblizar_locale_fb == "sl_SI") echo 'selected="selected"' ?> ><?php _e('Slovenian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="sq_AL" <?php if($weblizar_locale_fb == "sq_AL") echo 'selected="selected"' ?> ><?php _e('Albanian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="sr_RS" <?php if($weblizar_locale_fb == "sr_RS") echo 'selected="selected"' ?> ><?php _e('Serbian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="sv_SE" <?php if($weblizar_locale_fb == "sv_SE") echo 'selected="selected"' ?> ><?php _e('Swedish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="sw_KE" <?php if($weblizar_locale_fb == "sw_KE") echo 'selected="selected"' ?> ><?php _e('Swahili', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="ta_IN" <?php if($weblizar_locale_fb == "ta_IN") echo 'selected="selected"' ?> ><?php _e('Tamil', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="te_IN" <?php if($weblizar_locale_fb == "te_IN") echo 'selected="selected"' ?> ><?php _e('Telugu', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="th_TH" <?php if($weblizar_locale_fb == "th_TH") echo 'selected="selected"' ?> ><?php _e('Thai', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="tl_PH" <?php if($weblizar_locale_fb == "tl_PH") echo 'selected="selected"' ?> ><?php _e('Filipino', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="tr_TR" <?php if($weblizar_locale_fb == "tr_TR") echo 'selected="selected"' ?> ><?php _e('Turkish', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="uk_UA" <?php if($weblizar_locale_fb == "uk_UA") echo 'selected="selected"' ?> ><?php _e('Ukrainian', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="vi_VN" <?php if($weblizar_locale_fb == "vi_VN") echo 'selected="selected"' ?> ><?php _e('Vietnamese', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="zh_CN" <?php if($weblizar_locale_fb == "zh_CN") echo 'selected="selected"' ?> ><?php _e('Simplified Chinese (China)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="zh_HK" <?php if($weblizar_locale_fb == "zh_HK") echo 'selected="selected"' ?> ><?php _e('Traditional Chinese (Hong Kong)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                    <option value="zh_TW" <?php if($weblizar_locale_fb == "zh_TW") echo 'selected="selected"' ?> ><?php _e('Traditional Chinese (Taiwan)', 'WEBLIZAR_FACEBOOK_TEXT_DOMAIN'); ?></option>
                </select>
			</p>
			<br>			
			<p>
				<input onclick="return SaveSettings();" type="button" class="button button-primary button-hero" id="fb-save-settings" name="fb-save-settings" value="<?php _e( 'SAVE', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?>">
			</p>
			<p>
				<div id="fb-img" style="display: none;"><img src="<?php echo WEBLIZAR_FACEBOOK_PLUGIN_URL.'images/loading.gif'; ?>" /></div>
				<div id="fb-msg" style="display: none;" class"alert">
					<?php _e( 'Settings successfully saved. Reloading page for generating preview below.', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?> 
				</div>
			</p>
			<br>
			</form>
			</div>
			<div class="col-md-6">
			<?php
			if($FbAppId && $FacebookPageUrl) { ?>
			<div id="heading">
				<h2><?php _e('Facebook Likebox " [FBW] " Shortcode Preview', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?>  </h2>
			</div>
			<p>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/<?php echo $weblizar_locale_fb; ?>/sdk.js#xfbml=1&appId=<?php echo $FbAppId; ?>&version=v2.0";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="fb-like-box" data-small-header="<?php echo $Header; ?>" data-height="<?php echo $Height; ?>" data-href="<?php echo $FacebookPageUrl; ?>" data-show-border="<?php echo $ShowBorder; ?>" data-show-faces="<?php echo $ShowFaces; ?>" data-stream="<?php echo $Stream; ?>" data-width="<?php echo $Width; ?>" data-force-wall="<?php echo $ForceWall; ?>"></div>
			</p>
			<?php } ?>
		</div>
	</div>
     <div class="col-md-3">   
          <div class="header_feed"><p><?php _e( 'Facebook Feed Pro', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></p>
     </div>
     <div class="update_pro_button"><a target="_blank" href="https://weblizar.com/plugins/facebook-feed-pro/"><?php _e( 'Buy Now $19', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></a></div> 
          <div class="update_pro_image">
               <img class="" src="<?php echo WEBLIZAR_FACEBOOK_PLUGIN_URL."images/fb_pro.jpg"; ?>">
          </div>
          <div class="update_pro_button">
               <a class="upg_anch" target="_blank" href="https://weblizar.com/plugins/facebook-feed-pro/"><?php _e( 'Buy Now $19', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></a>
          </div>
     </div>
</div>


<!---------------- need help tab------------------------>
<div class="block ui-tabs-panel deactive" id="option-needhelp">
	<div class="col-md-12">
		<div id="heading">
			<h2><?php _e('Facebook Feed & Like Box', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></h2>
		</div>		
	</div>
	<div class="col-md-9">	
		<div class="col-md-6 col-xl-6">
			<p><strong><?php _e('Facebook Page Like Box', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong></p>
			<hr>
			<p><strong>1 - <?php _e('Facebook Like Box Widget', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong></p>
			<p><strong>2 - <?php _e('Facebook Like Box Short-code', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> [FBW]</strong></p>
			<hr>
			<p><?php _e('You can use the widget to display your Facebook Like Box in any theme Widget Sections', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?>.</p>
			<p><?php _e('Simple go to your', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> <a href="<?php echo get_site_url(); ?>/wp-admin/widgets.php">
			<strong><?php _e('Widgets', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong></a> <?php _e('section and activate available', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>  
			<strong>"<?php _e('Facebook Like Box', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>" </strong> 
			<?php _e('widget in any sidebar section, like in left sidebar, right sidebar or footer sidebar', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> .</p>
			<br><br>
			
			<p><strong><?php _e('Facebook Like Box Short-Code', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> [FBW]</strong></p>
			<hr>
			<p><strong>[FBW]</strong> <?php _e('Shortcode give ability to display Facebook Like Box in any Page / Post with content', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>.</p>
			<p><?php _e('To use shortcode, just copy ', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?><strong>[FBW]</strong> 
			<?php _e('shortcode and paste into content editor of any Page / Post', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>.</p>		
			
		</div>
		<div class="col-md-6">
			<p><strong><?php _e('Facebook Page Feed', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong></p>
			<hr>
			<p><strong>1 - <?php _e('Facebook Page Feed Widget', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong></p>
			<p><strong>2 - <?php _e('Facebook Page Feed Short-Code', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> [facebook_feed]</strong></p><hr>
			<p><?php _e('You can use the widget to display your Facebook Page Feed in any theme Widget Sections', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>.</p>
			<p><?php _e('Simple go to your', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> 
			<a href="<?php echo get_site_url(); ?>/wp-admin/widgets.php"><strong><?php _e('Widgets', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong></a> 
			<?php _e('section and activate available', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>  
			<strong><?php _e('Facebook Feed & Like Box', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong>
			<?php _e('widget in any sidebar section, like in left sidebar, right sidebar or footer sidebar', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> .</p>
			<br><br>		
			<p><strong><?php _e('Facebook Page Feed Short-Code', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> [facebook_feed]</strong></p>
			<hr>
			<p><strong>[facebook_feed]</strong> <?php _e('shortcode give ability to display Facebook Like Box in any Page / Post with content', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>.</p>
			<p><?php _e('To use shortcode, just copy ', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?><strong>[facebook_feed]</strong> 
			<?php _e('shortcode and paste into content editor of any Page / Post', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>.</p>
		</div>
		<div class="col-md-12 col-xl-12">
			<br><br>
			<p><strong>Q. <?php _e('What is Facebook Page URL', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> ?</strong></p>
			<p><strong> Ans. <?php _e('Facebook Page URL', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> </strong> <?php _e('is your Facebook page your where you promote your business. Here your customers, clients, friends, guests can like, share, comment review your POST', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>.</p>
			<br><br>
			<p><strong>Q. <?php _e('What is Facebook APP ID', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> ?</strong></p>
			<p><strong>Ans. <?php _e('Facebook Application ID', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?></strong>
			<?php _e(' used to authenticate your Facebook Page data & settings. To get your own Facebook APP ID please read our 4 Steps very simple and easy ', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>
			<a href="http://weblizar.com/get-facebook-app-id/" target="_blank"><strong> <?php _e(' Tutorial', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?>.</strong></a>
			</p>
		</div>
	</div>
      <div class="col-md-3">   
          <div class="header_feed"><p><?php _e( 'Facebook Feed Pro', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></p>
     </div>
     <div class="update_pro_button"><a target="_blank" href="https://weblizar.com/plugins/facebook-feed-pro/"><?php _e( 'Buy Now $19', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></a></div> 
          <div class="update_pro_image">
               <img class="" src="<?php echo WEBLIZAR_FACEBOOK_PLUGIN_URL."images/fb_pro.jpg"; ?>">
          </div>
          <div class="update_pro_button">
               <a class="upg_anch" target="_blank" href="https://weblizar.com/plugins/facebook-feed-pro/"><?php _e( 'Buy Now $19', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></a>
          </div>
     </div>
</div>
<!---------------- our product tab------------------------>
<div class="block ui-tabs-panel deactive" id="option-upgradetopro">
	<div class="row-fluid pricing-table pricing-three-column">
		<div id="get_pro-settings" class="container-fluid top get_pro-settings">
			<div class="col-md-12 form-group cs-back">	
				<div class="ms-links">
					<div class="cs-top">	
						<h2> <?php _e('Facebook Feed Pro', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> </h2>				
					</div>
					<div class="row">
						<ul class="cs-desc col-md-6  col-sm-12 col-xs-12">
							<li> <?php _e('Unlimited Profile, Page & Group Feeds', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> </li>
							<li> <?php _e('Unlimited Feeds Per Page/Post', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> </li>
							<li><?php _e('Light-Box Layouts 9+', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Tons of Feed Short-Code', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Specific Content Facebook Feeds', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Many Loading & Hover CSS Effect', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Auto-Update Feeds', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
						</ul>
						<ul class="cs-desc col-md-6  col-sm-12 col-xs-12">
							<li><?php _e('Top Level & Stream Type Comment Display', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Sharing On Social Media', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('No Code Require', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Feed Widgets', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Like & Share Button For Each Feed in Like-box', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Fast & Friendly Support', WEBLIZAR_FACEBOOK_TEXT_DOMAIN);?> </li>
							<li><?php _e('Fully Responsive And Optimized', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> </li>
						</ul>
					</div>
					<div class="col-md-12 row link-cont">
						<div class="col-md-4 col-sm-4 ms-btn">
							<b><?php _e('Try Live Demo', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></b>
							<a class="btn" target="_blank" href="http://demo.weblizar.com/facebook-feed-pro/" rel="nofollow"><?php _e('Click Here', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></a>
						</div>
						<div class="col-md-4 col-sm-4 ms-btn">
							<b><?php _e('Try Before Buy Using Admin Demo', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></b>
							<a class="btn" target="_new" href="http://demo.weblizar.com/facebook-feed-pro-admin/" rel="nofollow"><?php _e('Click Here', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?></a>
							<br><span><b>Username:</b> userdemo</span><br><span><b>Password:</b> userdemo</span>
						</div>
						<div class="col-md-4 col-sm-4 ms-btn">					
							<a href="https://weblizar.com/plugins/facebook-feed-pro/" target="_blank" class="button-face"><?php _e('Buy Now ($19)', WEBLIZAR_FACEBOOK_TEXT_DOMAIN); ?> </a>
						</div>
					</div>
					<div class="row-fluid ">
						<div class="col-md-12"> <a href="http://demo.weblizar.com/facebook-feed-pro/" target="_blank">
						<img style="width:100%" src="<?php echo WEBLIZAR_FACEBOOK_PLUGIN_URL.'images/facebook-full-feature.jpg'; ?>" class="img-responsive"/></a></div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
<div class="block ui-tabs-panel deactive" id="option-fbadmin">
	<div class="row-fluid ">
		<div class="col-md-9"> <a href="http://demo.weblizar.com/facebook-feed-pro/" target="_blank"><img src="<?php echo WEBLIZAR_FACEBOOK_PLUGIN_URL.'images/feed-tab-img.jpg'; ?>" class="img-responsive"/></a>
          </div>
          <div class="col-md-3">   
          <div class="header_feed"><p><?php _e( 'Facebook Feed Pro', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></p>
     </div>
     <div class="update_pro_button"><a target="_blank" href="https://weblizar.com/plugins/facebook-feed-pro/"><?php _e( 'Buy Now $19', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></a></div> 
          <div class="update_pro_image">
               <img class="" src="<?php echo WEBLIZAR_FACEBOOK_PLUGIN_URL."images/fb_pro.jpg"; ?>">
          </div>
          <div class="update_pro_button">
               <a class="upg_anch" target="_blank" href="https://weblizar.com/plugins/facebook-feed-pro/"><?php _e( 'Buy Now $19', WEBLIZAR_FACEBOOK_TEXT_DOMAIN ); ?></a>
          </div>
     </div>
	</div>
</div>
<!--Our product page start here-->
<div class="block ui-tabs-panel deactive" id="option-ourproduct">
	<?php wp_enqueue_style('feed-font-awesome-min-css', WEBLIZAR_FACEBOOK_PLUGIN_URL.'css/font-awesome-latest-5/css/fontawesome-all.min.css'); ?>
<div class="container col-container p-3">
	<div class="row text-center">
		<div class="col-sm-12 col-md-12">
			<img width="200" src="https://weblizar.com/wp-content/uploads/2016/04/logo.png" />
			<h2>Responsive WordPress Premium Themes & Plugins</h2>
			<hr>
		</div>
	</div>
	<div class="row p-3">
		<div class="col-sm-12 col-md-12 text-center">
			<a class="" href="" target="_new"><h3>Pro Plugins</h3></a>
		</div>
	</div>
	<div class="row text-center">
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Facebook Feed</h4>
			<p class="icon-size"><i class="fab fa-facebook-f"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/facebook-by-weblizar/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/facebook-feed-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/facebook-feed-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Pinterest Feed</h4>
			<p class="icon-size"><i class="fab fa-pinterest-p"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/weblizar-pinterest-feeds/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/pinterest-feed-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/pinterest-feed-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Appointment Scheduler</h4>
			<p class="icon-size"><i class="far fa-clock"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/appointment-scheduler-weblizar/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/appointment-scheduler-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/appointment-scheduler-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>SEO Image Optimizer</h4>
			<p class="icon-size"><i class="fab fa-searchengin"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/seo-image-optimizer/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/seo-image-optimizer-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/seo-image-optimizer-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Newsletter Subscription Form</h4>
			<p class="icon-size"><i class="fab fa-wpforms"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/newsletter-subscription-form/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/newsletter-subscription-form-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/newsletter-subscription-form-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Coming Soon Page</h4>
			<p class="icon-size"><i class="fas fa-rocket"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/responsive-coming-soon-page/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/coming-soon-page-maintenance-mode-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/coming-soon-page-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Recent Related Post</h4>
			<p class="icon-size"><i class="far fa-newspaper"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/recent-related-post-and-page/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/recent-related-post-and-page-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/recent-related-post-and-page-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>About Author</h4>
			<p class="icon-size"><i class="fas fa-id-card"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/about-author/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/facebook-feed-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/about-author-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Gallery Pro</h4>
			<p class="icon-size"><i class="far fa-images"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/gallery-pro/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/gallery-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/gallery-pro-by-weblizar/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Ultimate Image Slider</h4>
			<p class="icon-size"><i class="fab fa-slideshare"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/unlimited-responsive-image-slider/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/ultimate-responsive-image-slider-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Photo Video Link Gallery</h4>
			<p class="icon-size"><i class="far fa-file-video"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/photo-video-link-gallery/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/photo-video-link-gallery-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/photo-video-link-gallery-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Flickr Album Gallery</h4>
			<p class="icon-size"><i class="fab fa-flickr"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/photo-gallery-for-flickr/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/flickr-album-gallery-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/flickr-album-gallery-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Responsive Portfolio</h4>
			<p class="icon-size"><i class="fas fa-film"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/responsive-portfolio/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/responsive-portfolio-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/responsive-portfolio-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Lightbox Slider</h4>
			<p class="icon-size"><i class="far fa-image"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/lightbox-slider/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/lightbox-slider-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/lightbox-slider-pro-demo/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Responsive Photo Gallery</h4>
			<p class="icon-size"><i class="fas fa-camera-retro"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/responsive-gallery-with-lightbox/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/responsive-photo-gallery-pro/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/responsive-photo-gallery-pro/" target="_new" title="Plugin Demo"><i class="fas fa-eye"></i></a>
		</div>	
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Clock In Portal</h4>
			<p class="icon-size"><i class="far fa-clock"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/plugins/clock-in-portal/" target="_new" title="Download Plugin"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/plugins/clockin-pro-plugin/" target="_new" title="Plugin Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/clockin-pro-admin/wp-login.php?redirect_to=http%3A%2F%2Fdemo.weblizar.com%2Fclockin-pro-admin%2Fwp-admin%2F&reauth=1" target="_new" title="Admin Demo"><i class="fas fa-eye"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/clockin-pro-admin/wp-login.php?redirect_to=http%3A%2F%2Fdemo.weblizar.com%2Fclockin-pro-admin%2Fwp-admin%2F&reauth=1" target="_new" title="Staff Demo"><i class="fas fa-eye"></i></a>
		</div>		
	</div>
	
	<!-- Themes -->
	<div class="row p-3">
		<div class="col-sm-12 col-md-12 text-center">
			<a class="" href="" target="_new"><h3>Premium Themes</h3></a>
		</div>
	</div>
	<div class="row text-center">
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>RealEstate Premium</h4>
			<p class="icon-size"><i class="far fa-building"></i></p>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/realestate-wordpress-premium-theme/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/realestate-premium/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Personal Premium</h4>
			<p class="icon-size"><i class="fas fa-users"></i></p>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/personal-premium-theme/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/personal-premium/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>

		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Katelyn Premium</h4>
			<p class="icon-size"><i class="fab fa-korvue"></i></p>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/themes/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/themes/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/themes/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Corporal Premium</h4>
			<p class="icon-size"><i class="fas fa-briefcase"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/best-free-wordpress-themes/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/corporal-premium/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/corporal-premium/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Explora Premium</h4>
			<p class="icon-size"><i class="fas fa-road"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/best-free-wordpress-themes/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#explora" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Scoreline Premium</h4>
			<p class="icon-size"><i class="fas fa-chart-line"></i></p>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/scoreline-premium/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#scoreline" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Beautyspa Premium</h4>
			<p class="icon-size"><i class="fas fa-tint"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/best-free-wordpress-themes/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#beautyspa" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/beautyspa-premium/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Healthcare Premium</h4>
			<p class="icon-size"><i class="fas fa-heartbeat"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/themes/search/weblizar/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#healthcare" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/healthcare/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Enigma Premium</h4>
			<p class="icon-size"><i class="far fa-gem"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/themes/search/weblizar/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/enigma-premium/enigma-select/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/enigma-premium/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Creative Premium</h4>
			<p class="icon-size"><i class="fas fa-industry"></i></p>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Incredible Premium</h4>
			<p class="icon-size"><i class="far fa-chart-bar"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/best-free-wordpress-themes/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/creative-premium/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#creative" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Chronicle Premium</h4>
			<p class="icon-size"><i class="fab fa-cuttlefish"></i></p>
			<a class="btn btn-secondary btn-sm" href="__" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/chronicle-premium-theme/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#chronicle" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Guardian Premium</h4>
			<p class="icon-size"><i class="fas fa-user-plus"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/themes/search/weblizar/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/guardian-premium-theme/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#guardian" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Green Lantern Premium</h4>
			<p class="icon-size"><i class="fab fa-pagelines"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://wordpress.org/themes/search/weblizar/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/green-lantern-premium-theme/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#greenlantern" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Weblizar Premium</h4>
			<p class="icon-size"><i class="fas fa-globe"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/best-free-wordpress-themes/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/weblizar-premium-theme/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/preview/#weblizar" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>	
		<div class="col products col-sm-6 col-md-4 p-3">
			<h4>Love Wedding Premium</h4>
			<p class="icon-size"><i class="fas fa-heart"></i></p>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/best-free-wordpress-themes/" target="_new" title="Download Theme"><i class="fas fa-download"></i></a>
			<a class="btn btn-secondary btn-sm" href="https://weblizar.com/themes/love-wedding-premium-theme/" target="_new" title="Theme Details"><i class="fas fa-info"></i></a>
			<a class="btn btn-secondary btn-sm" href="http://demo.weblizar.com/love-wedding/" target="_new" title="Theme Demo"><i class="fas fa-eye"></i></a>
		</div>		
	</div>
	
	<!-- footer -->
	<div class="row m-3">
		<div class="col-sm-12 col-md-12 text-center">
			<a href="http://www.weblizar.com" target="_new" class="btn btn-primary btn-lg dmobtn">WWW.WEBLIZAR.COM</a>
		</div>
	</div>
</div>
<!--Our product page end here-->
<style>
.col-container {
	
    display: table; /* Make the container element behave like a table */
    width: 100%; /* Set full-width to expand the whole page */
}

.col {
    display: table-cell; /* Make elements inside the container behave like table cells */
}
.icon-size {
	font-size: 52px;
	color: darkorchid;
}

.products {
	border: 4px solid #FFF;
	background-color: #E9ECEF;
}
.col.products {
    padding-bottom: 15px;
    padding-top: 15px;
}
.feed-head-cont h3 {
   
     text-shadow: none
}
.update_pro_button {
    background-color: orange;
    padding: 10px;
    color: #fff;
    text-decoration: none;
    text-align: center;
    font-weight: 700;
}
.header_feed {
    background-color: #384244;
    color: #fff;
    text-align: center;
    font-weight: 800;
    padding: 18px;
    font-size: 29;
}
.update_pro_image img {
    width: 100%;
}
.update_pro_button a {
    text-decoration: none;
    color: #fff;
    font-size: 18px;
}
.header_feed p {
    font-size: 22px;
}
</style>
</div>