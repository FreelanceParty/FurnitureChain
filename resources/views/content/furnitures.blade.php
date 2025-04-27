@extends('_templates.a_content')

@section('content')
	<div class="flex flex-wrap gap-4 justify-center">
		@foreach( $furnitures as $furn)
			<div class="js-furniture flex flex-col border relative" data-id="{{ $furn->getId() }}">
				@if( $authUser && $authUser->isAdmin() )
					<div class="absolute flex flex-col gap-2 p-2 right-0">
						<div class="js-edit border rounded-md bg-blue-400 p-1 cursor-pointer" data-id="{{ $furn->getId() }}">
							<img width="32" height="32" src="{{ asset('images/icons/edit.png') }}">
						</div>
						<div class="js-delete border rounded-md bg-red-400 p-1 cursor-pointer" data-id="{{ $furn->getId() }}">
							<img width="32" height="32" src="{{ asset('images/icons/delete.png') }}">
						</div>
					</div>
				@endif
				<img class="border-b" width="280" height="280" src="{{ $furn->getImage() ?? asset('images/tmp_logo.png') }}">
				<div class="flex justify-center">{{ $furn->getTitle() }}</div>
			</div>
		@endforeach
		@if( $authUser && $authUser->isAdmin() )
			<div class="js-add flex flex-col border">
				<div class="border-b h-[280px] w-[280px] flex items-center justify-center">
					<img width="140" height="140" src="{{ asset('images/icons/add.png') }}">
				</div>
				<div class="flex justify-center">{{ trans('general.add') }}</div>
			</div>
		@endif
	</div>
	<script>
		$(document).ready(function () {
			'use strict';

			const $console   = $('#console'),
			      $content   = $console.find('#content'),
			      $furniture = $content.find('.js-furniture');

			$furniture.on('click', function () {
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

			@if( $authUser && $authUser->isAdmin() )
			const $addBtn    = $content.find('.js-add'),
			      $editBtn   = $content.find('.js-edit'),
			      $deleteBtn = $content.find('.js-delete');

			$addBtn.on('click', function () {
				changeContent(
					'{{ route('content.edit-furniture') }}',
					{
						id:      -1,
						type_id: '{{ $type->getId() }}',
					},
				);
			});

			$editBtn.on('click', function (event) {
				event.stopPropagation();
				changeContent(
					'{{ route('content.edit-furniture') }}',
					{
						id:      $(this).data('id'),
						type_id: '{{ $type->getId() }}',
					},
				);
			});

			$deleteBtn.on('click', function (event) {
				event.stopPropagation();
				sendRequest(
					'{{ route('action.delete-furniture') }}',
					{id: $(this).data('id')},
					(response) => {
						alert(response.message);
						if (response.ack === 'success') {
							$(this).parent().parent().remove();
						}
					});
			});
			@endif
		});
	</script>
@endsection