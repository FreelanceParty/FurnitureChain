@php
	use App\ValueObjects\Color;
@endphp

@extends('_templates.a_content')

@section('content')
	<div class="flex gap-4 p-4 bg-gray-100 rounded-sm">
		<div>
			<img class="w-full h-full" src="{{ $furniture->getImage() ?? '' }}" alt='{{ 'Помилка завантаження зображення' }}'>
		</div>
		<div class="flex flex-col gap-2 w-full">
			<div>{{ $furniture->getTitle() }}</div>
			<div class="flex flex-wrap gap-1">
				@include('_elements.badge', [
					'color' => $furniture->isReadyToShipping() ? 'green' : 'red',
					'text'  => $furniture->isReadyToShipping() ? 'Готово до відправки' : 'Не готово до відправки',
				])
				@include('_elements.badge', [
					'text'  => sprintf('Код: %s', $furniture->getCode()),
				])
				@include('_elements.badge', [
					'text'  => sprintf('Колір: %s', Color::getTitleFor($furniture->getColor())),
				])
			</div>
			@if( ! empty($furniture->getDescription()) )
				<div class="flex flex-col">
					<div class="font-semibold">Опис</div>
					<div>{{ $furniture->getDescription() }}</div>
				</div>
			@endif
			@include('_elements.button', [
				'id'    => 'js-buy-btn',
				'text'  => 'Купити',
			])
		</div>
	</div>
@endsection