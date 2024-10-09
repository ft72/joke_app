<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>

            @if (session('joke'))
                <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-2">Joke:</h3>
                    <p>{{ session('joke') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('joke.refresh') }}" class="mt-4">
                @csrf
                <x-primary-button>
                    Get a New Joke
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
