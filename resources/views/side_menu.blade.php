@php
	use App\ValueObjects\Color;
@endphp

<div id='sider' class="bg-green-300 flex flex-col min-w-[300px] h-full">
	<div id="logo" class="flex items-center ml-4 min-h-[80px]">
		<img height="60" width="60" src="{{ asset('images/logo.png') }}">
	</div>
	<div class="h-full min-w-[300px] p-4 flex flex-col gap-2">
		<div class="js-filter-section flex flex-col gap-1">
			<label>{{ trans('Ціна') }}</label>
			<div class="flex space-x-4">
				<label class="block text-xs text-gray-700 w-1/2">
					{{ trans('general.from') }}
					@include('_elements.input_text', [
						'id'          => 'price-from',
						'type'        => 'number',
						'name'        => 'price_from',
						'isRequired'  => FALSE,
					])
				</label>
				<label class="block text-xs text-gray-700 w-1/2">
					{{ trans('general.to') }}
					@include('_elements.input_text', [
						'id'          => 'price-to',
						'type'        => 'number',
						'name'        => 'price_to',
						'isRequired'  => FALSE,
					])
				</label>
			</div>

			<label>
				{{ trans('general.color') }}
				<select id="js-color-filter" name="color">
					<option selected value> ---</option>
					@foreach( Color::getAll() as $value => $text )
						<option value="{{ $value }}">{{ $text }}</option>
					@endforeach
				</select>
			</label>

			@include('_elements.checkbox', [
				'id'   => 'js-ready-to-shipping-filter',
				'name' => 'ready_to_shipping',
				'text' => trans('general.ready_to_shipping'),
			])
			@include('_elements.checkbox', [
				'id'   => 'js-with-discount-filter',
				'name' => 'with_discount',
				'text' => trans('general.with_discount'),
			])

		</div>
		@include('_elements.button', [
			'id'    => 'js-filter-btn',
			'text'  => trans('general.apply'),
			'route' => route('content.furniture-filter'),
		])
	</div>
</div>
<script>
	$(document).ready(function () {
		'use strict';

		const $console       = $('#console'),
		      $sider         = $console.find('#sider'),
		      $filterSection = $sider.find('.js-filter-section'),
		      $filterBtn     = $sider.find('#js-filter-btn');

		$filterBtn.on('click', function () {
			changeContent(
				$(this).data('route'),
				{filters: getElementInputs($filterSection)}
			);
		});
	});
</script>