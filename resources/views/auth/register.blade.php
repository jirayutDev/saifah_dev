<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center font-sans antialiased">

    <div class="w-full max-w-md mx-4 bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="flex bg-gray-100 p-1 rounded-t-2xl">

            <a href="{{ route('sign-in') }}" x-data @click="$dispatch('loading', 'Loading Sign In...')"
                class="w-1/2 py-2 text-sm font-bold rounded-xl text-gray-500 hover:text-gray-700 text-center transition">
                Sign In
            </a>

            <div
                class="w-1/2 py-2 text-sm font-bold rounded-xl bg-white text-green-600 shadow-sm text-center cursor-default">
                Sign Up
            </div>
        </div>

        <div class="p-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                <p class="text-sm text-gray-500">Join us and start your journey</p>
            </div>

            <x-sign-up-form />
        </div>
    </div>

    <x-loading />

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if ($errors->any())
                let errorHtml = '<ul style="text-align: left; margin-left: 20px;">';
                    @foreach ($errors->all() as $error) errorHtml += '<li>🔴 {{ $error }}</li>'; @endforeach
                errorHtml += '</ul>';
                Swal.fire({ icon: 'error', title: 'Check Input', html: errorHtml, confirmButtonColor: '#d33' });
            @endif
        });
    </script>
</body>

</html>