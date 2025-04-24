@extends('_templates.a_content')

@section('content')
	<div class="flex flex-col gap-10">
		<div class="font-semibold text-3xl">Наші представництва на мапі</div>

		<div class="flex flex-col md:flex-row flex-wrap gap-6">
			@foreach( $stores as $store )
				<div class="flex-1 bg-white p-4 rounded-xl shadow-md min-w-[250px]">
					<h2 class="text-xl font-semibold mb-4 text-center">{{ $store->city->getTitle() }}</h2>
					<div id="map-{{ $store->getId() }}" class="js-map rounded-xl h-64 bg-gray-200 shadow-inner"></div>
					@if( $authUser && $authUser->isAdmin() )
						<div class="flex gap-2 mt-2">
							<input class="js-store-id" type="hidden" value="{{ $store->getId() }}">
							@include('_elements.input_text', [
								'class' => 'js-store-input w-full',
								'name'  => 'store-' . $store->getId(),
								'value' => $store->getAddress(),
							])
							@include('_elements.button', [
								'id'    => 'store-btn-' . $store->getId(),
								'class' => 'js-store-button w-fit',
								'text'  => 'Зберегти',
							])
						</div>
					@endif
				</div>
			@endforeach
		</div>
	</div>

	<script>
		$(document).ready(function () {
			let maps = [];

			@foreach( $stores as $store )
			let map{{ $store->getId() }} = L.map('map-{{ $store->getId() }}');
			maps.push(map{{ $store->getId() }});
			@endforeach

			maps.forEach(map => {
				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; OpenStreetMap contributors'
				}).addTo(map);
			});

			function showCity(city, map) {
				fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(city + ', Ukraine')}`)
					.then(response => response.json())
					.then(data => {
						if (data.length > 0) {
							const lat = data[0].lat;
							const lon = data[0].lon;
							map.setView([lat, lon], 13);
							L.marker([lat, lon]).addTo(map).bindPopup(city).openPopup();
						}
					});
			}

			@foreach( $stores as $index => $store )
			showCity("{{ $store->getFullAddress() }}", maps[{{ $index }}]);
			@endforeach

			setTimeout(() => {
				maps.forEach(map => {
					map.invalidateSize();
				});
			}, 300);

			$('.js-store-button').off('click').on('click', function () {
				sendRequest(
					'{{ route('action.update-store-address') }}',
					{
						store_id: $(this).closest('div').find('.js-store-id').val(),
						address: $(this).closest('div').find('.js-store-input').val()
					},
					(response) => {
						alert(response.message);
					}
				);
			});
		});
	</script>

@endsection
