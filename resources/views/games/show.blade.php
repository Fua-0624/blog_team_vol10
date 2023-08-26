<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }}
    </x-slot>
    <body>
        <h1 class="text-lg font-semibold">【スレッド一覧】</h1>
        <div class="item">
            @foreach ($threads as $thread)
                <p>
                    <span class="text-sm">{{ $thread->created_at }}&nbsp;&nbsp;&nbsp;</span>
                    <span class="text-sm">{{ $thread->user->name }}&nbsp;&nbsp;&nbsp;</span>
                    <a href="/games/{{ $game->id }}/threads/{{ $thread->id }}">{{ $thread->title }}</a>
                </p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read button">もっと見る</button>
        </div>
        <br>
        <div>
            <p class="create">[<a href="/games/{{ $game->id }}/threads/create">スレッド作成</a>]</p>
            <a href="/">HOMEに戻る</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</x-app-layout>
