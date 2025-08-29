<x-guest-layout>
  <h1 class="text-2xl font-bold mb-4 text-center">Admin Login</h1>
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <form method="POST" action="{{ route('admin.login.check') }}"> 
    @csrf
    <!-- Email -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <!-- Remember Me -->
    <div class="flex items-center justify-between mt-4">
      <label class="inline-flex items-center">
        <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
      </label>
    </div>
    <x-primary-button class="mt-4 w-full"> {{ __('Log in') }} </x-primary-button>
  </form>
</x-guest-layout>