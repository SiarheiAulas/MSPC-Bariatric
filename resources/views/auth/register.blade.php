@extends('layout')
@section('content')
<div class="autoalign">
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="align-center">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" class="form-label" />
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" class="form-label"/>
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" class="form-label"/>
                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label"/>
                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <div class="autoalign">
                    <a href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
                <div class="autoalign">
                    <x-button class="btn btn-primary btn-lg">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</div>
@endsection
