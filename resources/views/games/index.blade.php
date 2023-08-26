<x-app-layout>
    <x-slot name="header">
        {{ __('HOME')}}
    </x-slot>
    <body>
        <h1>楽しいゲーム生活！</h1>
        <h2>最新のスレッド</h2>
        @foreach ($threads as $thread)
            <p>{{ $thread->created_at}}</p>
            <p>{{ $thread->user->user_name}}</p>
            <p><a href="/threads/{{ $tread->id }}">{{ $thread->title }}</a></p>
        @endforeach
        <h2>ゲーム一覧</h2>
        <div>
            @foreach ($games as $game)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p><a href="/games/{{ $game->id }}">{{ $game->title }}</a></p>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
        
        <p>新規ゲーム登録</p>
        <form action="/posts" method="POST">
            @csrf
            <input type="text" name="post[title]" placeholder="ゲームのタイトルを入力してね" value="{{ old('post.title') }}"/>
            <input type="submit" value="登録"/>
        </form>
    </body>
</x-app-layout>
