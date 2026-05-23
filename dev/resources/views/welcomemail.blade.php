<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 py-12 shadow-lg">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-2">
                Bienvenue parmi nous !
            </h1>
            <p class="text-indigo-100 text-lg opacity-90">
                Nous sommes ravis de vous compter comme nouveau membre.
            </p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto -mt-10 px-6">
        <div class="bg-white rounded-xl shadow-xl p-8 md:p-12 text-gray-800">
            <div class="flex justify-center mb-6">
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-center mb-4">Confirmez votre compte</h2>
            
            <p class="text-center text-gray-600 leading-relaxed mb-8">
                Bonjour <strong>{{ $user->name }}</strong> !
                Cliquez sur le bouton ci-dessous pour vérifier votre adresse email et activer votre compte.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ $url }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 text-center">
                    Vérifier mon email
                </a>
            </div>

            <p class="text-center text-gray-400 text-sm mt-6">
                Ce lien expire dans 5 minutes.
            </p>
        </div>
    </div>

</body>
</html>