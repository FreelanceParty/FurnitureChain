@php
	use App\Models\Furniture;
	use App\ValueObjects\Color;
	/** @var Furniture $furniture */
@endphp

<div class="js-edit-content flex flex-col gap-3 max-w-[700px]">
	<div class="font-semibold text-2xl">{{ trans('general.editing') }}</div>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
		<label>
			{{ trans('general.title') }}
			@include('_elements.input_text', [
				'id'          => 'title',
				'name'        => 'title',
				'isRequired'  => TRUE,
				'isAutofocus' => TRUE,
				'value'       => $furniture?->getTitle(),
			])
		</label>
		<label>
			{{ trans('general.code') }}
			@include('_elements.input_text', [
				'id'          => 'code',
				'name'        => 'code',
				'isRequired'  => TRUE,
				'value'       => $furniture?->getCode(),
			])
		</label>
		<label>
			{{ trans('general.price') }}
			@include('_elements.input_text', [
				'id'          => 'price',
				'type'        => 'number',
				'name'        => 'price',
				'value'       => $furniture?->getPrice(),
			])
		</label>
		<label class="flex flex-col">
			{{ trans('general.color') }}
			<select id="color" name="color">
				@foreach( Color::getAll() as $key => $title )
					<option value="{{ $key }}">{{ $title }}</option>
				@endforeach
			</select>
		</label>
		<label>
			{{ trans('general.discount') . ' (%)' }}
			@include('_elements.input_text', [
				'id'          => 'discount',
				'type'        => 'number',
				'name'        => 'discount',
				'value'       => $furniture?->getDiscount(),
			])
		</label>
		<label>
			{{ trans('general.discount_ends_at') }}
			@include('_elements.input_text', [
				'id'          => 'discount-ends-at',
				'type'        => 'date',
				'name'        => 'discount_ends_at',
				'value'       => $furniture?->getDiscountEndsAt()?->toDateString(),
			])
		</label>
		<label class="flex flex-col col-span-2">
			{{ trans('general.description') }}
			<textarea id="description" name="description" rows="5" cols="33">
				{{ $furniture?->getDescription() }}
			</textarea>
		</label>
		@include('_elements.checkbox', [
			'id'        => 'ready-to-shipping',
			'name'      => 'ready_to_shipping',
			'text'      => trans('general.ready_to_shipping'),
			'isChecked' => $furniture?->isReadyToShipping(),
		])
		<label class="flex flex-col">
			{{ trans('general.image') }}
			<div class="m-auto w-40 h-40">
				<img class="js-image-preview rounded-xl" src="{{ $furniture?->getImage() ?? asset('images/tmp_logo.png') }}" alt="">
			</div>
			<div class=" flex flex-col gap-2">
				<input type="file" class="js-image-selector">
				<button class="js-delete-photo bg-blue-700 text-white px-3 py-1 rounded-md">{{ trans('general.delete_image') }}</button>
			</div>
		</label>
	</div>
	@include('_elements.button', [
		'id'    => 'submit',
		'text'  => trans('general.save'),
		'route' => route('action.update-furniture-data'),
		'class' => 'w-fit ml-auto min-w-32',
	])
	@include('_elements.button', [
		'id'    => 'cancel',
		'text'  => trans('general.cancel'),
		'route' => route('content.edit-furniture'),
		'class' => 'w-fit ml-auto min-w-32',
	])
</div>
<script>
	$(document).ready(function () {
		'use strict';

		const $console         = $('#console'),
		      $content         = $console.find('#content'),
		      $editContent     = $content.find('.js-edit-content'),
		      $submit          = $editContent.find('#submit'),
		      $title           = $editContent.find('#title'),
		      $code            = $editContent.find('#code'),
		      $price           = $editContent.find('#price'),
		      $color           = $editContent.find('#color'),
		      $discount        = $editContent.find('#discount'),
		      $description     = $editContent.find('#description'),
		      $discountEndsAt  = $editContent.find('#discount-ends-at'),
		      $readyToShipping = $editContent.find('#ready-to-shipping'),
		      $imageSelector   = $editContent.find(".js-image-selector"),
		      $imagePreview    = $editContent.find(".js-image-preview"),
		      $deleteButton    = $editContent.find(".js-delete-photo"),
		      $cancel          = $editContent.find('#cancel');

		$submit.on("click", function () {
			const formData = new FormData();
			formData.append("_token", '{{ csrf_token() }}');
			formData.append("id", '{{ $furniture?->getId() ?? -1 }}');
			formData.append("title", $title.val());
			formData.append("code", $code.val());
			formData.append("price", $price.val());
			formData.append("color", $color.find(':selected').val());
			formData.append("discount", $discount.val());
			formData.append("description", $description.val());
			formData.append("discount_ends_at", $discountEndsAt.val());
			if ($readyToShipping.is(':checked')) {
				formData.append("ready_to_shipping", $readyToShipping.val());
			}
			formData.append("type_id", '{{ $typeId }}');
			if ($imageSelector[0].files[0] !== undefined) {
				formData.append("image", $imageSelector[0].files[0]);
			}

			$.ajax({
				type:        "POST",
				url:         '{{ route('action.update-furniture-data') }}',
				data:        formData,
				processData: false,
				contentType: false,
				success:     (response) => {
					if (response.ack === 'success') {
						changeContent('{{ route('content.furnitures') }}', {type_id: response.typeId});
					}
					alert(response.message);
				}
			});
		});

		$deleteButton.on("click", function () {
			$imageSelector.val(null);
			$imagePreview.attr("src", "{{ asset('images/tmp_logo.png') }}");
		});

		$imageSelector.on("change", function () {
			if ($(this)[0].files[0]) {
				let reader = new FileReader();
				reader.onload = function (e) {
					$imagePreview.attr("src", e.target.result);
				};

				reader.readAsDataURL($(this)[0].files[0]);
			}
		});

		$cancel.on('click', function () {
			changeContent($(this).data('route'), {id: '{{ $furniture?->getId() }}'});
		});
	});
</script>