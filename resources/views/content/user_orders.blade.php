@php
	use App\Models\Order;
	use App\ValueObjects\OrderStatus;
	use Illuminate\Database\Eloquent\Collection;

	/** @var Order[]|Collection $orders */
@endphp

<div class="js-orders-content flex gap-4 w-full h-full flex-col">
	<div class="font-semibold text-2xl">{{ trans('general.my_orders') }}</div>
	<div class="flex flex-col gap-2 h-full w-full">
		@foreach( $orders as $item )
			<div class="js-order border border-gray-300 rounded-sm bg-gray-200 cursor-pointer grid grid-cols-2 rounded-xl p-2 gap-2 hover:shadow-md" data-order-id="{{ $item->getId() }}">
				<div class="flex flex-col gap-1">
					<div class="flex gap-1">
						<div class="font-semibold">{{ sprintf('№ %s', $item->getId()) }}</div>
						<div>{{ sprintf('%s %s', strtolower(trans('general.from')), $item->getCreatedAt()->toDateString()) }}</div>
					</div>
					<div>{{ $item->getTotalAmount() . ' $' }}</div>
					<div class="text-{{ OrderStatus::getColorFor($item->getStatusId()) }}-700">{{ OrderStatus::getTitleFor($item->getStatusId()) }}</div>
				</div>
				<div class="flex flex-col gap-1">
					@foreach($item->order_furnitures as $furniture)
						<div>{{ $furniture->furniture->getTitle() }}</div>
					@endforeach
				</div>
			</div>
		@endforeach
	</div>
</div>
<script>
	$(document).ready(function () {
		'use strict';

		const $console       = $('#console'),
		      $content       = $console.find('#content'),
		      $ordersContent = $content.find('.js-orders-content'),
		      $orders        = $ordersContent.find('.js-order');

		$orders.on('click', function () {
			changeContent(
				'{{ route('content.order-details') }}',
				{
					order_id: $(this).data('order-id'),
				}
			);
		});

	});
</script>