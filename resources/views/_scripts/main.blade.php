<script>
	"use strict";

	const
		$console = $("#console"),
		$content = $console.find("#content")
	;

	function isValidPhoneNumber(phoneNumber) {
		return String(phoneNumber).match(
			/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im
		);
	}

	function isValidEmail(email) {
		return String(email).toLowerCase().match(
			/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		);
	}

	function sendRequest(route, data = {}, successFunction = () => {
	}) {
		data["_token"] = "{{ csrf_token() }}";
		$.ajax({
			type:    "POST",
			url:     route,
			data:    data,
			success: successFunction
		});
	}

</script>