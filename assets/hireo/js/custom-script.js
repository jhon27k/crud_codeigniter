var baseURL= window.location.origin+'/ipok/';
var baseURL_post= window.location.origin+'/ipok/admin/';
var defaultDate = '01/01/2001';
$(document).ajaxStart(function() { Pace.restart(); });
$(function() {


	$('.timepicker_clnc1').timepicker({
										minuteStep :1,

										});


	$('#sandbox-container input').datepicker({
	    autoclose: true,
	    endDate: "-18y" ,
	    startDate:"-100y"
	});

	$('#sandbox-container input').on('show', function(e){
	    console.debug('show', e.date, $(this).data('stickyDate'));

	    if ( e.date ) {
	         $(this).data('stickyDate', e.date);
	    }
	    else {
	         $(this).data('stickyDate', null);
	    }
	});

	$('#sandbox-container input').on('hide', function(e){
	    console.debug('hide', e.date, $(this).data('stickyDate'));
	    var stickyDate = $(this).data('stickyDate');

	    if ( !e.date && stickyDate ) {
	        console.debug('restore stickyDate', stickyDate);
	        $(this).datepicker('setDate', stickyDate);
	        $(this).data('stickyDate', null);
	    }
	});
	$( "form.validate" ).submit(function( event ) {

	var access = true;
	$(this).find('.required').each(function() {
		var v = $(this).val();
             console.log(v);
		if(v === null) v='';
		if((v.replace(/\s+/g, '')) === '') {
			//alert('e');
			access = false;
			$(this).parents(".form-group").addClass("has-error");
		}
		else {
			//alert('s');
			$(this).parents(".form-group").removeClass("has-error");
		}
	});
	if(access) {
		return;
	}
	else {
		$("html, body").animate({ scrollTop: $('.has-error').offset().top - 50 }, "slow");
	}
	event.preventDefault();

	});


	// window.Parsley
	//   .addValidator('emailalreadyexist', {
	//    requirementType: 'string',
	//     validateString: function(value) {
	//       var url = baseURL_post+'ManageDoctors/exist';
	//       var data = {'email':value};
	//       var res_post_ajax = post_ajax(url, data);
	//
	//       var jsonResult=jQuery.parseJSON(res_post_ajax);
	//
	//       if(jsonResult.message != 'success'){
	//       	return false;
	//       }
	//       else if(jsonResult.message == 'success'){
	//       	return true;
	//       }
	//     },
	//     messages: {
	//       en: 'Email Id already exist'
	//     }
	// });


	// window.Parsley
	//   .addValidator('unamealreadyexist', {
	//    requirementType: 'string',
	//     validateString: function(value) {
	//       var url = baseURL_post+'ManageDoctors/exist';
	//       var data = {'username':value};
	//       var res_post_ajax = post_ajax(url, data);
	//       var jsonResult=jQuery.parseJSON(res_post_ajax);
	//       if(jsonResult.message != 'success'){
	//       	return false;
	//       }
	//       else if(jsonResult.message == 'success'){
	//       	return true;
	//       }
	//     },
	//     messages: {
	//       en: 'Username already exist'
	//
	//     }
	// });



	// window.Parsley
	//   .addValidator('clncemailalreadyexist', {
	//    requirementType: 'string',
	//     validateString: function(value) {
	//       var url = baseURL_post+'ManageClinic/exist';
	//       var data = {'email':value};
	//       var res_post_ajax = post_ajax(url, data);
	//       var jsonResult=jQuery.parseJSON(res_post_ajax);
	//       if(jsonResult.message != 'success'){
	//       	return false;
	//       }
	//       else if(jsonResult.message == 'success'){
	//       	return true;
	//       }
	//     },
	//     messages: {
	//       en: 'Email Id already exist'
	//
	//     }
	// });



	// window.Parsley
	//   .addValidator('clncunamealreadyexist', {
	//    requirementType: 'string',
	//     validateString: function(value) {
	//       var url = baseURL_post+'ManageClinic/exist';
	//       var data = {'username':value};
	//       var res_post_ajax = post_ajax(url, data);
	//       var jsonResult=jQuery.parseJSON(res_post_ajax);
	//       if(jsonResult.message != 'success'){
	//       	return false;
	//       }
	//       else if(jsonResult.message == 'success'){
	//       	return true;
	//       }
	//     },
	//     messages: {
	//       en: 'Username already exist'
	//
	//     }
	// });

	// window.Parsley.addValidator('cep', {
  //   requirementType: 'string',
  //   validateString: function(value, requirement)
  //   {
  //       var obj = {'cep':value};
  //       var status;
  //       var result = post_ajax(baseURL_post+'ManageDoctors/check_cep',obj);
  //       var items = JSON.parse(result);
  //       console.log(items);
  //       if(items.erro!==true)
  //       {
  //         status = true;
  //       }
  //       else
  //       {
  //         status = false;
  //       }
  //       return status;
  //     },
  //     messages: { en: 'Invalid CEP'  }
  //   });








		// window.Parsley
		//   .addValidator('mintime', {
		//    requirementType: 'string',
		//     validateString: function(value, requirement) {
		//
		//       	var time1 = defaultDate+' '+value;
		// 		var time2 = defaultDate+' '+$(requirement).val();
		// 		var date1 = Date.parse(time1);
		// 		var date2 = Date.parse(time2);
		// 		if(date1 > date2){
		// 			return true;
		// 		}
		// 		else{
		//
		//       		return false;
		// 		}
		//
		//
		//     },
		//     messages: {
		//       en: 'Time should greater than '
		//
		//     }
		// });


		// window.Parsley
		//   .addValidator('endfrom', {
		//    requirementType: 'string',
		//     validateString: function(value, requirement) {
		//
		//       	var time1 = defaultDate+' '+value;//breakfrom
		// 		var time2 = defaultDate+' '+$(requirement).val();//starttime
		// 		var time3 = defaultDate+' '+$("input[demo_end="+requirement+"]").val();//endtime
		// 		var date1 = Date.parse(time1);
		// 		var date2 = Date.parse(time2);
		// 		var date3 = Date.parse(time3);
		// 		if((date1 > date2) && (date1 < date3)){
		// 			return true;
		// 		}
		// 		else{
		//
		//       		return false;
		// 		}
		//
		//
		//     },
		//     messages: {
		//       en: 'between start and end time '
		//
		//     }
		// });

		//   window.Parsley
		//   .addValidator('startfrom', {
		//    requirementType: 'string',
		//     validateString: function(value, requirement) {
		//       	var time1 = defaultDate+' '+value;//break to
		// 		var time2 = defaultDate+' '+$("input[name="+requirement+"]").val();//end
		// 		var time3 = defaultDate+' '+$("input[demo_start="+requirement+"]").val();//start
		// 		var date1 = Date.parse(time1);
		// 		var date2 = Date.parse(time2);
		// 		var date3 = Date.parse(time3);
		// 		if((date1 > date3) && (date1 < date2)){
		// 			return true;
		// 		}
		// 		else{
		//
		//       		return false;
		// 		}
		//
		//
		//     },
		//     messages: {
		//       en: 'between start and end time '
		//
		//     }
		// });

		//   window.Parsley
		//   .addValidator('breakto', {
		//    requirementType: 'string',
		//     validateString: function(value, requirement) {
		//       	var time1 = defaultDate+' '+value;//break to
		// 		var time2 = defaultDate+' '+$(requirement).val();//end
		//
		// 		var date1 = Date.parse(time1);
		// 		var date2 = Date.parse(time2);
		// 		if(date1 > date2){
		// 			return true;
		// 		}
		// 		else{
		//
		//       		return false;
		// 		}
		//
		//
		//     },
		//     messages: {
		//       en: 'should greater than break from'
		//
		//     }
		// });


		//   window.Parsley.addValidator('cpf', {
    // requirementType: 'string',
    // validateString: function(value, requirement)
    // {
    //     console.log(value);
    //     var cpf = value;
    //     if (cpf.length != 11) { return false; }
		//
    //     var regex = /(\d{3})\.?(\d{3})\.?(\d{3})-?(\d{2})/;
    //     var numeros = cpf.replace(regex, "$1$2$3");
    //     var digits = cpf.replace(regex, "$4");
		//
    //     var sum = 0;
    //     for (var i = 10; i > 1; i--)
    //     {
    //       sum += numeros.charAt(10 - i) * i;
    //     }
    //     var result = sum % 11 < 2 ? 0 : 11 - sum % 11;
    //     if (result != digits.charAt(0)) { return false; }
    //     numeros = numeros+result;
    //     sum = 0;
    //     //alert(numeros);
    //     for (var i = 11; i > 1; i--)
    //     {
    //       //alert(i+''+numeros.charAt(11 - i))
    //       sum += numeros.charAt(11 - i) * i;
    //     }
		//
    //     result = sum % 11 < 2 ? 0 : 11 - sum % 11;
    //     if (result != digits.charAt(1))
    //     {
    //       //alert(result+'-'+digits.charAt(1));
    //       return false;
    //     }
    //     else
    //     {
    //       return true;
    //     }
		//
    //   },
    //   messages: { en: 'CPF Invalid'  }
    // });




	 $('.timepicker_clnc1').timepicker().on('changeTime.timepicker', function(e) {
	 		// $('#myAssign_Doctor_form').parsley('validate').validate({excluded: ' :hidden'});
	  });
/* ..................................Password Show hide ...................................................*/

	$('.show-pwd-btn').on("click", function() {

		var $this= $(this),
		$password_field = $this.parents(".input-group").find('input');
		$this_icon = $this.find("i");

		( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
		( $this_icon.hasClass("fa-eye") ) ? $this_icon.addClass("fa-eye-slash").removeClass("fa-eye") : $this_icon.addClass("fa-eye").removeClass("fa-eye-slash");

	});

});







function post_ajax(url, data) {

	var result;
	$.ajax({
        type: "POST",
        url: url,
		data: data,
		success: function(response) {
			result = response;
		},
		error: function(response) {
			result = 'error';
		},
		async: false
		});

		return result;
}










			$('#preview_profile_pic').click(function(){ $('#profile_pic').trigger('click'); });
			$('#preview_profile_pic').attr('src', baseURL+"admin/assets/images/default.png");
			function readURL(input) {
					//alert("file choose")
			        if (input.files && input.files[0]) {
			            var reader = new FileReader();

			            reader.onload = function (e) {
			                $('#preview_profile_pic')
			                    .attr('src', e.target.result);
			            };

			            reader.readAsDataURL(input.files[0]);
			        }
			    }



			$('#preview_profile_edit').click(function(){ $('#clnc_editprofile_pic').trigger('click'); });
			function readURL_edit(input) {
					//alert("file choose")
			        if (input.files && input.files[0]) {
			            var reader = new FileReader();

			            reader.onload = function (e) {
			                $('#preview_profile_edit')
			                    .attr('src', e.target.result);
			            };

			            reader.readAsDataURL(input.files[0]);
			        }
			    }



			$('#preview_profile_pic_usr').click(function(){ $('#profile_pic').trigger('click'); });
			$('#preview_profile_pic_usr').attr('src', baseURL+"admin/assets/images/default.png");
			function readURL_usr(input) {
					//alert("file choose")
			        if (input.files && input.files[0]) {
			            var reader = new FileReader();

			            reader.onload = function (e) {
			                $('#preview_profile_pic_usr')
			                    .attr('src', e.target.result);
			            };

			            reader.readAsDataURL(input.files[0]);
			        }
			    }



			$('#clnc_preview_profile_pic').click(function(){ $('#clnc_profile_pic').trigger('click'); });
			$('#clnc_preview_profile_pic').attr('src', baseURL+"admin/assets/images/default.png");
			function readURL_clnc(input) {
					//alert("file choose")
			        if (input.files && input.files[0]) {
			            var reader = new FileReader();

			            reader.onload = function (e) {
			                $('#clnc_preview_profile_pic')
			                    .attr('src', e.target.result);
			            };

			            reader.readAsDataURL(input.files[0]);
			        }
			    }





			function getLatitudeLongitude(callback, address) {
			    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
			    address = address;
			    // Initialize the Geocoder
					console.log(address);
			    geocoder = new google.maps.Geocoder();
			    if (geocoder) {
			        geocoder.geocode({
			            'address': address
			        }, function (results, status) {
			            if (status == google.maps.GeocoderStatus.OK) {
			                callback(results[0]);
											console.log(results);
			            }
			        });
			    }

			}

						function showResult(result) {
			    //alert(result.geometry.location.lat());
			    $('#clnc_latitude').val(result.geometry.location.lat());
			    //alert(result.geometry.location.lng());
			    $('#clnc_longitude').val(result.geometry.location.lng());
			}


  $(".check").click(function(){
  	  var whichid = $(this).attr("id");
  	  var hiddenVar2 = ".area1" + this.value+ " :input[name = '"+whichid+"_endTime']";
      var hiddenVar4 = ".area1" + this.value+ " :input[name = '"+whichid+"_Breakfrom']";
      var hiddenVar5 = ".area1" + this.value+ " :input[name = '"+whichid+"_Breakto']";

  	  if ($('.check').is(":checked")){

      	  $('.'+whichid+'_breaktostart').removeAttr("disabled");
	        $('#'+whichid+'_Breakto').removeAttr("disabled");
           $('.'+whichid+'_breaktostart').attr('data-parsley-endfrom','#'+whichid+'1');
	         $('.'+whichid+'_endTimes').attr('demo_end','#'+whichid+'1');
	         $('#'+whichid+'1').attr('demo_start',whichid+'_endTime');
        var val = $('.'+whichid+'_breaktostart').val();
       // alert(val);
	         $('#'+whichid+'_Breakto').attr('data-parsley-startfrom',whichid+'_endTime');
	         $('#'+whichid+'_Breakto').attr('data-parsley-breakto','.'+whichid+'_breaktostart');

  	  }else{
  	  		$('#'+whichid+'_Breakto').removeAttr('data-parsley-breakto');
          $('.'+whichid+'_breaktostart').removeAttr('data-parsley-endfrom');
          $('#'+whichid+'_Breakto').removeAttr("data-parsley-startfrom");
            $('.'+whichid+'_breaktostart').attr("disabled","disabled");
	        $('#'+whichid+'_Breakto').attr("disabled","disabled");


  	  }
  	$('.inter_'+whichid).toggle();
  	//$('.intervalcheck').hide();
  });




$(".chse-days-div :checkbox").click(function () {
		//$('#myAssign_Doctor_form').parsley();
       	var hiddenVar = ".area" + this.value;
       var hiddenVar3 = ".area1" + this.value;
       	var hiddenVar1 = ".area1" + this.value+ " :input";
       var hiddenVar2 = ".area1" + this.value+ " :input[name = '"+this.value+"_endTime']";
        var hiddenVar4 = ".area1" + this.value+ " :input[name = '"+this.value+"_Breakfrom']";
        var hiddenVar5 = ".area1" + this.value+ " :input[name = '"+this.value+"_Breakto']";
   /*   alert(hiddenVar);
      alert(hiddenVar3);
      alert(hiddenVar1);
      alert(hiddenVar2);*/

       if (this.checked)
	    {
	       	$(hiddenVar).removeAttr("disabled");
	       	$(hiddenVar1).removeAttr("disabled");
	      /* 	if(this.value != 'sun'){
	       	 $('#'+this.value+'_intervalTime').attr("disabled","disabled");
	        }*/
	        $(hiddenVar2 ).attr('data-parsley-mintime','#'+this.value+'1');
	        $(hiddenVar4).attr("disabled","disabled");
	        $(hiddenVar5).attr("disabled","disabled");
	        /* $(hiddenVar4 ).attr('data-parsley-endfrom','#'+this.value+'1');
	         $(hiddenVar2).attr('demo_end','#'+this.value+'1');
	         $('#'+this.value+'1').attr('demo_start',this.value+'_endTime');

	         $(hiddenVar5 ).attr('data-parsley-startfrom',this.value+'_endTime');*/
	        $('.breaktoend').removeAttr('data-parsley-breakto');


	       	$(hiddenVar1).addClass("timepicker_clnc1");
       		$(hiddenVar3).collapse("show");
       }
       else
       	{

	       	$(hiddenVar).attr("disabled","disabled");
	       	$(hiddenVar1).attr("disabled","disabled");
	       $(hiddenVar2).removeAttr("data-parsley-mintime");
	      // $(hiddenVar4).removeAttr("data-parsley-endfrom");
	      // $(hiddenVar5).removeAttr("data-parsley-startfrom");

	       	//$(hiddenVar_interval).removeAttr("data-parsley-mininterval");
	       	$(hiddenVar1).removeClass("timepicker_clnc1");
	       	$(hiddenVar3).collapse("hide");
		}


});

 $('#doctor_select').on('change', function () {
        var id = $(this).val();
        //alert(id);
                   $.ajax({
                    type: "POST",
                    url: base_url + 'ManageClinic/get_doctor_duration',
                    data:'id=' + id,
                    success: function (data) {
                    	//alert(data)
                    	if(data != '0'){
                    		 $('#intervalTime').prop('disabled', 'disabled');
                    	}else{
                    		$('#intervalTime').removeAttr('disabled');
                    	}
                    	$('#intervalTime').val(data).trigger('change');

                    }
                });
  });
