@extends('_templates.a_content')

@section('content')
	<div class="flex flex-wrap gap-4 justify-center">
		@foreach( $furnitures as $furn)
			<div class="js-furniture flex flex-col border" data-id="{{ $furn->getId() }}">
				<img class="border-b" width="280" height="280" src="{{ asset('images/tmp_logo.png') }}">
				<div class="flex justify-center">{{ $furn->getTitle() }}</div>
			</div>
		@endforeach
	</div>
	<script>
		$(document).ready(function () {
			'use strict';

			const $console    = $('#console'),
			      $content    = $console.find('#content'),
			      $categories = $content.find('.js-furniture');

			$categories.on('click', function () {
				sendRequest(
					'{{ route('content.details') }}',
					{
						furniture_id: $(this).data('id'),
					},
					(response) => {
						$content.html(response.html);
					}
				);
			});
		});
	</script>
@endsection