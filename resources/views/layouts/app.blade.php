<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Kursiki' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-50 text-slate-900">

    <header class="sticky top-0 z-50 border-b border-blue-100 bg-white/95 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-20 flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-blue-600 to-slate-900 text-white flex items-center justify-center font-bold text-lg shadow-md">
                        K
                    </div>
                    <div>
                        <div class="text-xl font-bold tracking-tight text-slate-900">Kursiki</div>
                        <div class="text-xs text-slate-500">Kursy online i praktyczna wiedza</div>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-slate-700">
                    <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Start</a>
                    <a href="{{ route('kursy.index') }}" class="hover:text-blue-600 transition">Kursy</a>
                    <a href="{{ route('blog.index') }}" class="hover:text-blue-600 transition">Blog</a>
                    <a href="{{ route('faq.index') }}" class="hover:text-blue-600 transition">FAQ</a>
                    <a href="{{ route('strony.show', 'o-nas') }}" class="hover:text-blue-600 transition">O nas</a>
                    <a href="{{ route('kontakt.index') }}" class="hover:text-blue-600 transition">Kontakt</a>
                </nav>

                <div class="hidden lg:flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="inline-flex items-center rounded-xl border border-blue-200 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-50 transition">
                            Logowanie
                        </a>

                        <a href="{{ route('register') }}" class="inline-flex items-center rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 transition">
                            Załóż konto
                        </a>
                    @endguest

                    @auth
                        <a href="{{ route('panel.index') }}" class="inline-flex items-center rounded-xl border border-blue-200 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-50 transition">
                            Panel
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 transition">
                                Wyloguj
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="mt-20 bg-slate-950 text-slate-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <h3 class="mb-4 text-lg font-semibold text-white">Kursiki</h3>
                    <p class="text-sm leading-7 text-slate-400">
                        Platforma edukacyjna z praktycznymi kursami online z obszaru IT, baz danych, web developmentu i nowoczesnych technologii.
                    </p>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold text-white">Nawigacja</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Strona główna</a></li>
                        <li><a href="{{ route('kursy.index') }}" class="hover:text-white transition">Kursy</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-white transition">Blog</a></li>
                        <li><a href="{{ route('kontakt.index') }}" class="hover:text-white transition">Kontakt</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold text-white">Informacje</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('faq.index') }}" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="{{ route('strony.show', 'o-nas') }}" class="hover:text-white transition">O nas</a></li>
                        <li><a href="{{ route('strony.show', 'regulamin') }}" class="hover:text-white transition">Regulamin</a></li>
                        <li><a href="{{ route('strony.show', 'polityka-prywatnosci') }}" class="hover:text-white transition">Polityka prywatności</a></li>
                        <li><a href="{{ route('strony.show', 'polityka-cookies') }}" class="hover:text-white transition">Cookies</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold text-white">Newsletter</h4>
                    <p class="mb-4 text-sm leading-7 text-slate-400">
                        Otrzymuj informacje o nowych kursach i materiałach.
                    </p>

                    <form method="POST" action="{{ route('newsletter.store') }}" class="space-y-3">
                        @csrf

                        <input
                            type="text"
                            name="imie"
                            value="{{ old('imie') }}"
                            placeholder="Twoje imię"
                            class="w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm text-white placeholder:text-slate-500 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 outline-none"
                        >

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Twój adres e-mail"
                            class="w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm text-white placeholder:text-slate-500 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 outline-none"
                            required
                        >

                        <label class="flex items-start gap-3 text-xs text-slate-400 leading-5">
                            <input
                                type="checkbox"
                                name="zgoda"
                                value="1"
                                class="mt-1 rounded border-slate-600 bg-slate-900 text-blue-600 focus:ring-blue-500"
                                required
                            >
                            <span>
                                Wyrażam zgodę na przetwarzanie moich danych osobowych oraz otrzymywanie informacji marketingowych drogą elektroniczną.
                            </span>
                        </label>

                        @if(session('newsletter_success'))
                            <div class="rounded-xl border border-green-800 bg-green-950/40 px-4 py-3 text-sm text-green-300">
                                {{ session('newsletter_success') }}
                            </div>
                        @endif

                        @if(session('newsletter_info'))
                            <div class="rounded-xl border border-blue-800 bg-blue-950/40 px-4 py-3 text-sm text-blue-300">
                                {{ session('newsletter_info') }}
                            </div>
                        @endif

                        @error('email')
                            <div class="rounded-xl border border-red-800 bg-red-950/40 px-4 py-3 text-sm text-red-300">
                                {{ $message }}
                            </div>
                        @enderror

                        @error('zgoda')
                            <div class="rounded-xl border border-red-800 bg-red-950/40 px-4 py-3 text-sm text-red-300">
                                Musisz wyrazić zgodę, aby się zapisać.
                            </div>
                        @enderror

                        <button
                            type="submit"
                            class="w-full rounded-xl bg-blue-600 px-4 py-3 text-sm font-medium text-white hover:bg-blue-700 transition"
                        >
                            Zapisz się
                        </button>
                    </form>
                </div>
           
            </div>
  
            <div class="mt-10 border-t border-slate-800 pt-5 text-sm text-slate-500">
                © {{ date('Y') }} Kursiki. Wszelkie prawa zastrzeżone.
            </div>
        </div>
    </footer>

</body>
</html>