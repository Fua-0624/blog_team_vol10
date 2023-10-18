<x-app-layout>
    <x-slot name="header">
        {{$game->translated_game_name}} >  {{$thread->translated_title}}
    </x-slot>
    <body>
     <div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="/translated/threads/{{ $thread->id }}/comments/post" method="POST">
        @csrf
        <div class="Form-Item">
            <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">Required</span>Comment</p>
            <textarea class="Form-Item-Textarea" name="comment[translated_body]"></textarea>
        </div>
        <input type="submit" class="Form-Btn" value="Submit">
    </body>
</x-nav-layout>