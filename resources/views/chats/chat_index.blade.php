<x-app-layout>
    <x-slot name="header">
        {{ __('chat一覧') }}
    </x-slot>
        @foreach($users as $user)
            @foreach($chats_owner as $chat)
                <p><a href="/chat/{{ $chat->guest_id }}">
                    @if( $user->id == $chat->guest_id)
                        {{ $user->name }}
                    @endif
                </a></p>
            @endforeach
            @foreach($chats_guest as $chat)
                <p><a href="/chat/{{ $chat->owner_id}}">
                    @if( $user->id == $chat->owner_id)
                        {{ $user->name}}
                    @endif
                </a></p>
            @endforeach
        @endforeach
</x-app-layout>