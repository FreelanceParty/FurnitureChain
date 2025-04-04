<div id='sider' class="bg-green-300 flex flex-col min-w-[300px] h-full">
	<div id="logo" class="flex items-center ml-4 min-h-[80px]">
		<img height="60" width="60" src="{{ asset('images/logo.png') }}">
	</div>
	<div class="h-full min-w-[300px] p-4 flex flex-col gap-2">
        <div>
            <label for="cat">Категорії</label>
            <select id="cat">
                <optgroup label="Вітальня">
                    <option value="1">Тумбочки</option>
                    <option value="2">Журнальні столики</option>
                    <option value="3">Шафа</option>
                    <option value="4">Дивани</option>
                    <option value="5">Крісла</option>
                </optgroup>
                <optgroup label="Передпокій">
                    <option value="1">Крісло</option>
                    <option value="2">Шафа</option>
                    <option value="3">Тумбочки</option>
                    <option value="4">Дивани</option>
                    <option value="5">Стіл</option>
                </optgroup>
                <optgroup label="Спальня">
                    <option value="1">Ліжка</option>
                    <option value="2">Шафа</option>
                    <option value="3">Тумбочки</option>
                    <option value="4">Стільці</option>
                    <option value="5">Стіл</option>
                </optgroup>
                <optgroup label="Ванна">
                    <option value="1">Ванни</option>
                    <option value="2">Шафки</option>
                    <option value="3">Тумбочки</option>
                    <option value="4">Раковини</option>
                    <option value="5">Душові кабіни</option>
                </optgroup>
                <optgroup label="Кухня">
                    <option value="1">Шафи</option>
                    <option value="2">Полиці</option>
                    <option value="3">Тумбочки</option>
                    <option value="4">Стільці</option>
                    <option value="5">Столи</option>
                </optgroup>
            </select>
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700">{{ trans('Ціна') }}</label>
            <div class="flex space-x-4 mt-1">
                <div class="w-1/2">
                    <label class="block text-xs text-gray-700 mb-1">Від</label>
                    @include('_elements.input_text', [
                        'id'          => 'price_from',
                        'type'        => 'price',
                        'name'        => 'price_from',
                        'isRequired'  => false,
                    ])
                </div>
                <div class="w-1/2">
                    <label class="block text-xs text-gray-700 mb-1">До</label>
                    @include('_elements.input_text', [
                        'id'          => 'price_to',
                        'type'        => 'price',
                        'name'        => 'price_to',
                        'isRequired'  => false,
                    ])
                </div>
            </div>
        </div>

        <div>
            <label for="color">Колір</label>
            <select id="color" >
                <option value="white">Білий</option>
                <option value="black">Чорний</option>
                <option value="gray">Сірий</option>
                <option value="blue">Блакитний</option>
                <option value="fuchsia">Фуксія</option>
            </select>
        </div>

        <label>Інше:</label>
        <label>Готово до відправки  <input type="checkbox"></label>
        <label>Зі знижкою  <input type="checkbox"></label>

	</div>
</div>
