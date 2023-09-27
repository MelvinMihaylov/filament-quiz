<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Your quizz started!') }}
            </h2>
        </div>
    </x-slot>

    {{-- <form action="{{ route('quiz.submit') }}" method="post" enctype="multipart/form-data">
        @csrf --}}
    @foreach ($questions as $question)
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">
                            {{ $question->question_text }}</h3>
                        @foreach ($question->answers as $answer)
                            <div class="flex items-center px-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="{{ $answer->id }}" type="radio" value="{{ $answer->answer_text }}"
                                    name="{{ $question->question_text }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{ $answer->id }}"
                                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $answer->answer_text }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <button
        class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Subbmit
    </button>
    {{-- </form> --}}
</x-app-layout>
