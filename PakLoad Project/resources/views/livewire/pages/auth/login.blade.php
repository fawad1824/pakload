<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\User;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $user = User::where('email', $this->form->email)->first();
        if ($user->status == 'pending') {
            session()->flash('message', 'Your Account is not Approved.');
            $this->redirectIntended(default: route('login', absolute: false), navigate: true);
            return;
        }

        if ($user->subscriptions == 'false') {
            // $this->form->authenticate();
            session()->flash('message', 'Buy Subscription Plan.');
            $this->redirectIntended(route('subscriptions-user', ['id' => $user->id]), 302);
            return;
        }
        $this->form->authenticate();
        Session::regenerate();
        if ($user->role == 'trucking') {
            $this->redirectIntended(default: route('searchLoading', absolute: false), navigate: true);
            return;

        }
        if ($user->role == 'manufacturer') {
            $this->redirectIntended(default: route('addLoading', absolute: false), navigate: true);
            return;

        }
        if ($user->role == 'household') {
            $this->redirectIntended(default: route('addLoading', absolute: false), navigate: true);
            return;

        }
        if ($user->role == 'admin') {
            $this->redirectIntended(default: route('admin-user-check', absolute: false), navigate: true);
            return;

        }
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <form wire:submit="login">

        @if (session()->has('message'))
            <div style="color: white;" class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
                {{ session('message') }}
            </div>
        @endif
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
