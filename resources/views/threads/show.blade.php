<x-app-layout>
    <x-slot name="header">
        {{ $game->title }} > {{ $thread->title}}
    </x-slot>
    <body>
        <h1>スレッドの概要</h1>
        <p>{{ $thread->body }}</p>
        <h1>コメント</h1>
        <p class="create">[<a href="/threads/{{ $thread->id }}/comment/create">コメント作成</a>]</p>
        <div class="flex item">
            @foreach ($comments as $comment)
                <p>{{ $comment->created_at }}</p>
                <p>{{ $comment->user->name }}</p>
                <p>{{ $comment->body }}</p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read">もっと見る</button>
        </div>
        <div>
            <a href="/">戻る</a>
        </div>
    </body>
    
<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript" src="{{ asset('/js/Threadindex.js') }}"></script>
</x-app-layout>
