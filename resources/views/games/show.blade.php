<x-app-layout>
    <x-slot name="header">
        {{ $game->title }}
    </x-slot>
    <body>
        <h1>スレッド一覧</h1>
        <div class="flex item">
            @foreach ($threads as $thread)
                <p>{{ $thread->created_at }}</p>
                <p>{{ $thread->user->user_name }}</p>
                <p><a href="/games/{{ $game->id }}/threads/{{ $thread->id }}">{{ $thread->title }}</a></p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read">もっと見る</button>
        </div>
        <div>
            <p class="create">[<a href="/games/{{ $game->id }}/threads/create">スレッド作成</a>]</p>
            <a href="/">戻る</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript" src="{{ asset('/js/Threadindex.js') }}"></script>
</x-app-layout>
