<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SicilyLines - Accueil</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col font-sans">
        
        <header class="w-full px-6 lg:px-12 py-4 flex items-center justify-between bg-white shadow-sm border-b border-gray-100">
            <div class="flex items-center gap-3">
                <img src="{{ asset('Image/logo.png') }}" alt="Logo SicilyLines" class="h-12 w-auto">
                <span class="font-bold text-xl text-[#004a99] tracking-tight">SicilyLines</span>
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center gap-8 text-sm font-medium">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">Bateau</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-blue-600 text-white rounded-md">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Connexion</a>
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex-grow">
            <section class="relative h-[480px] w-full">
                <img src="{{ asset('Image/bateau3.jpg') }}" alt="Sicily Lines Hero" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/5"></div>
            </section>

            <div class="py-16 text-center">
                <h1 class="text-4xl md:text-5xl font-serif italic text-gray-800">
                    Votre traversée vers la Sicile commence
                </h1>
            </div>

            <section class="max-w-7xl mx-auto px-6 pb-24">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 group">
                        <div class="overflow-hidden h-64">
                            <img src="{{ asset('Image/bateau4.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-8">
                            <h3 class="font-bold text-xl mb-3">Week end entre amis</h3>
                            <p class="text-gray-500 text-sm">Vivez une semaine au côté des dauphins avec vos amis à bord de nos bateaux.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border-b-8 border-blue-500 border-x border-t border-gray-100 group">
                        <div class="overflow-hidden h-64">
                            <img src="{{ asset('Image/bateau5.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-8">
                            <h3 class="font-bold text-xl mb-3">Aventure en famille</h3>
                            <p class="text-gray-500 text-sm">Soif d'aventure en famille ? N'hésitez pas, montez sur nos derniers bateaux de luxe.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 group">
                        <div class="overflow-hidden h-64">
                            <img src="{{ asset('Image/bateau2.webp') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-8">
                            <h3 class="font-bold text-xl mb-3">Traverser en amoureux</h3>
                            <p class="text-gray-500 text-sm">Besoin de sauver votre couple ? Notre paquebot est là pour vous sauver.</p>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <footer class="py-10 bg-gray-50 border-t border-gray-200 text-center">
            <p class="text-gray-400 text-sm italic">&copy; {{ date('Y') }} SicilyLines - L'excellence maritime.</p>
        </footer>
    </body>
</html>