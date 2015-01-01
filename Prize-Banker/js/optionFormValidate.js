function first_panel(){
	if ($("#option1").val() >= 2 && $("#option1").val() <= 11){
		$("#causes1").val($("#select_causes").val());
	}else{
	alert("Please enter 2, 3, 4, ...11 Thank You!");
	return false;
	}
}

function second_panel(){
	if ($("#option2").val() >= 12 && $("#option2").val() <= 49){
		$("#causes2").val($("#select_causes").val());
	}else{
		alert("Please Enter an amount 12, 13, 14, ......49 Thank You!");
		return false;
	}
}

function third_panel(){
	if ($("#option3").val() >= 50){
	$("#causes3").val($("#select_causes").val());
	}else{
		alert("Please Enter 50, 51 , 52, 100, 1000 and so on. Thank You!");
		return false;
	}
}