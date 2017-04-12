function changeValueOfCheckboxes(val) {
	if($('input[type="checkbox"]').is(':checked')) {
		$(val).val(1);
	} else {
		$(val).val(0);
	}
}