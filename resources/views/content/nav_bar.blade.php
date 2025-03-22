<div class="js-nav-bar flex gap-1">
	<div class="js-nav cursor-pointer underline hover:text-red-600" data-route="{{ route('content.categories') }}">Home</div>
	@if( ! empty($category) )
		>
		<div class="js-nav cursor-pointer underline hover:text-red-600" data-id="{{ $category->getId() }}" data-route="{{ route('content.types') }}">{{ $category->getTitle() }}</div>
		@if( ! empty($type) )
			>
			<div class="js-nav cursor-pointer underline hover:text-red-600" data-id="{{ $type->getId() }}" data-route="{{ route('content.furnitures') }}">{{ $type->getTitle() }}</div>
			@if( ! empty($furniture) )
				>
				<div class="js-nav cursor-pointer underline hover:text-red-600" data-id="{{ $furniture->getId() }}" data-route="{{ route('content.details') }}">{{ $furniture->getTitle() }}</div>
			@endif
		@endif
	@endif
	<script>
		$(document).ready(function () {
			'use strict';

			const $console = $('#console'),
			      $content = $console.find('#content'),
			      $navBar  = $content.find('.js-nav-bar'),
			      $navs    = $navBar.find('.js-nav');

			$navs.on('click', function () {
				sendRequest(
					$(this).data('route'),
					{
						category_id:  $(this).data('id'),
						type_id:      $(this).data('id'),
						furniture_id: $(this).data('id'),
					},
					(response) => {
						$content.html(response.html)
					},
				);
			});
		});
	</script>
</div>
