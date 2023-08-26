<x-app-layout>
    <x-slot name="header">
        {{ __('楽しいゲーム生活')}}
    </x-slot>
    <body>
        <h1>最新のスレッド</h1>
        <div class="flex">
            @foreach ($threads as $thread)
                <p>{{ $thread->created_at}}</p>
                <p>{{ $thread->user->name}}</p>
             <p><a href="/games/{{ $game->id }}/threads/{{ $thread->id }}">{{ $thread->title }}</a></p>
            @endforeach
        </div>
        <h1>ゲーム一覧</h1>
        <div class="item">
            @foreach ($games as $game)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p><a href="/games/{{ $game->id }}">{{ $game->title }}</a></p>
                </div>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read">もっと見る</button>
        </div>
        <p>新規ゲーム登録</p>
        <form action="/posts" method="POST">
            @csrf
            <input type="text" name="game[title]" placeholder="ゲームのタイトルを入力してね"/>
            <input type="submit" value="登録"/>
        </form>
    </body>
    
<script type="text/javascript">var add = @json(count($threads))</script>
<script type="text/javascript" src="{{ asset('/js/Threadindex.js') }}"></script>
</x-app-layout>
