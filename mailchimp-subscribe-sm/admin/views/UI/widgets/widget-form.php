<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="tabs" style="width: 99%; min-width: 400px;">
  <ul class="tab-links">
    <li class="active" style="margin: 0;"><a href="#sf1" class="tab_link">General</a></li>
    <li style="margin: 0;"><a href="#sf2" class="tab_link">Button</a></li>
    <li style="margin: 0;"><a href="#sf3" class="tab_link">Integrations</a></li>
  </ul>
<div class="tab-content" style="box-shadow:none;">
	<div id="sf1" class="tab active">
	<div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
		<h3>Structure</h3>
		<hr>
		<br>
		<label>Layout</label>
		<select class="formLayout">
			<option value="stacked">Stacked</option>
			<option value="inline">Inline</option>
		</select>
		<br><br><hr><br>
		<label>Name Field</label>
		<select class="showNameField">
			<option value="block">Show</option>
			<option value="none">Hide</option>
		</select>
		<br><br><hr><br>
		<h3>Success</h3>
		<hr>
		<br>
		<label>Success Action</label>
		<select class="successAction">
			<option value="redirect">Redirect</option>
			<option value="showMessage">Show Message</option>
		</select>
		<br><br><br><hr><br>
		<label>Success URL</label>
		<input type="URL" class="successURL" style="width: 60%;">
		<br><br><br><br><hr><br>
		<label>Success Message</label>
		<textarea class="successMessage" style="width:60%;"></textarea>
		<br><br><br><hr><br>
	</div>
	</div>
	<div id="sf2" class="tab">
	<div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
		<br>
		<label>Button Text</label>
		<input type="text" class="formBtnText"  placeholder="Button Text">
		<br><br><hr><br>
		<div>
			<h4>Button Height
		        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
		        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
		        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
		    </h4>
			<div class="responsiveOps responsiveOptionsContainterLarge">
				<label></label>
				<input type="number" class="formBtnHeight">px
			</div>
			<div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
				<label></label>
				<input type="number" class="formBtnHeightTablet">px
			</div>
			<div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
				<label></label>
				<input type="number" class="formBtnHeightMobile">px
			</div>
		</div>
        <br><br><hr><br>
        <label>Button Background Color :</label>
		<input type="text" class="color-picker_btn_two formBtnBgColor" id="formBtnBgColor" value='#333333'>
		<br><br><hr><br>
        <label>Hover Background Color :</label>
        <input type="text" class="color-picker_btn_two formBtnHoverBgColor" id="formBtnHoverBgColor" data-alpha='true' value='#333333'>
        <br><br><hr><br>
        <label>Hover Text Color :</label>
        <input type="text" class="color-picker_btn_two formBtnHoverTextColor" id="formBtnHoverTextColor" data-alpha='true' value=''>
        <br><br><hr><br>
        <label>Button Text Color :</label>
        <input type="text" class="color-picker_btn_two formBtnColor" id="formBtnColor">
        <br><br><hr><br>
        <div>
			<h4>Font size
		        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
		        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
		        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
		    </h4>
			<div class="responsiveOps responsiveOptionsContainterLarge">
				<label></label>
				<input type="number" class="formBtnFontSize">px
			</div>
			<div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
				<label></label>
				<input type="number" class="formBtnFontSizeTablet">px
			</div>
			<div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
				<label></label>
				<input type="number" class="formBtnFontSizeMobile">px
			</div>
		</div>
        <br><br><hr><br>
        <label>Border Width: </label>
        <input type="number" class="formBtnBorderWidth">
        <br><br><hr><br>
        <label>Border Color: </label>
        <input type="text" class="color-picker_btn_two formBtnBorderColor" id="formBtnBorderColor" value='#ffffff'>
        <br><br><hr><br>
        <label>Corner Radius: </label>
        <input type="number" class="formBtnBorderRadius" max="100" min="0">
        <br><br><hr><br>
        <label>Button Font :</label>
        <input class="formBtnFontFamily gFontSelectorulpb" id="formBtnFontFamily">
        <br><br><hr><br>
        <label>Select Icon</label>
		<input data-placement="bottomRight" class="icp pbicp-auto formbtnSelectedIconpbicp-auto" value="" type="text" /> 
		<span class="input-group-addon formbtnSelectedIcon" style="font-size: 16px;"></span>
		<br><br><hr><br>
		<label>Icon Position</label>
		<select class="formbtnIconPosition">
			<option value="before">Before Text</option>
			<option value="after">After Text</option>
		</select>
		<br><br><hr><br>
		<label>Icon Gap</label>
		<input type="number" class="formbtnIconGap">px
		<br><br><hr><br>
		<label>Icon Hover Animation</label>
		<select class="formbtnIconAnimation">
			<option value="">None</option>
			<optgroup label="Attention Seekers">
				<option value="bounce">bounce</option>
				<option value="flash">flash</option>
				<option value="pulse">pulse</option>
				<option value="rubberBand">rubberBand</option>
				<option value="shake">shake</option>
				<option value="swing">swing</option>
				<option value="tada">tada</option>
				<option value="wobble">wobble</option>
				<option value="jello">jello</option>
				<option value="flip">flip</option>
			</optgroup>
		</select>
		<br><br><hr><br>
        <label>Success Message Color :</label>
        <input type="text" class="color-picker_btn_two formSuccessMessageColor" id="formSuccessMessageColor">
        <br><br><hr><br>
        <br><br><br><br><br><br><br><br><br><br>
    </div>
	</div>
	<div id="sf3" class="tab">
	<div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
		<?php 
			if (function_exists('smfb_prem_extension_integrations')) {
				smfb_prem_extension_integrations();
			} else if (function_exists('ulpb_prem_extension_integrations')) {
				ulpb_prem_extension_integrations();
			} else{
				?>
					

			        <div class="PB_accordion" style="width:90% !important;">
			            <h4> MailChimp </h4>
			            <div style="width:background:#fff !important;">
			                <div class="pbp_form" style="width: 100%;">
			                    <label>Enable MailChimp</label>
			                    <select class="isMcActive">
			                        <option value="false">No</option>
			                        <option value="true">Yes</option>
			                    </select>
			                    <br><br><br><hr><br>
			                    <label>List ID</label>
			                    <input type="text" class="formDataMailChimpListId" style="width: 200px;">
			                    <br><br><br><br><hr><br>
			                    <label>API Key</label>
			                    <input type="text" class="formDataMailChimpApi" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                </div>
			            </div>
			            <!-- <h4> GetResponse </h4>
			            <div style="width:background:#fff !important;">
			                <div class="pbp_form" style="width: 100%;">
			                    <label>Enable GetResponse</label>
			                    <select class="isGrActive">
			                        <option value="false">No</option>
			                        <option value="true">Yes</option>
			                    </select>
			                    <br><br><br><hr><br>
			                    <label>Account Name</label>
			                    <input type="text" class="GrAccountName" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                    <label>API Key</label>
			                    <input type="text" class="GrApiKey" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                </div>
			            </div>
			            <h4> Campaign Monitor </h4>
			            <div style="width:background:#fff !important;">
			                <div class="pbp_form" style="width: 100%;">
			                    <label>Enable Campaign Monitor</label>
			                    <select class="isCmActive">
			                        <option value="false">No</option>
			                        <option value="true">Yes</option>
			                    </select>
			                    <br><br><br><hr><br>
			                    <label>List ID</label>
			                    <input type="text" class="CmAccountName" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                    <label>API Key</label>
			                    <input type="text" class="CmApiKey" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                </div>
			            </div>
			            <h4> Active Campaign </h4>
			            <div style="width:background:#fff !important;">
			                <div class="pbp_form" style="width: 100%;">
			                    <label>Enable Active Campaign</label>
			                    <select class="isAcActive">
			                        <option value="false">No</option>
			                        <option value="true">Yes</option>
			                    </select>
			                    <br><br><br><hr><br>
			                    <label>List ID</label>
			                    <input type="text" class="AcAccountName" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                    <label>API Key</label>
			                    <input type="text" class="AcApiKey" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                    <label>API URL</label>
			                    <input type="text" class="AcApiURL" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                </div>
			            </div>
			            <h4> Drip </h4>
			            <div style="width:background:#fff !important;">
			                <div class="pbp_form" style="width: 100%;">
			                    <label>Enable Drip</label>
			                    <select class="isDripActive">
			                        <option value="false">No</option>
			                        <option value="true">Yes</option>
			                    </select>
			                    <br><br><br><hr><br>
			                    <label>Account ID</label>
			                    <input type="text" class="DripAccountName" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                    <label>API Token</label>
			                    <input type="text" class="DripApiKey" style="width: 200px;">
			                    <br><br><br><br><br><hr><br>
			                </div>
			            </div> -->
			        </div>

				<?php 
			}
		?>
		
	</div>
	</div>
</div>
</div>
<h3 class="nonPremUserNotice"> Tip You can also sync your form data with MailChimp : <a href="https://pluginops.com/docs/form-builder-integrations/?ref=Optin_formbuilderWidget" target="_blank"> Learn More </a></h3>