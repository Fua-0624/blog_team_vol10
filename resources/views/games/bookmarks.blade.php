<x-app-layout>
    <x-slot name="header">
        {{ __('お気に入りのゲーム')}}
    </x-slot>
    <div class="kakomi">
        <h1 class="title">【ゲーム一覧】</h1>
        @foreach($games as $game)
        <p class="game_child item"><a href="/games/{{ $game->id }}">{{ $game->game_name }}</a></p>
        @endforeach
    </div>

</x-app-layout>