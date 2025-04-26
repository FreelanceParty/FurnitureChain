@php
	use Illuminate\Support\Facades\Auth;
	use App\Models\City;
	use Illuminate\Database\Eloquent\Collection;

	/** @var City[]|Collection $cities */
@endphp

<div id="header" class="bg-green-300 w-full min-h-[80px] flex justify-between gap-4 items-center px-2">
	<label>
		{{ trans('general.city') }}:
		<select id="js-city-filter" name="city">
			<option selected value> ---</option>
			@foreach( $cities as $city )
				<option value="{{ $city->getId() }}">{{ $city->getTitle() }}</option>
			@endforeach
		</select>
	</label>
	<div class="flex gap-4">
		@include('_elements.header_menu', [
			'class'    => 'js-menu',
			'route'    => route('content.our-stores'),
			'imageSrc' => asset('images/icons/store.png'),
			'text'     => trans('general.our_stores'),
		])
		@include('_elements.header_menu', [
			'class'    => 'js-menu',
			'route'    => route('content.pay-ship-info'),
			'imageSrc' => asset('images/icons/pay-ship-info.png'),
			'text'     => trans('general.pay_and_ship'),
		])
		@include('_elements.header_menu', [
			'class'    => 'js-cart',
			'route'    => route('content.cart'),
			'imageSrc' => asset('images/icons/cart.png'),
			'text'     => trans('general.cart'),
		])
		@if( Auth::user() )
			@include('_elements.header_menu', [
				'class'    => 'js-menu',
				'route'    => route('content.profile'),
				'imageSrc' => asset('images/icons/profile.png'),
				'text'     => trans('general.profile'),
			])
			@include('_elements.header_menu', [
				'class'    => 'js-logout',
				'imageSrc' => asset('images/icons/logout.png'),
				'text'     => trans('general.logout'),
			])
		@else
			@include('_elements.header_menu', [
				'class'    => 'js-menu',
				'route'    => route('content.login'),
				'imageSrc' => asset('images/icons/login.png'),
				'text'     => trans('general.auth.login'),
			])
			@include('_elements.header_menu', [
				'class'    => 'js-menu',
				'route'    => route('content.register'),
				'imageSrc' => asset('images/icons/register.png'),
				'text'     => trans('general.auth.register'),
			])
		@endif
	</div>
	<script>
		$(document).ready(function () {
			'use strict';

			const $console    = $('#console'),
			      $content    = $console.find('#content'),
			      $header     = $console.find('#header'),
			      $citySelect = $header.find('#js-city-filter'),
			      $cart       = $header.find('.js-cart'),
			      $menu       = $header.find('.js-menu'),
			      $logout     = $header.find('.js-logout');

			$citySelect.on('change', function () {
				localStorage.setItem('city', $(this).val());
			});

			$menu.on('click', function () {
				changeContent($(this).data('route'));
			});

			$logout.on('click', function () {
				sendRequest(
					'{{ route('logout') }}',
					{},
					() => {
						window.location.reload();
					}
				)
			});

			$cart.on('click', function () {
				const cart = localStorage.getItem('cart');
				sendRequest(
					'{{ route('content.cart') }}',
					{
						cart: cart,
					},
					(response) => {
						$content.html(response.html);
					}
				)
			});

			$citySelect.val(localStorage.getItem('city'));
		});
	</script>
</div>