<form action="{{ route('sign-up') }}" method="POST" class="space-y-6 max-w-2xl mx-auto relative" x-data="{ 
        step: 1, 
        totalSteps: 3,
        showPassword: false 
    }" @submit="$dispatch('loading', 'Creating Account...')">
    @csrf

    <div class="mb-8">
        <p class="text-center text-sm font-medium text-gray-700 mb-2">
            Step <span x-text="step"></span> of <span x-text="totalSteps"></span>
        </p>
        <div class="w-full bg-gray-300 rounded-full h-2.5">
            <div class="bg-green-600 h-2.5 rounded-full transition-all duration-500 ease-in-out"
                :style="'width: ' + ((step / totalSteps) * 100) + '%'"></div>
        </div>
    </div>

    <div class="relative min-h-96">

        <div x-show="step === 1" class="absolute inset-0" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-400" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-full">
            <h2 class="text-xl font-bold mb-4">Personal Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="w-full px-3 py-1.5 border border-gray-300 rounded mt-0.5 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                    @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="w-full px-3 py-1.5 border border-gray-300 rounded mt-0.5 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                    @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="w-full px-3 py-1.5 border border-gray-300 rounded mt-0.5 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Display Name</label>
                <input type="text" name="display_name" value="{{ old('display_name') }}"
                    class="w-full px-3 py-1.5 border border-gray-300 rounded mt-0.5 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('display_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" @click="step = 2"
                    class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 font-bold">
                    Next
                </button>
            </div>
        </div>

        <div x-show="step === 2" class="absolute inset-0" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-400" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-full">
            <h2 class="text-xl font-bold mb-4">Additional Details</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phone_number" value="{{ old('phone_number') }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="0[689][0-9]{8}" maxlength="10"
                        inputmode="numeric"
                        class="w-full px-3 py-1.5 border border-gray-300 rounded mt-0.5 focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" max="{{ date('Y-m-d') }}"
                        class="w-full px-3 py-1.5 border border-gray-300 rounded mt-0.5 focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('birth_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <div class="relative mt-0.5">
                    <select name="gender"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-green-500 appearance-none cursor-pointer"
                        required>
                        <option value="" disabled selected>Please select your gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>

                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-6 flex justify-between">
                <button type="button" @click="step = 1"
                    class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500 font-bold">
                    Back
                </button>
                <button type="button" @click="step = 3"
                    class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 font-bold">
                    Next
                </button>
            </div>
        </div>

        <div x-show="step === 3" class="absolute inset-0" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-400" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-full">
            <h2 class="text-xl font-bold mb-4">Account Information</h2>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-1.5 border border-gray-300 rounded mt-0.5 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-0.5">
                    <input :type="showPassword ? 'text' : 'password'" name="password"
                        class="w-full px-3 py-1.5 border border-gray-300 rounded pr-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>

                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="relative mt-0.5">
                    <input :type="showPassword ? 'text' : 'password'" name="password_confirmation"
                        class="w-full px-3 py-1.5 border border-gray-300 rounded pr-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>

                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <button type="button" @click="step = 2"
                    class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500 font-bold">
                    Back
                </button>
                <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 font-bold shadow-md transform hover:-translate-y-0.5 transition">
                    Sign Up
                </button>
            </div>
        </div>
    </div>
</form>