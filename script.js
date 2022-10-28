const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
	e.preventDefault();
	
	formSubmit();
})

async function formSubmit() {
	const data = serializeForm(form);
	const response = await sendData(data);
	if (response.ok) {
	  let result = await response.json();
	  alert(result.message);
	} else {
	  alert("Код ошибки: " + response.status);
	}
  }

function serializeForm(formNode) {
	return new FormData(formNode);
}

async function sendData(data) {
	return await fetch('sender.php', {
		method: 'POST',
		body: data
	});
}
