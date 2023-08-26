<x-app-layout>
    <x-slot name="header">
        {{ $game->title }}
    </x-slot>
    <body>
        <h1>スレッド一覧</h1>
            @foreach ($threads as $thread)
                <p>{{ $thread->created_at }}</p>
                <p>{{ $thread->user->user_name }}</p>
                <p><a href="/threads/{{ $thread->id }}">{{ $thread->title }}</a></p>
            @endforeach
        <div>
            <p class="create">[<a href="/threads/{{ $game->id }}/edit">スレッド作成</a>]</p>
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>
