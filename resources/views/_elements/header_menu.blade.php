<div class="cursor-pointer flex flex-col gap-1 items-center {{ $class ?? '' }}"
		@if( ! empty($route) )
			data-route="{{ $route }}"
		@endif>
	<img width="30" height="30" src="{{ $imageSrc ?? '' }}" alt="">
	<div>{{ $text ?? '' }}</div>
</div>