@php
	use App\Models\User;
	use App\Models\UserAddress;

	/** @var User $authUser */
    /** @var UserAddress $address */
@endphp

<div class="js-profile-content flex flex-col gap-5 max-w-[700px]">
	<div class="flex flex-col gap-3">
		<div class="font-semibold text-2xl">{{ trans('general.personal_data') }}</div>
		<div class="js-personal-data-section grid grid-cols-1 md:grid-cols-2 gap-2">
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
			'class' => 'w-fit ml-auto',
		])
	</div>
	<div class="flex flex-col gap-3">
		<div class="font-semibold text-2xl">{{ trans('general.address.address') }}</div>
		<div class="js-user-address-section grid grid-cols-1 md:grid-cols-2 gap-2">
			<label>
				{{ trans('general.address.city') }}
				@include('_elements.input_text', [
					'id'          => 'city',
					'name'        => 'city',
					'isAutofocus' => TRUE,
					'value'       => $address->getCity(),
				])
			</label>
			<label>
				{{ trans('general.address.street') }}
				@include('_elements.input_text', [
					'id'          => 'street',
					'name'        => 'street',
					'value'       => $address->getStreet(),
				])
			</label>
			<label>
				{{ trans('general.address.house_number') }}
				@include('_elements.input_text', [
					'id'          => 'house-number',
					'name'        => 'house_number',
					'value'       => $address->getHouseNumber(),
				])
			</label>
		</div>
		@include('_elements.button', [
			'id'    => 'js-update-address-btn',
			'text'  => trans('general.save'),
			'route' => route('action.update-user-address'),
			'class' => 'w-fit ml-auto',
		])
	</div>
</div>
@include('_elements.button', [
	'id'    => 'js-user-orders',
	'text'  => trans('general.my_orders'),
	'class' => 'max-w-[700px]',
	'route' => route('content.user-orders'),
])
<script>
	$(document).ready(function () {
		'use strict';

		const $console             = $('#console'),
		      $content             = $console.find('#content'),
		      $profileContent      = $content.find('.js-profile-content'),
		      $submit              = $profileContent.find('#submit'),
		      $personalDataSection = $profileContent.find('.js-personal-data-section'),
		      $addressSection      = $profileContent.find('.js-user-address-section'),
		      $submitAddress       = $profileContent.find('#js-update-address-btn'),
		      $userOrdersBtn       = $content.find('#js-user-orders');

		$submit.on('click', function () {
			sendRequest(
				$(this).data('route'),
				getElementInputs($personalDataSection),
				(response) => {
					alert(response.message);
				}
			);
		});

		$submitAddress.on('click', function () {
			sendRequest(
				$(this).data('route'),
				getElementInputs($addressSection),
				(response) => {
					alert(response.message);
				}
			);
		});

		$userOrdersBtn.on('click', function () {
			changeContent($(this).data('route'));
		});
	});
</script>