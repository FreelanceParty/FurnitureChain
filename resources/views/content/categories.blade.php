@extends('_templates.a_content')

@section('content')
	<div class="flex flex-wrap gap-4 justify-center">
		@foreach( $categories as $cat)
			<div class="js-category flex flex-col border" data-id="{{ $cat->getId() }}">
				<img class="border-b" width="280" height="280" src="{{ $cat->getImageForHtml() ?? asset('images/tmp_logo.png') }}">
				<div class="flex justify-center">{{ $cat->getTitle() }}</div>
			</div>
		@endforeach
	</div>
	<script>
		$(document).ready(function () {
			'use strict';

			const $console    = $('#console'),
			      $content    = $console.find('#content'),
			      $categories = $content.find('.js-category');

			$categories.on('click', function () {
				sendRequest(
					'{{ route('content.types') }}',
					{
						category_id: $(this).data('id'),
					},
					(response) => {
						$content.html(response.html);
					}
				);
			});
		});
	</script>
@endsection