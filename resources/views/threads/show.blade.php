<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }} > {{ $thread->title}}
    </x-slot>
    <body>
        <h1 class="text-lg font-semibold">【スレッドの概要】</h1>
        <p>{{ $thread->body }}</p>
        <br>
        <h1 class="text-lg font-semibold">【コメント】</h1>
        <div class="item">
            @foreach ($comments as $comment)
                <p>
                    <span class="text-sm">{{ $comment->created_at }}&nbsp;&nbsp;&nbsp;</span>
                    <span class="text-sm">{{ $comment->user->name }}&nbsp;&nbsp;&nbsp;</span>
                    {{ $comment->body }}
                </p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read button">もっと見る</button>
        </div>
        <br>
        <div>
            <p class="create">[<a href="/games/{{ $game->id }}/threads/{{ $thread->id }}/comment/create">コメント作成</a>]</p>
            <a href="/">HOMEに戻る</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($comments))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</x-app-layout>
