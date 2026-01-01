<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center font-sans antialiased">
    <div x-data="{ activeTab: '{{ $errors->has('name') || $errors->has('password_confirmation') ? 'sign-up' : 'sign-in' }}' }"
        class="w-full max-w-md mx-4 bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all">

        <div class="flex relative bg-white p-1 rounded-t-2xl">
            <button @click="activeTab = 'sign-in'"
                class="w-1/2 py-2 text-sm font-bold rounded-xl transition-all duration-300 focus:outline-none"
                :class="activeTab === 'sign-in' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:text-gray-700'">
                Sign In
            </button>

            <button @click="activeTab = 'sign-up'"
                class="w-1/2 py-2 text-sm font-bold rounded-xl transition-all duration-300 focus:outline-none"
                :class="activeTab === 'sign-up' ? 'bg-white text-green-600 shadow-sm' : 'text-gray-500 hover:text-gray-700'">
                Sign Up
            </button>
        </div>

        <div class="p-8">

            <div x-show="activeTab === 'sign-in'" x-transition:enter="transition ease-out duration-300 delay-100"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-4">

                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Hello!</h2>
                    <p class="text-sm text-gray-500">Sign in to your account</p>
                </div>

                <x-sign-in-form />
            </div>

            <div x-show="activeTab === 'sign-up'" x-cloak
                x-transition:enter="transition ease-out duration-300 delay-100"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="space-y-4">

                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Hello, Friend!</h2>
                </div>

                <x-sign-up-form />
            </div>

        </div>
    </div>
    <x-loading />
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/alert.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if ($errors->any())
            showToast('error', 'Opps...', 'Something went wrong! Please check your input.');
        @endif

        @if (session('success'))
            showToast('success', 'Success', "{{ session('success') }}");
        @endif

        @if (session('error'))
            showToast('error', 'Error', "{{ session('error') }}");
        @endif

    });
</script>