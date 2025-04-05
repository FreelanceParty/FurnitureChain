@php
	use App\Models\User;
	/** @var User $authUser */
@endphp

<div class="js-confirm-order-content flex flex-col gap-3 max-w-[700px]">
	<div>
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
					'value'       => $authUser?->getEmail(),
				])
			</label>
			<label>
				{{ trans('general.first_name') }}
				@include('_elements.input_text', [
					'id'          => 'first-name',
					'name'        => 'first_name',
					'value'       => $authUser?->getFirstName(),
				])
			</label>
			<label>
				{{ trans('general.last_name') }}
				@include('_elements.input_text', [
					'id'          => 'last-name',
					'name'        => 'last_name',
					'value'       => $authUser?->getLastName(),
				])
			</label>
		</div>
	</div>
	<div>
		<div class="font-semibold text-2xl">{{ trans('general.address.address') }}</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
			<label>
				{{ trans('general.address.city') }}
				@include('_elements.input_text', [
					'id'          => 'city',
					'name'        => 'city',
					'isRequired'  => TRUE,
					'value'       => '',
				])
			</label>
			<label>
				{{ trans('general.address.street') }}
				@include('_elements.input_text', [
					'id'          => 'street',
					'name'        => 'street',
					'isRequired'  => TRUE,
					'value'       => '',
				])
			</label>
			<label>
				{{ trans('general.address.house_number') }}
				@include('_elements.input_text', [
					'id'          => 'house-number',
					'name'        => 'house_number',
					'isRequired'  => TRUE,
					'value'       => '',
				])
			</label>
		</div>
	</div>
	@include('_elements.button', [
		'id'    => 'submit',
		'text'  => trans('general.confirm'),
		'route' => route('action.create-order'),
		'class' => 'w-fit ml-auto',
	])
</div>
<script>
	$(document).ready(function () {
		'use strict';

		const $console        = $('#console'),
		      $content        = $console.find('#content'),
		      $confirmContent = $content.find('.js-confirm-order-content'),
		      $email          = $confirmContent.find('#email'),
		      $firstName      = $confirmContent.find('#first-name'),
		      $lastName       = $confirmContent.find('#last-name'),
		      $city           = $confirmContent.find('#city'),
		      $street         = $confirmContent.find('#street'),
		      $houseNumber    = $confirmContent.find('#house-number'),
		      $submit         = $confirmContent.find('#submit');

		$submit.on('click', function () {
			const cart = localStorage.getItem('cart');
			sendRequest(
				$(this).data('route'),
				{
					cart:         cart,
					email:        $email.val(),
					first_name:   $firstName.val(),
					last_name:    $lastName.val(),
					city:         $city.val(),
					street:       $street.val(),
					house_number: $houseNumber.val(),
				},
				(response) => {
					alert(response.message);
				}
			);
		});
	});
</script>