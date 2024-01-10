@extends('layouts.app', ['page' => 'Edit Tenant', 'pageSlug' => 'edit-tenant', 'section' => 'main'])
@section('content')


<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
  @if (auth()->user()->Tenant)

  <livewire:tenant.edit />

  @else

  <div class="py-10">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="mb-4 text-2xl font-bold text-gray-900">Tenant</h1>

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="bg-gray-50 sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">You are super admin</h3>
          <div class="mt-2 max-w-xl text-sm text-gray-500">
            <p>Please login to edit a tenant</p>
          </div>

        </div>
      </div>
    </div>
  </div>


  @endif
</main>


@endsection
