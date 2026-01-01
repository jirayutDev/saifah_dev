<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center font-sans antialiased">

    <div class="w-full max-w-md mx-4 bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="flex bg-gray-100 p-1 rounded-t-2xl">

            <div
                class="w-1/2 py-2 text-sm font-bold rounded-xl bg-white text-blue-600 shadow-sm text-center cursor-default">
                Sign In
            </div>

            <a href="{{ route('sign-up') }}" x-data @click="$dispatch('loading', 'Loading Sign Up...')"
                class="w-1/2 py-2 text-sm font-bold rounded-xl text-gray-500 hover:text-gray-700 text-center transition">
                Sign Up
            </a>
        </div>

        <div class="p-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-sm text-gray-500">Please sign in to your account</p>
            </div>

            <x-sign-in-form />
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
            @if (session('success'))
                Swal.fire({ icon: 'success', title: 'Success', text: "{{ session('success') }}", toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true });
            @endif
        });
    </script>
</body>

</html>