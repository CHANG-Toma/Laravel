<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($messages as $message)
                            <article class="bg-white p-4 rounded-lg shadow">
                                <h1 class="text-xl font-bold">{{ $message->author_name }}</h1>
                                <p class="text-gray-600">{{ $message->content }}</p>
                                <time class="text-gray-400">
                                    {{ \Carbon\Carbon::parse($message->published_at)->diffForHumans() }}
                                </time>
                                                            </article>
                        @endforeach
                    </div>

                    @auth
                        <form action="{{ route('messages.store') }}" method="post" class="mt-4">
                            @csrf
                            <div class="flex flex-col space-y-2">
                                <input type="text" name="author_name" placeholder="Author name" class="border border-gray-300 rounded-lg px-4 py-2">
                                <textarea name="content" placeholder="Message" class="border border-gray-300 rounded-lg px-4 py-2"></textarea>
                                <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600">Send</button>
                            </div>
                        </form>
                    @endauth
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>