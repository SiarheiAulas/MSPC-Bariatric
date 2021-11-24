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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="align-center">
                <x-label for="password" :value="__('Password')" class="form-label" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" class="form-control"/>
            </div>

            <div class="flex justify-end mt-4 autoalign">
                <x-button class="btn btn-primary btn-lg">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</div>
@endsection