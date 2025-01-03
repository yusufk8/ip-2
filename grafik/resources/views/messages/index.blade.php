@extends('layout')

@section('main')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-white">Mesajlar</h1>
    
    
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="mb-4">
            <input type="text" 
                   id="designerSearch" 
                   class="w-full p-3 border rounded-lg" 
                   placeholder="Tasarımcı adı ile arama yapın...">
        </div>

        
        <div id="designersList" class="space-y-4">
            @foreach($designers as $designer)
                <div class="designer-item border-b border-gray-200 py-3 hover:bg-gray-50 transition-all">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-purple-600 font-bold">
                                    {{ strtoupper(substr($designer->İsim ?? 'T', 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">{{ $designer->İsim }}</h3>
                                <p class="text-sm text-gray-500">
                                    @foreach($designer->allDesigners() as $type => $designers)
                                        <span class="inline-block bg-purple-100 text-purple-800 rounded-full px-2 py-1 text-xs mr-1 mb-1">
                                            {{ $type }}
                                        </span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <button 
                            onclick="startChat({{ $designer->id }}, '{{ $designer->İsim }}')"
                            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Mesaj Gönder
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Aktif Sohbetler</h2>
        <div class="space-y-2">
            @foreach($conversations as $conversation)
                @php
                    $user = \App\Models\User::find($conversation['user_id']);
                @endphp
                <a href="{{ route('messages.show', $user->id) }}" 
                   class="block p-3 hover:bg-gray-50 rounded-lg transition-all">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-purple-600 font-bold">
                                    {{ strtoupper(substr($user->İsim ?? 'U', 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <p class="font-medium">{{ $user->İsim ?? $user->email }}</p>
                                <p class="text-sm text-gray-500">
                                    {{ $conversation['last_message']->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        @if($conversation['unread_count'] > 0)
                            <span class="bg-purple-600 text-white px-2 py-1 rounded-full text-xs">
                                {{ $conversation['unread_count'] }}
                            </span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('designerSearch');
    const designerItems = document.querySelectorAll('.designer-item');

    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();

        designerItems.forEach(item => {
            const designerName = item.querySelector('h3').textContent.toLowerCase();
            const designerTypes = item.querySelectorAll('.text-purple-800');
            let matchFound = designerName.includes(searchTerm);

            
            designerTypes.forEach(type => {
                if (type.textContent.toLowerCase().includes(searchTerm)) {
                    matchFound = true;
                }
            });

            item.style.display = matchFound ? 'block' : 'none';
        });
    });
});

function startChat(designerId, designerName) {
    window.location.href = `/messages/${designerId}`;
}
</script>
@endsection