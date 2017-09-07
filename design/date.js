$(document).ready(function(){

		      	$("#uname").blur(function(){
		       					 if($("#uname").val()=='')
		        					$("#fname").text("It should not be empty!").css("color", "red");
		         						if($("#uname").val()!='')
		       				 				$("#fname").text("");
		   					 });
		      	$("#uemail").blur(function(){
		       					 if($("#uemail").val()=='')
		        					$("#femail").text("It should not be empty!").css("color", "red");
		         						if($("#uemail").val()!='')
		         						{
		       				 				$("#femail").text("");
		       				 				var email=$("#uemail").val();
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
		      	$("#umobile").blur(function(){
		       					 if($("#umobile").val()=='')
		        					$("#fmobile").text("It should not be empty!").css("color", "red");
		         						if($("#umobile").val()!='')
		       				 				$("#fmobile").text("");
		   					 });
		      	$("#uqualification").blur(function(){
		       					 if($("#uqualification").val()=='')
		        					$("#fqualification").text("It should not be empty!").css("color", "red");
		         						if($("#uqualification").val()!='')
		       				 				$("#fqualification").text("");
		   					 });
		      	$("#uposition").blur(function(){
		       					 if($("#uposition").val()=='')
		        					$("#fposition").text("It should not be empty!").css("color", "red");
		         						if($("#uposition").val()!='')
		       				 				$("#fposition").text("");
		   					 });
		      	
		});


