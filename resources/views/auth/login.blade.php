<div class="js-login-form min-w-80 max-w-[700px]">
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
	<div class="block mt-4">
		<label for="remember_me" class="inline-flex items-center">
			<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
			<span class="ms-2 text-sm text-gray-600">{{ trans('general.auth.remember_me') }}</span>
		</label>
	</div>
	<div class="flex items-center justify-end mt-6">
		@include('_elements.button', [
			'id'         => 'js-login',
			'isDisabled' => TRUE,
			'text'       => trans('general.auth.login'),
		])
	</div>
</div>
<script>
	$(document).ready(function () {
		const $loginForm          = $(".js-login-form"),
		      $submitBtn          = $loginForm.find('button'),
		      $emailInput         = $loginForm.find('#email'),
		      $passwordInput      = $loginForm.find('#password'),
		      $rememberMeCheckbox = $loginForm.find('#remember_me');

		$emailInput.on('keyup', checkInputs);
		$emailInput.on('change', checkInputs);
		$passwordInput.on('keyup', checkInputs);

		function checkInputs() {
			if (isValidEmail($emailInput.val()) && $passwordInput.val().length > 0) {
				$submitBtn.attr('disabled', false);
				$emailInput.removeClass('!border-red-400');
				$passwordInput.removeClass('!border-red-400');
			} else {
				$submitBtn.attr('disabled', true);
			}
		}

		$submitBtn.on('click', function () {
			sendRequest(
				'{{ route('login') }}',
				{
					email:    $emailInput.val(),
					password: $passwordInput.val(),
					remember: $rememberMeCheckbox.is(':checked'),
				},
				(response) => {
					if (response.ack === 'success') {
						window.location.reload();
					} else {
						$submitBtn.attr('disabled', true);
						$emailInput.addClass('!border-red-400');
						$passwordInput.addClass('!border-red-400');
					}
				}
			)
		});
	});
</script>