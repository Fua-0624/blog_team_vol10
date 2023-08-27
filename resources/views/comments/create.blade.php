<x-app-layout>
    <x-slot name="header">
        {{$game->game_name}} >  {{$thread->title}}
    </x-slot>
    <div style="width:50%; margin: 0 auto; text-align:center;">
        <form action="/threads/{{ $thread->id }}/comments/post" method="POST">
        @csrf
        <div class="Form">
            <div class="Form-Item">
                <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>コメント内容</p>
                <textarea class="Form-Item-Textarea" name="comment[body]"></textarea>
            </div>
            <input type="submit" class="Form-Btn" value="送信する">
        </div>
        </form>
    </div>
</x-nav-layout>