<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }}
    </x-slot>
    <body>
      <div style="width:50%; margin: 0 auto; text-align:center;">
        <form action="/games/{{ $game->id }}/threads/post" method="POST">
            @csrf
            <div>
            タイトル:<input type="text" name="thread[title]" placeholder="スレッドの目的" >
            <br>
            内容:<input type="text" name="thread[body]" placeholder="説明"　>
            <br>
            <button class="button"> 送信 </button>
        </form>
    </div>
    </body>
</x-nav-layout>