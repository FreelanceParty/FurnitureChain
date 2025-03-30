@php
	use Illuminate\Support\Facades\Auth;
@endphp

<div id="header" class="bg-green-300 w-full min-h-[80px] flex justify-end gap-4">
	<div class="js-cart cursor-pointer" data-route="{{ route('content.cart') }}">{{ trans('general.cart') }}</div>
	@if( Auth::user() )
		<div class="js-menu cursor-pointer" data-route="{{ route('content.profile') }}">{{ trans('general.profile') }}</div>
		<div class="js-logout cursor-pointer">{{ trans('general.logout') }}</div>
	@else
		<div class="js-menu cursor-pointer" data-route="{{ route('content.login') }}">{{ trans('general.auth.login') }}</div>
		<div class="js-menu cursor-pointer" data-route="{{ route('content.register') }}">{{ trans('general.auth.register') }}</div>
	@endif
	<script>
		$(document).ready(function () {
			'use strict';

			const $console = $('#console'),
			      $content = $console.find('#content'),
			      $header  = $console.find('#header'),
			      $cart    = $header.find('.js-cart'),
			      $menu    = $header.find('.js-menu'),
			      $logout  = $header.find('.js-logout');

			$menu.on('click', function () {
				changeContent($(this).data('route'));
			})

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