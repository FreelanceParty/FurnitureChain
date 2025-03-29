@php
	use Illuminate\Support\Facades\Auth;
@endphp

<div id="header" class="bg-green-300 w-full min-h-[80px] flex justify-end gap-4">
	<div class="js-menu cursor-pointer" data-route="{{ route('content.cart') }}">Корзина</div>
	@if( Auth::user() )
		<div class="js-menu cursor-pointer" data-route="{{ route('content.profile') }}">Профіль</div>
		<div class="js-logout cursor-pointer">Вийти</div>
	@else
		<div class="js-menu cursor-pointer" data-route="{{ route('content.login') }}">Увійти</div>
		<div class="js-menu cursor-pointer" data-route="{{ route('content.register') }}">Зареєструватись</div>
	@endif
	<script>
		$(document).ready(function () {
			'use strict';

			const $console = $('#console'),
			      $header  = $console.find('#header'),
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

		});
	</script>
</div>