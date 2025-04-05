@php
	use App\Models\Order;

	/** @var Order $order */
@endphp

<div class="js-cart-content flex gap-4 w-full h-full flex-col lg:flex-row">
	<div class="flex flex-col gap-2 h-full">
		@foreach( $order->order_furnitures as $item )
			<div class="js-item flex rounded-sm p-2 gap-2 " data-furniture-id="{{ $item->getId() }}">
				<img width="150" height="150" src="{{ $item->furniture->getImageForHtml() ?? asset('images/tmp_logo.png') }}">
				<div class="w-full">{{ $item->furniture->getTitle() }}</div>
				<div class="flex flex-col gap-2 text-nowrap text-right">
					<div class="">{{ number_format($item->getUnitPrice(), 2) . ' $' }}</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="flex flex-col border rounded-sm bg-green-100 p-2 gap-2">
		<div>{{ trans('general.total_amount') }}: {{ $order->getTotalAmount() . " $" }}</div>
	</div>
</div>