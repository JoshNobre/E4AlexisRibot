function changeValueOfCheckboxes(val) {
	if($('input[type="checkbox"]').is(':checked')) {
		$(val).val(1);
	} else {
		$(val).val(0);
	}
}
function changeDisplayOfMateriel() {
	if($('#achatCheck').is(':checked')) {
		$('#achat').css('display', 'block');
		$('#location').css('display', 'none');
	} 

	if($('#locationCheck').is(':checked')) {
		$('#location').css('display', 'block');
		$('#achat').css('display', 'none');
	}
}