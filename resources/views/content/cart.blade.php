@php
	use App\Models\Furniture;
	use Illuminate\Database\Eloquent\Collection;

	/** @var Furniture[]|Collection $cartItems */
@endphp

<div class="js-cart-content flex gap-4 w-full h-full flex-col lg:flex-row">
	<div class="flex flex-col gap-2 h-full">
		@foreach( $cartItems as $item )
			<div class="js-item flex rounded-sm p-2 gap-2 " data-furniture-id="{{ $item->getId() }}">
				<img width="150" height="150" src="{{ $item->getImageForHtml() ?? asset('images/tmp_logo.png') }}">
				<div class="w-full">{{ $item->getTitle() }}</div>
				<div class="flex flex-col gap-2 text-nowrap text-right">
					@if( $item->getDiscount() && $item->getDiscountEndsAt() > now() )
						<div class="line-through">{{ number_format($item->getPrice(), 2) . ' $' }}</div>
						<div>{{ number_format($item->getPriceWithDiscount(), 2) . ' $' }}</div>
					@else
						<div>{{ number_format($item->getPrice(), 2) . ' $' }}</div>
					@endif
				</div>
			</div>
		@endforeach
	</div>
	<div class="flex flex-col border rounded-sm bg-green-100 p-2 gap-2">
		<div>{{ trans('general.total_to_pay') }}: {{ ($totalAmount ?? 0) . " $" }}</div>
		<button type="submit"
				class="disabled:bg-gray-300 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
			{{ trans('general.place_order') }}
		</button>
	</div>
</div>
<script>
	$(document).ready(function () {
		'use strict';

		const $console     = $('#console'),
		      $content     = $console.find('#content'),
		      $cartContent = $content.find('.js-cart-content'),
		      $submit      = $cartContent.find('button');

		$submit.on('click', function () {
			changeContent('{{ route('content.confirm-order') }}');
		});

	});
</script>