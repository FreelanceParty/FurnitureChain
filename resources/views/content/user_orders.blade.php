@php
	use App\Models\Order;
	use App\ValueObjects\OrderStatus;
	use Illuminate\Database\Eloquent\Collection;

	/** @var Order[]|Collection $orders */
@endphp

<div class="js-orders-content flex gap-4 w-full h-full flex-col lg:flex-row">
	<div class="flex flex-col gap-2 h-full">
		@foreach( $orders as $item )
			<div class="js-order cursor-pointer flex rounded-sm p-2 gap-2 " data-order-id="{{ $item->getId() }}">
				<div>{{ $item->getId() }}</div>
				<div>{{ OrderStatus::getTitleFor($item->getStatusId()) }}</div>
				<div>{{ $item->getTotalAmount() }}</div>
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