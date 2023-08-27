<x-app-layout>
    <x-slot name="header">
        {{$game->game_name}} >  {{$thread->title}}
    </x-slot>
    <body>
     <div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="/translated/threads/{{ $thread->id }}/comments/post" method="POST">
        @csrf
        <div>
            content：
            <input type = "text" name="comment[body]" placeholder="Please write your comment">
        </div>
        <button class="button">submit</button>
    </body>
</x-nav-layout>