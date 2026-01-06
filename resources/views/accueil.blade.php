<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SicilyLines - Accueil</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] flex items-center flex-col min-h-screen font-sans">
        
        <header class="w-full px-6 lg:px-12 py-4 flex items-center justify-between bg-white shadow-sm border-b border-gray-100">
            <div class="flex items-center">
                <img src="{{ asset('Image/logo.png') }}" alt="Logo" class="h-10 w-auto">
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 border-[#19140035] border text-[#1b1b18] rounded-sm text-sm font-medium hover:bg-gray-50 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold shadow-sm hover:bg-blue-700 transition">
                            Connexion
                        </a>
                    @endauth
                </nav>
            @endif
        </header>

        <main class="w-full">
            <section class="relative h-[450px] w-full overflow-hidden bg-gray-200" 
                     x-data="{ active: 0 }" 
                     x-init="setInterval(() => { active = active === 1 ? 0 : 1 }, 5000)">
                
                <div class="absolute inset-0 transition-opacity duration-1000" :class="active === 0 ? 'opacity-100' : 'opacity-0'">
                    <img src="{{ asset('Image/bateau3.jpg') }}" class="w-full h-full object-cover">
                </div>

                <div class="absolute inset-0 transition-opacity duration-1000" :class="active === 1 ? 'opacity-100' : 'opacity-0'" x-cloak>
                    <img src="{{ asset('Image/bateau1.webp') }}" class="w-full h-full object-cover">
                </div>

                <div class="absolute inset-0 flex flex-col items-center justify-center bg-black/10">
                    <h1 class="text-4xl md:text-5xl font-serif italic text-white drop-shadow-md text-center px-4">
                        Votre traversée vers la Sicile commence
                    </h1>
                </div>
            </section>

            <section class="max-w-7xl mx-auto px-6 py-20">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset('Image/bateau4.jpg') }}" class="w-full h-60 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl">Week end entre amis</h3>
                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">Vivez une semaine au côté des dauphins avec vos amis à bord de nos bateaux.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset('Image/bateau5.jpg') }}" class="w-full h-60 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl">Aventure en famille</h3>
                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">Soif d'aventure en famille ? N'hésitez pas, montez sur nos derniers bateaux de luxe.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset('Image/bateau2.webp') }}" class="w-full h-60 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl">Traverser en amoureux</h3>
                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">Besoin de sauver votre couple ? Notre paquebot est là pour vous sauver.</p>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <footer class="w-full py-8 border-t border-gray-100 text-center bg-white">
            <p class="text-gray-400 text-sm italic"></p>
        </footer>
    </body>
</html>