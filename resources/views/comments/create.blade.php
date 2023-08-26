<x-app-layout>
    <x-slot name="header">
        {{$game->game_name}} >  {{$thread->title}}
    </x-slot>
    <body>
     <div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="/threads/{{ $thread->id }}/comments/post" method="POST">
        @csrf
        <div>
            内容：
            <input type = "text" name="comment[body]" placeholder="投稿する内容">
        </div>
        <button class="button">送信</button>
    </body>
</x-nav-layout>