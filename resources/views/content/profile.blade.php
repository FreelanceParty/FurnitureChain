@php
	use App\Models\User;
	/** @var User $authUser */
@endphp

<div class="js-profile-content flex flex-col gap-3 max-w-[700px]">
	<div class="font-semibold text-2xl">{{ trans('general.personal_data') }}</div>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
		<label>
			{{ trans('general.auth.email') }}
			@include('_elements.input_text', [
				'id'          => 'email',
				'type'        => 'email',
				'name'        => 'email',
				'isRequired'  => TRUE,
				'isAutofocus' => TRUE,
				'value'       => $authUser->getEmail(),
			])
		</label>
		<label>
			{{ trans('general.auth.password') }}
			@include('_elements.input_text', [
				'id'          => 'password',
				'type'        => 'password',
				'name'        => 'password',
				'isRequired'  => TRUE,
				'value'       => '********',
			])
		</label>
		<label>
			{{ trans('general.first_name') }}
			@include('_elements.input_text', [
				'id'          => 'first-name',
				'type'        => 'text',
				'name'        => 'first_name',
				'value'       => $authUser->getFirstName(),
			])
		</label>
		<label>
			{{ trans('general.last_name') }}
			@include('_elements.input_text', [
				'id'          => 'last-name',
				'type'        => 'text',
				'name'        => 'last_name',
				'value'       => $authUser->getLastName(),
			])
		</label>
	</div>
	@include('_elements.button', [
		'id'    => 'submit',
		'text'  => trans('general.save'),
		'route' => route('action.update-personal-data'),
		'class' => 'w-fit ml-auto'
	])
</div>
<script>
	$(document).ready(function () {
		'use strict';

		const $console        = $('#console'),
		      $content        = $console.find('#content'),
		      $profileContent = $content.find('.js-profile-content'),
		      $email          = $profileContent.find('#email'),
		      $password       = $profileContent.find('#password'),
		      $firstName      = $profileContent.find('#first-name'),
		      $lastName       = $profileContent.find('#last-name'),
		      $submit         = $profileContent.find('#submit');

		$submit.on('click', function () {
			sendRequest(
				$(this).data('route'),
				{
					email:      $email.val(),
					password:   $password.val(),
					first_name: $firstName.val(),
					last_name:  $lastName.val(),
				},
				(response) => {
					alert(response.message);
				}
			);
		});
	});
</script>