$(document).ready(function(){
	 		    $("#addmore1").hide();
	 		    $("#addmore2").hide();
	 		    $("#addmore3").hide();
	 		    $("#removeexp").hide();
	 		    $("#noticediv").hide();
	 			$("table").hide();
		 		$("#tr1").hide();
		 		$("#tr2").hide();
		 		$("#tr3").hide();
		 		$("#explable").hide();
		 		
		 		$("#noticeperiod,#noticetime,#currentctc,#expectedctc,#companyname1,#companyname1,#designation1,#exprience1,#companyname2,#designation2,#exprience2,#companyname3,#designation3,#exprience3").prop('disabled', true);
		                 $("#btnadd").click(function(){
		                 	  $("#removediv").show();
		                 	  $("#explable").show();
		                 	  $("table").show();
	                          $("#tr1").show();
	                          $("#addmore1").show();
	                          $("#addmore1").prop('disabled',true);
	                          $("#noticediv").show();
	                          $("#removeexp").show();
	                          $("#btnadd").hide();
	                          $("#companyname1,#designation1,#exprience1").prop('disabled', false);
	                          
	                          
	                     });
	                     $("#addmore1").click(function(){  
	                          $("#tr2").show();
	                          $("#addmore2").show();
	                          $("#addmore1").hide();
	                          $("#companyname2,#designation2,#exprience2").prop('disabled', false);
	                     });
	                     $("#addmore2").click(function(){  
	                          $("#tr3").show();
	                          $("#addmore2").hide();
	                          $("#companyname3,#designation3,#exprience3").prop('disabled', false);
	                     });
	                     $("#removeexp").click(function(){  
	                           $("#btnadd").show();
	                          // $("#removediv").show(2000);
	                           $("#addmore1").hide();
					 		    $("#addmore2").hide();
					 		    $("#addmore3").hide();
					 		    $("#removeexp").hide();
					 		    $("#noticediv").hide();
					 			
						 		$("#tr1").hide(1000);
						 		$("#tr2").hide(1000);
						 		$("#tr3").hide(1000);
						 		$("table").hide(1000);
						 		$("#explable").hide();
						 		$("#companyname1").val('');
						 		$("#exprience1").val('');
						 		$("#designation1").val('');
						 		$("#companyname2").val('');
						 		$("#exprience2").val('');
						 		$("#designation2").val('');
						 		$("#companyname3").val('');
						 		$("#exprience3").val('');
						 		$("#designation3").val('');
						 		$("#noticeperiod,#noticetime,#currentctc,#expectedctc").prop('disabled', true);
	                     });




	                     $("#exprience1,#companyname1,#designation1").blur(function(){
		         					if(($("#companyname1").val()!='')&&($("#designation1").val()!='')&&($("#exprience1").val()!='')){
		       				 				$("#noticeperiod,#addmore1,#noticetime,#currentctc,#expectedctc").prop('disabled', false);	
		       				 			}
		       				 			else{
		       				 				$("#noticeperiod,#noticetime,#addmore1,#currentctc,#expectedctc").prop('disabled', true);	
		       				 			}
		   					 });
            
	                     document.getElementById("date").valueAsDate = new Date();





	                     


							
		      
















             
				jQuery.validator.setDefaults({
				  debug: false,
				  success: "valid"
				});
				$( "#myform" ).validate({
					errorElement: 'span',
				  rules: {
				    fullname: {
				      required: true,
				      pattern: "[a-zA-Z]+[a-zA-Z ]+"
				    },
				    email: {
				      required: true,
				      email: true
				    },
				    mobile: {
				      required: true,
				      pattern: "[789][0-9]{9}"
				    },
				    qualification: {
				      required: true,
				      pattern: "[a-zA-Z.' '_]{2,}"
				    },
				    positionforapply: {
				      required: true,
				      pattern: "[a-zA-Z.' '_]{2,}"
				    },
				    companyname1: {
				      required: true,
				      pattern: "[a-zA-Z.' '_0-9]{2,}"
				    },
				    companyname2: {
				      required: true,
				      pattern: "[a-zA-Z.' '_0-9]{2,}"
				    },
				    companyname3: {
				      required: true,
				      pattern: "[a-zA-Z.' '_0-9]{2,}"
				    },
				    designation1: {
				      required: true,
				      pattern: "[a-zA-Z.' '_0-9]{2,}"
				    },
				    designation2: {
				      required: true,
				      pattern: "[a-zA-Z.' '_0-9]{2,}"
				    },
				    designation3: {
				      required: true,
				      pattern: "[a-zA-Z.' '_0-9]{2,}"
				    },
				    exprience1: {
				      required: true			      
				    },
				    exprience2: {
				      required: true 
				    },
				    exprience3: {
				      required: true
				    },
				    noticeperiod: {
				      required: true,
				       pattern: "[0-9]{1,}"
				    },
				    skills: {
				      required: true,
				      pattern: "[a-zA-Z.' '_0-9,]{2,}"
				    },
				    currentctc: {
				      required: true,
				      pattern: "[0-9]{1,}"
				    },
				    expectedctc: {
				      required: true,
				      pattern: "[0-9]{1,}"
				    },
				    checkbox: {
				      required: true
				    },
				    
				  },
				   submitHandler: function(form) {

				                var date=$("#date").val();  
	                     		var name=$("#fullname").val();
	                            var email=$("#email").val();
	                            var mobile=$("#umobile").val();
	                            var maritalstatus=$('input[name=maritalstatus]:checked').val();
	                            var gender=$('input[name=gender]:checked').val();
	                     		var qualification=$("#uqualification").val();
	                            var positionforapply=$("#uposition").val();
	                            var companyname1= $("#companyname1").val();
						 		var exprience1=$("#exprience1").val();
						 		var designation1=$("#designation1").val();
						 		var companyname2=$("#companyname2").val();
						 		var exprience2=$("#exprience2").val();
						 		var designation2=$("#designation2").val();
						 		var companyname3=$("#companyname3").val();
						 		var exprience3=$("#exprience3").val();
						 		var designation3=$("#designation3").val();
						 		var noticeperiod=$("#noticeperiod").val();
						 		var noticetime=jQuery("#noticetime option:selected").val();
						 		noticeperiod=(noticeperiod+","+noticetime);
						 		//alert(noticeperiod);
						 		var training=jQuery("#training option:selected").val();
						 		alert(training);
						 		var bond=jQuery("#bond option:selected").val();
						 		var court=jQuery("#court option:selected").val();
						 		var multishift=jQuery("#multishift option:selected").val();
						 		var skills=$("#skills").val();
						 		var currentctc=$("#currentctc").val();
						 		var expectedctc=$("#expectedctc").val();
						 		var checkbox=$('input[id=checkbox]:checked').val();
if((date!='')&&(name!='')&&(email!='')&&(mobile!='')&&(maritalstatus!='')&&(gender!='')&&(qualification!='')&&(positionforapply!='')&&(skills!='')&&(checkbox)!=''){
//alert(name+" "+email+" "+mobile+" "+maritalstatus+" "+gender+" "+qualification+" "+positionforapply+" "+companyname1+" "+exprience1+" "+designation1+" "+noticeperiod+" "+noticetime+" "+training+" "+bond+" "+multishift+" "+skills+" "+currentctc+" "+expectedctc+" "+checkbox);
						  document.getElementById("status_text").style.display = "block";
						 		var myData={"name":name,"date":date,"email":email,"mobile":mobile,"maritalstatus":maritalstatus,"gender":gender,"qualification":qualification,"positionforapply":positionforapply,
						 					"companyname1":companyname1,"exprience1":exprience1,"designation1":designation1,"companyname2":companyname2,"exprience2":exprience2,"designation2":designation2,
						 				     "companyname3":companyname3,"exprience3":exprience3,"designation3":designation3,"noticeperiod":noticeperiod,"training":training,
						 				     "bond":bond,"court":court,"multishift":multishift,"skills":skills,"currentctc":currentctc,"expectedctc":expectedctc,"checkbox":checkbox};
	                                        $.ajax({
											    url : "CandidateDao.php",
											    type: "POST",
											    data : myData,
											    success: function(data,status,xhr)
											     {
											        //if success then just output the text to the status div then clear the form inputs to prepare for new data
											        alert(status);
											        if(status == "success")
											        {
											        	window.location.href = 'BasicCandidateList.php';
											        }
											      }

													}); 

						 	//	alert(name+" "+email+" "+mobile+" "+maritalstatus+" "+gender+" "+qualification+" "+positionforapply+" "+companyname1+" "+exprience1+" "+designation1+" "+noticeperiod+" "+noticetime+" "+training+" "+bond+" "+multishift+" "+skills+" "+currentctc+" "+expectedctc+" "+checkbox);
}
			
				},
			
				});
			
				


						      	$("#email").keyup(function(){
		       					 if($("#email").val()=='')
		        					$("#femail").text("It should not be empty!").css("color", "red");
		         						if($("#email").val()!='')
		         						{
		       				 				$("#femail").text("");
		       				 				var email=$("#email").val();
		       				 				var myData={"email":email};
	                                        $.ajax({
											    url : "CandidateDao.php",
											    type: "POST",
											    data : myData,
											    success: function(data)
											     {
											        //if success then just output the text to the status div then clear the form inputs to prepare for new data
											        $("#femail").html(data);
											      }

													}); 
		         						}
		   					 });






////////////////////////////////////basic user home///////////////////////////////////////////



					





});


			