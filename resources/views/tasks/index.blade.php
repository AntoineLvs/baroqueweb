@extends('layouts.app', ['page' => 'task', 'pageSlug' => 'tasks', 'section' => 'main'])
@section('content')

<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
    <div class="py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900">Tasks Page</h1>

            @if (session()->has('message'))

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="pt-5">
                <div class="rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/check-circle -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('message') }}
                            </p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600" onclick="closeAlert(event)">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: solid/x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


        </div>




        @if(!session()->has('tenant_id'))



        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="card-title">Fonctionnalities</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->

                        <div>
                            <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent
              text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700
              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create a Task</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- api Token Types start -->
        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">

                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="card-title">tasks</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">

                        @if($tasks->count() == 0 )

                        <a href="{{ route('tasks.create') }}" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-6 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                            <svg class="mx-auto h-12 w-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="block text-sm font-medium text-gray-500">
                                There is not any Task yet. Create a Task now.
                            </span>
                        </a>


                        @else
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Description
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Mother Project
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Timer
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Edit
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">

                                                @foreach ($tasks as $task)
                                                <tr>


                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-indigo-700"> <a href="{{ route('tasks.show', $task) }}">
                                                                {{ $task->name}}
                                                            </a>
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            ID: {{ $task->id }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            <div class="image-container">
                                                                <div class="flex items-center justify-center">
                                                                    {{ Illuminate\Support\Str::limit($task->description, $limit = 35, $end = '...') }}

                                                                    <span class="tooltip text-gray-500"
                                                                        style="z-index: 10; transform: translateX(-50%);">{{ $task->description}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @php
                                                        $statusInfo = $task->getStatus();
                                                        @endphp
                                                        <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusInfo['color'] }}-200 text-{{ $statusInfo['color'] }}-800">
                                                            {{ $statusInfo['text'] }}
                                                        </span>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                                        <div class="text-sm text-indigo-600 hover:text-indigo-500"><a href="{{ route('projects.show', $task->project_id) }}">{{ $task->project->name}}</a></div>

                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                                        <div class="text-sm text-gray-900">{{ $task->timer}}</div>

                                                    </td>


                                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                                        <a href="{{ route('tasks.edit', $task) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </a>





                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">


                                                        <form action="{{ route('tasks.destroy', $task) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete License" onclick="confirm('Are you sure you want to remove this task? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </form>


                                                    </td>

                                                </tr>
                                                @endforeach
                                                <!-- More people... -->
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>



                        @endif




                    </div>

                </div>

            </div>
        </div>
        <!-- ApiTokenTypes end -->



        @endif


    </div>
</main>

<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>

@endsection