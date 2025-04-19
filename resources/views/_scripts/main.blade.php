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

	function changeContent(route, data = {}) {
		sendRequest(
			route,
			data,
			(response) => {
				$content.html(response.html);
			}
		)
	}

	function getElementInputs($element) {
		const data    = {},
		      $inputs = $element.find('input, select, textarea');

		$inputs.each(function () {
			const $elem = $(this),
			      name  = $elem.attr('name');

			if (!name) {
				return;
			}

			if ($elem.is("select")) {
				data[name] = $elem.find(':selected').val();
			} else if ($elem.prop('type') === 'checkbox') {
				if ($elem.is(':checked')) {
					data[name] = true;
				}
			} else {
				data[name] = $elem.val();
			}
		});

		return data;
	}

</script>