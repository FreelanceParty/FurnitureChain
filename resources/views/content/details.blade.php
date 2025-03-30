@php
	use App\ValueObjects\Color;
@endphp

@extends('_templates.a_content')

@section('content')
	<div class="flex gap-4 p-4 bg-gray-100 rounded-sm">
		<img width="280" height="280" src="{{ $furniture->getImageForHtml() ?? asset('images/tmp_logo.png') }}" alt='{{ trans('general.load_image_error') }}'>
		<div class="flex flex-col gap-2 w-full">
			<div>{{ $furniture->getTitle() }}</div>
			<div class="flex flex-wrap gap-1">
				@include('_elements.badge', [
					'color' => $furniture->isReadyToShipping() ? 'green' : 'red',
					'text'  => $furniture->isReadyToShipping() ? trans('general.ready_to_shipping') : trans('general.not_ready_to_shipping'),
				])
				@include('_elements.badge', [
					'text'  => sprintf('%s: %s', trans('general.code'), $furniture->getCode()),
				])
				@include('_elements.badge', [
					'text'  => sprintf('%s: %s', trans('general.color'), Color::getTitleFor($furniture->getColor())),
				])
			</div>
			@if( ! empty($furniture->getDescription()) )
				<div class="flex flex-col">
					<div class="font-semibold">{{ trans('general.description') }}</div>
					<div>{{ $furniture->getDescription() }}</div>
				</div>
			@endif
			<div class="flex gap-2">
				@include('_elements.button', [
					'id'    => 'js-buy-btn',
					'text'  => trans('general.to_cart'),
				])
				@if( $furniture->getDiscount() && $furniture->getDiscountEndsAt() > now() )
					<div>{{ number_format($furniture->getPriceWithDiscount(), 2) . ' $' }}</div>
					<div class="line-through">{{ number_format($furniture->getPrice(), 2) . ' $' }}</div>
				@else
					<div>{{ number_format($furniture->getPrice(), 2) . ' $' }}</div>
				@endif
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			'use strict';

			const $console    = $('#console'),
			      $buyBtn     = $console.find('#js-buy-btn'),
			      furnitureId = "{{ $furniture->getId() }}";

			$buyBtn.on('click', function () {
				let cart = JSON.parse(localStorage.getItem('cart')) ?? [];
				if (cart.includes(furnitureId)) {
					cart = cart.filter(item => item !== furnitureId);
				} else {
					cart.push('{{ $furniture->getId() }}');
				}
				localStorage.setItem('cart', JSON.stringify(cart));
				toggleButtonText();
			});

			function toggleButtonText() {
				let cart = JSON.parse(localStorage.getItem('cart')) ?? [];
				if (cart.includes(furnitureId)) {
					$buyBtn.text('{{ trans('general.already_in_cart') }}');
				} else {
					$buyBtn.text('{{ trans('general.to_cart') }}');
				}
			}

			toggleButtonText();

		});
	</script>
@endsection