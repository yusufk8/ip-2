@extends('layout')

@section('main')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-white">Mesajlaşma: {{ $otherUser->name ?? $otherUser->email }}</h1>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-4 h-96 overflow-y-auto">
            @foreach($messages as $message)
                <div class="mb-4 {{ $message->sender_id == Auth::id() ? 'text-right' : 'text-left' }}">
                    <div class="inline-block p-2 rounded-lg {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                        {{ $message->content }}
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                        {{ $message->created_at->format('d.m.Y H:i') }}
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ route('messages.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">
            <div class="flex">
                <input type="text" name="content" class="flex-grow rounded-l-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Mesajınızı yazın...">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Gönder</button>
            </div>
        </form>
    </div>
</div>
@endsection

