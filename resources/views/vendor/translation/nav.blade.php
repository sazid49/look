<nav class="header">

    <h1 class="text-lg px-6">
		<img src="{{ URL::asset('img/logo.png') }}" alt="{{ config('app.name') }}" width="80%">
	</h1>

    <ul class="flex-grow justify-end pr-2">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ set_active('') }}{{ set_active('/create') }}">
                {{-- @include('translation::icons.user') --}}
                {{ __('Administration') }}
            </a>
        </li>
        <li>
            <a href="{{ route('languages.index') }}" class="{{ set_active('') }}{{ set_active('/create') }}">
                @include('translation::icons.globe')
                {{ __('translation::translation.languages') }}
            </a>
        </li>
        <li>
            <a href="{{ route('languages.translations.index', config('app.locale')) }}" class="{{ set_active('*/translations') }}">
                @include('translation::icons.translate')
                {{ __('translation::translation.translations') }}
            </a>
        </li>
    </ul>

</nav>