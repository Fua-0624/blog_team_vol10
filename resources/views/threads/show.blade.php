<x-app-layout>
    <x-slot name="header">
        {{ $game->title }} > {{ $thread->title}}
    </x-slot>
    <body>
        <h1>スレッドの概要</h1>
        <p>{{ $thread->body }}</p>
        <h1>コメント</h1>
        <p class="create">[<a href="/threads/{{ $thread->id }}/comment/create">コメント作成</a>]</p>
        <div class="flex">
            @foreach ($comments as $comment)
                <p>{{ $comment->created_at }}</p>
                <p>{{ $comment->user->name }}</p>
                <p>{{ $comment->body }}</p>
            @endforeach
        </div>
        <div>
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>
