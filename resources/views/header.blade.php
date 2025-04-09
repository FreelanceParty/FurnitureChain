@php
	use Illuminate\Support\Facades\Auth;
@endphp

<div id="header" class="bg-green-300 w-full min-h-[80px] flex justify-between gap-4 items-center px-2">
	<div class="flex gap-2">
		@include('_elements.input_text', [
			'id' => 'js-search-input',
		])
		@include('_elements.button', [
			'id'   => 'js-search-button',
			'text' => trans('general.search'),
		])
	</div>
	<div class="flex gap-4">
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

			const $console      = $('#console'),
			      $content      = $console.find('#content'),
			      $header       = $console.find('#header'),
			      $searchInput  = $header.find('#js-search-input'),
			      $searchButton = $header.find('#js-search-button'),
			      $cart         = $header.find('.js-cart'),
			      $menu         = $header.find('.js-menu'),
			      $logout       = $header.find('.js-logout');

			$searchButton.on('click', function () {
				changeContent('{{ route('content.furniture-search') }}', {search: $searchInput.val()});
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

		});
	</script>
</div>