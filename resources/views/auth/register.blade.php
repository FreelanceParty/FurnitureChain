<div class="js-register-form min-w-80 max-w-[700px]">
	<div class="">
		<label class="block font-medium text-sm text-gray-700">{{ trans('general.auth.email') }}</label>
		@include('_elements.input_text', [
			'id'          => 'email',
			'type'        => 'email',
			'name'        => 'email',
			'isRequired'  => TRUE,
			'isAutofocus' => TRUE,
		])
	</div>
	<div class="mt-4">
		<label class="block font-medium text-sm text-gray-700">{{ trans('general.auth.password') }}</label>
		@include('_elements.input_text', [
			'id'          => 'password',
			'type'        => 'password',
			'name'        => 'password',
			'isRequired'  => TRUE,
		])
	</div>
	<div class="mt-4">
		<label class="block font-medium text-sm text-gray-700">{{ trans('general.auth.confirm_password') }}</label>
		@include('_elements.input_text', [
			'id'          => 'password_confirmation',
			'type'        => 'password',
			'name'        => 'password_confirmation',
			'isRequired'  => TRUE,
		])
	</div>
	<div class="flex items-center justify-between mt-6">
		<div class="js-login underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
				data-route="{{ route('content.login') }}">
			{{ trans('general.auth.already_registered') }}
		</div>
		<div class="flex items-center">
			@include('_elements.button', [
				'id'         => 'js-register',
				'isDisabled' => TRUE,
				'text'       => trans('general.auth.register'),
			])
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		const
			$registerForm         = $(".js-register-form"),
			$submitBtn            = $registerForm.find("button"),
			$emailInput           = $registerForm.find("#email"),
			$passwordInput        = $registerForm.find("#password"),
			$confirmPasswordInput = $registerForm.find("#password_confirmation"),
			$login                = $registerForm.find('.js-login')
		;

		$login.on('click', function () {
			changeContent($(this).data('route'));
		});

		$emailInput.on("keyup", checkInputs);
		$emailInput.on("change", checkInputs);
		$passwordInput.on("keyup", checkInputs);
		$confirmPasswordInput.on("keyup", checkInputs);

		function checkInputs() {
			if (isValidEmail($emailInput.val()) && $passwordInput.val().length > 0 && $passwordInput.val() === $confirmPasswordInput.val()) {
				$submitBtn.attr("disabled", false);
				$emailInput.removeClass("!border-red-400");
				$passwordInput.removeClass("!border-red-400");
				$confirmPasswordInput.removeClass("!border-red-400");
			} else {
				$submitBtn.attr("disabled", true);
			}
		}

		$submitBtn.on("click", function () {
			sendRequest(
				'{{ route('register') }}',
				{
					email:                 $emailInput.val(),
					password:              $passwordInput.val(),
					password_confirmation: $confirmPasswordInput.val()
				},
				(response) => {
					if (response.ack === "success") {
						window.location.reload();
					} else {
						$submitBtn.attr("disabled", true);
						$emailInput.addClass("!border-red-400");
						$passwordInput.addClass("!border-red-400");
						$confirmPasswordInput.addClass("!border-red-400");
					}
				}
			);
		});
	});
</script>