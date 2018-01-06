<div class="modal fade" id="locationSelect" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'flatter'); ?></span></button>
            	<h4 class="modal-title" id="myModalLabel"><i class="fa fa-map-marker clr"></i> <?php _e('Find by location', 'flatter'); ?></h4>
          	</div>
          	
            <div class="modal-body clearfix">
            	<form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
                <input type="hidden" name="page" value="search"/>
                <?php $conn = getConnection(); $aStates = $conn->osc_dbFetchResults("SELECT * FROM %st_country ", DB_TABLE_PREFIX); ?>
                <?php if (count($aStates) >= 0 ) { ?>
                <div class="col-md-4 col-sm-4">
                <select id="countryId" name="sCountry" class="form-control">
                    <option value=""><?php _e("Select a country..."); ?></option>
                    <?php foreach($aStates as $state) { ?> 
                    <option value="<?php echo $state['pk_c_code']; ?>"><?php echo $state['s_name'] ; ?></option>
                    <?php } ?>
                </select>
                </div>
                <?php } ?>
                
                <?php $aRegions = Region::newInstance()->getByCountry($countryId);  
				if( count($aRegions) >= 0 ) { ?>
                <div class="col-md-4 col-sm-4">
                <select id="regionId" name="sRegion" class="form-control">
                    <option value=""><?php _e("Select a region..."); ?></option>
                    <?php foreach($aRegions as $region) { ?>
                    <option id="idregioni"  value="<?php echo $region['pk_i_id']; ?>"<?php if(Params::getParam('sRegion') == $region['pk_i_id']) { ?>selected<?php } ?>><?php echo $region['s_name']; ?></option>
                    <?php } ?>
                </select>
                </div>
                <?php } ?>
                
                <?php 
				$aCities = City::newInstance()->getByRegion($cityId);
				if (count($aCities) >= 0 ) {?>
                <div class="col-md-4 col-sm-4">
                <select name="sCity" id="cityId" class="form-control"> 
                    <option value=""><?php _e("Select a city..."); ?></option>
                    <?php foreach($aCities as $city) { ?>      
                    <option value="<?php echo $city['pk_i_id']; ?>"<?php if(Params::getParam('sCity') == $city['pk_i_id']) { ?>selected<?php } ?>><?php echo $city['s_name'] ; ?></option>
                    <?php } ?>
                </select>
                </div>
                <?php } ?> 
                
          	</div>
          	<div class="modal-footer">
            	<button type="submit" id="submit" class="btn btn-clr"><?php _e("Search", 'flatter');?></button>
          	</div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
	$("#countryId").off('change').on("change",function(){
		var self = $(this);
		var pk_c_code = self.val();
		var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
		var result = '';

		if(pk_c_code != '') {

			setProcessingSelectText(self);
			setProcessingSelectText($("#regionId"));
			self.attr('disabled',true);

			$("#regionId").attr('disabled',true);
			$("#cityId").attr('disabled',true);

			$.ajax({
				type: "POST",
				url: url,
				dataType: 'json',
				success: function(data){
					var length = data.length;

					if(length > 0) {

						result += '<option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option>';
						for(key in data) {
							result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
						}

						$("input#regionId").remove();
						$("#region").before('<select class="form-control" name="regionId" id="regionId" ></select>');
						$("#region").remove();

						$("input#cityId").remove();
						$("#city").before('<select class="form-control" name="cityId" id="cityId" ></select>');
						$("#city").remove();

						$("#regionId").val("");

						setRegionEvent();
					} else {

						$("#regionId").before('<input class="form-control" type="text" name="region" id="region" />');
						$("#regionId").after('<input class="form-control" id="regionId" type="hidden" name="regionId" value="">');
						$("#regionId").remove();

						$("#cityId").before('<input class="form-control" type="text" name="city" id="city" />');
						$("#cityId").after('<input class="form-control" id="cityId" type="hidden" name="cityId" value="">');
						$("#cityId").remove();

					}

					self.attr('disabled',false);
					$("#regionId").attr('disabled',false);
					$("#cityId").attr('disabled',false);
					$("#regionId").html(result);
					$("#cityId").html('<option selected value=""><?php _e("Select a city..."); ?></option>');

					setNormalSelectText(self);
					setNormalSelectText($("#regionId"));
				}
			});

		} else {

			// add empty select
			$("#region").before('<select class="form-control" name="regionId" id="regionId" ><option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option></select>');
			$("#region").remove();

			$("#city").before('<select class="form-control" name="cityId" id="cityId" ><option value=""><?php echo osc_esc_js(__("Select a city...")); ?></option></select>');
			$("#city").remove();

			if( $("#regionId").length > 0 ){
				$("#regionId").html('<option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option>');
			} else {
				$("#region").before('<select class="form-control" name="regionId" id="regionId" ><option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option></select>');
				$("#region").remove();
			}
			if( $("#cityId").length > 0 ){
				$("#cityId").html('<option value=""><?php echo osc_esc_js(__("Select a city...")); ?></option>');
			} else {
				$("#city").before('<select name="cityId" class="form-control" id="cityId" ><option value=""><?php echo osc_esc_js(__("Select a city...")); ?></option></select>');
				$("#city").remove();
			}

			$("#regionId").attr('disabled',true);
			$("#cityId").attr('disabled',true);
		}

	});

	if( $("#regionId").prop('value') == "") {
		$("#cityId").prop('disabled',true);
	} else {
		setRegionEvent();
	}

	if($("#countryId").length != 0) {
		if( $("#countryId").prop('type').match(/select-one/) ) {
			if( $("#countryId").prop('value') == "") {
				$("#regionId").prop('disabled',true);
			}
		}
	}


});

function setRegionEvent(){
	$("#regionId").off('change').on("change",function(){
		var self = $(this);
		var pk_c_code = self.val();

		<?php if(OC_ADMIN) { ?>
		var url = '<?php echo osc_admin_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
		<?php } else { ?>
		var url = '<?php echo osc_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
		<?php }; ?>

		var result = '';

		if(pk_c_code != '') {

			setProcessingSelectText(self);
			setProcessingSelectText($("#cityId"));
			self.attr('disabled',true);
			$("#cityId").attr('disabled',true);

			$.ajax({
				type: "POST",
				url: url,
				dataType: 'json',
				success: function(data){
					var length = data.length;
					if(length > 0) {
						result += '<option selected value=""><?php echo osc_esc_js(__("Select a city...")); ?></option>';
						for(key in data) {
							result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
						}

						$("#city").before('<select class="form-control" name="cityId" id="cityId" ></select>');
						$("#city").remove();
					} else {
						result += '<option value=""><?php echo osc_esc_js(__('No results')); ?></option>';
						$("#cityId").before('<input type="text" class="form-control" name="city" id="city" />');
						$("#cityId").remove();
					}
					$("#cityId").html(result);

					setNormalSelectText(self);
					setNormalSelectText($("#cityId"));
					$("#cityId").attr('disabled',false);
					self.attr('disabled',false);
				}
			});
		} else {
			$("#cityId").prop('disabled',true);
		}
	});
}

function setProcessingSelectText($elem){
	var current_text = $elem.find('option').eq(0).text();
	$elem.data('text-select',current_text).find('option').eq(0).text('<?php _e('Loading...','flatter'); ?>');
}

function setNormalSelectText($elem){
	$elem.find('option').eq(0).text($elem.data('text-select'));
}

</script>