<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }}
    </x-slot>
    <body>
      <div style="width:50%; margin: 0 auto; text-align:center;">
        <form action="/translated/games/{{ $game->id }}/threads/post" method="POST">
            @csrf
            <div>
            Title:<input type="text" name="thread[title]" placeholder="Please write thread's title" >
            <br>
            content:<input type="text" name="thread[body]" placeholder="Please write thread's content"　>
            <br>
            <button class="button"> submit </button>
        </form>
    </div>
    </body>
</x-nav-layout>