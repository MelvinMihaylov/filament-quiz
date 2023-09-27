<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quizzes') }}
        </h2>
    </x-slot>

    @foreach ($quizzes as $quiz)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <a href="{{ route('quiz.show', [auth()->user(), $quiz]) }}"
                            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $quiz->name }}
                            </h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">
                                Click on the banner to start the QUIZ! Estemated duration 2 hours.
                            </p>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
