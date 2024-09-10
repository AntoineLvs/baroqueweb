@extends('layouts.app')
@section('content')

<div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">

    <div class="py-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

            <div class="px-4 py-5 sm:px-6">
                <h3>Tenants</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <div class="py-4">
                    <livewire:tenant.index-tenant/>
                </div>
        
            </div>
        </div>
    </div>
</div>

@endsection