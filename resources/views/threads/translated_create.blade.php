<x-app-layout>
    <x-slot name="header">
        {{ $game->translated_game_name }}
    </x-slot>
    <div style="width:50%; margin: 0 auto; text-align:center;">
        <form action="/translated/games/{{ $game->id }}/threads/post" method="POST">
        @csrf
        <div class="Form">
            <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">require</span>Title</p>
                <input type="text" class="Form-Item-Input" name="thread[translated_title]" placeholder="please write purpose">
            </div>
            <div class="Form-Item">
                <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">require</span>body</p>
                <textarea class="Form-Item-Textarea" name="thread[translated_body]"></textarea>
            </div>
            <input type="submit" class="Form-Btn" value="submmit">
        </div>
        </form>
    </div>
</x-nav-layout>