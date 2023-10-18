<x-app-layout>
    <x-slot name="header">
        {{ __('Your favorite games')}}
    </x-slot>
    <div class="kakomi">
        <h1 class="title">【List of Games】</h1>
        @foreach($games as $game)
        <p class="game_child item"><a href="/games/{{ $game->id }}">{{ $game->translated_game_name }}</a></p>
        @endforeach
    </div>

</x-app-layout>