<x-app-layout>
    <x-slot name="header">
        {{ $game->title }}
    </x-slot>
    <body>
        <h1>スレッド一覧</h1>
        <div class="flex">
            @foreach ($threads as $thread)
                <p>{{ $thread->created_at }}</p>
                <p>{{ $thread->user->user_name }}</p>
                <p><a href="/games/{{ $game->id }}/threads/{{ $thread->id }}">{{ $thread->title }}</a></p>
            @endforeach
        </div>
        <div>
            <p class="create">[<a href="/threads/{{ $game->id }}/create">スレッド作成</a>]</p>
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>
