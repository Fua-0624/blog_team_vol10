<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }} > {{ $thread->title}}
    </x-slot>
    <body>
        <div class="kokuban">
            <h1 class="title-t2">【スレッドの概要】</h1>
            <p>{{ $thread->body }}</p>
            <br>
        </div>
        <div class="kakomi">
            <h1 class="title">コメント</h1>
            <div class="item">
                @foreach ($comments as $comment)
                    <p>
                        <span class="text-sm">{{ $comment->created_at }}&nbsp;&nbsp;&nbsp;</span>
                        <span class="text-sm">
                        @if ($comment->user->grade === 1)
                            小：{{ $comment->user->name}}&nbsp;&nbsp;&nbsp;
                        @elseif ($comment->user->grade === 2)
                            中：{{ $comment->user->name}}&nbsp;&nbsp;&nbsp;
                        @elseif( $comment->user->grade === 3)
                            高：{{ $comment->user->name}}&nbsp;&nbsp;&nbsp;
                        @else
                            {{ $comment->user->name}}&nbsp;&nbsp;&nbsp;
                        @endif</span>
                        {{ $comment->body }}
                    </p>
                @endforeach
            </div>
            <div class="more-read-button">
                <button id="moreRead" class="more-read button">もっと見る</button>
            </div>
        </div>
        <br>
        <div>
            <p class="Form-Btn">[<a href="/games/{{ $game->id }}/threads/{{ $thread->id }}/comment/create">コメント作成</a>]</p>
            <a class="Form-Btn" href="/">HOMEに戻る</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($comments))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</x-app-layout>
