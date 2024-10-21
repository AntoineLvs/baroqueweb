<div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="card-title">Tasks</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                <div>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        General Informations
                                    </h3>
                                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                        Provide some general informations about your task.
                                    </p>
                                </div>

                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Task Name
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                {{ $name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Description
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                {{ $description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Status (*)
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                @php
                                                $statusInfo = $task->getStatus();
                                                @endphp
                                                <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusInfo['color'] }}-200 text-{{ $statusInfo['color'] }}-800">
                                                    {{ $statusInfo['text'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>