jQuery(document).ready(function($){
	"use strict";
	$("#advncps_show_hide").on('change', function(){
		var getImgVal = $(this).val();

		if(getImgVal  == 2){

			$("#img_controller").hide();

		}

		if(getImgVal  == 1){

			$("#img_controller").show();

		}
		
	});

	$("#advncps_show_excerpt").on('change', function(){
		var getVal = $(this).val();
		if(getVal == "excerpt"){

			$(".excerpt_details").show();
			$("#advncps_excerpt_color_area").show();

		}
		else
		{
			$(".excerpt_details").hide();
			$("#advncps_excerpt_color_area").hide();	
		}
	});

	var getVal2 = $("#advncps_show_excerpt").val();
	if(getVal2 == "excerpt"){

		$(".excerpt_details").show();
		$("#advncps_excerpt_color_area").show();	

	}

	$("#advncps_image_size").on('change', function(){

		var getVal3 = $(this).val();
		if(getVal3 == "custom"){

			$(".custom_details").show();

		}
		else
		{
			$(".custom_details").hide();	
		}
		
	});


	var custom_size = $("#advncps_image_size").val();
	if(custom_size == "custom"){

		$(".custom_details").show();

	}
});