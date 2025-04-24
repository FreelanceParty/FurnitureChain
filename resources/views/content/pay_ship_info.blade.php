@extends('_templates.a_content')

@section('content')
	<div class="flex flex-col gap-5">
		<div class="font-semibold text-3xl">{{ trans('general.pay_and_ship') }}</div>
		<div class="flex flex-col gap-4">

			<main class="max-w-6xl mx-auto px-4 py-8 space-y-10">
				<section class="bg-white rounded-2xl shadow-md p-6">
					<h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
						<img src="{{ asset('images/icons/payment.png') }}" alt="Оплата" class="w-5 h-5">
						Способи оплати
					</h2>
					<p class="text-gray-700">
						Ми прагнемо зробити процес оплати максимально зручним для вас. Ви можете скористатися банківською карткою (Visa або MasterCard), що дозволяє миттєво оплатити замовлення онлайн
						без додаткових комісій. Також підтримується оплата через Apple Pay та Google Pay, що особливо зручно для користувачів смартфонів.
					</p>
					<p class="text-gray-700 mt-4">
						Для клієнтів, які віддають перевагу класичному банківському переказу, доступна можливість перерахування коштів на наш рахунок. І, звичайно, ви можете скористатися накладеним
						платежем – оплатити товар безпосередньо при отриманні на пошті.
					</p>
				</section>

				<section class="bg-white rounded-2xl shadow-md p-6">
					<h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
						<img src="{{ asset('images/icons/shipping.png') }}" alt="Доставка" class="w-5 h-5">
						Способи доставки
					</h2>
					<p class="text-gray-700">
						Ми здійснюємо доставку по всій території України. Основним нашим партнером є компанія "Нова Пошта", яка гарантує швидку доставку протягом 1-3 робочих днів. Ви також можете
						обрати "Укрпошту" — це чудовий варіант, якщо вам зручно отримати посилку у найближчому відділенні.
					</p>
					<p class="text-gray-700 mt-4">
						Для мешканців Києва ми пропонуємо кур’єрську доставку просто до дверей. Якщо ви бажаєте забрати замовлення особисто, передбачена опція самовивозу з нашого магазину. Ми завжди
						готові підлаштуватись під ваші потреби.
					</p>
				</section>

				<section class="bg-white rounded-2xl shadow-md p-6">
					<h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
						<img src="{{ asset('images/icons/info.png') }}" alt="Інформація" class="w-5 h-5">
						Додаткова інформація
					</h2>
					<p class="text-gray-700">
						Після оформлення замовлення наш менеджер зв’яжеться з вами телефоном або електронною поштою, щоб підтвердити деталі, обрати зручний для вас спосіб доставки та надати реквізити
						для оплати (якщо потрібно).
					</p>
					<p class="text-gray-700 mt-4">
						Ми обробляємо замовлення щодня, і прагнемо, щоб ви отримали свій товар у найкоротший термін. Усі відправлення ретельно пакуються, щоб забезпечити цілісність товару під час
						транспортування.
					</p>
				</section>
			</main>
		</div>
	</div>
@endsection
