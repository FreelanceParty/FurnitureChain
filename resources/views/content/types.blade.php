@extends('_templates.a_content')

@section('content')
	<div class="flex flex-wrap gap-4 justify-center">
		@foreach( $types as $t)
			<div class="js-type flex flex-col border" data-id="{{ $t->getId() }}">
				<div class="w-80 h-80 border-b">
					<img width="320" height="320" src="{{ asset('images/tmp_logo.png') }}">
				</div>
				<div class="flex justify-center">{{ $t->getTitle() }}</div>
			</div>
		@endforeach
	</div>
	<script>
		$(document).ready(function () {
			'use strict';

			const $console = $('#console'),
			      $content = $console.find('#content'),
			      $types   = $content.find('.js-type');

			$types.on('click', function () {
				sendRequest(
					'{{ route('content.furnitures') }}',
					{
						type_id: $(this).data('id'),
					},
					(response) => {
						$content.html(response.html);
					}
				);
			});
		});
	</script>
@endsection