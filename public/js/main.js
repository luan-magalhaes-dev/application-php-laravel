// swalDestroy
function swalDestroy (uuid, cancelSuccessText, title, text, formText = 'destroy')
{
	let textTitle = false;
	let textText = false;

	if (title) {
		textTitle = title;
	}
	if (text) {
		textText = text;
	}
	swal({
		title: textTitle ? textTitle : 'Tem certeza disso?',
		text: textText ? textText : 'Esta ação pode ser irreverssível!',
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
		closeOnConfirm: false,
		closeOnCancel: false,
	}, function(isConfirm) {
		if (isConfirm) {
			$('#form-' + formText + '-' + uuid).submit();
		} else {
			swal('', cancelSuccessText, 'error');
		}
	});
}
