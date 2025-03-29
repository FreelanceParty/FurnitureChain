<div id='sider' class="bg-green-300 flex flex-col min-w-[300px] h-full">
	<div id="logo" class="flex items-center ml-4 min-h-[80px]">
		<img height="60" width="60" src="{{ asset('images/logo.png') }}">
	</div>
	<div class="h-full min-w-[300px] p-4 flex flex-col gap-2">
		@foreach( $categories as $category )
			<div class="border">{{ $category->getTitle() }}</div>
		@endforeach
	</div>
	<script>
		$(document).ready(function () {
			'use strict';

			const $console  = $('#console'),
			      $sideMenu = $console.find('#sider'),
			      $logo     = $sideMenu.find('#logo');

			$logo.on('click', function () {
				changeContent('{{ route('content.categories') }}');
			})
		});
	</script>
</div>