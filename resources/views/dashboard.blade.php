@extends('layout')
@section('content')
<div class="autoalign">
<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-light border-b border-gray-200">
                    <a href="{{Route('patients.index')}}">Main</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
@extends('layout')
@section('content')

