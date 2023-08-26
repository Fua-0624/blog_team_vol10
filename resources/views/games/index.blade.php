<x-app-layout>
    <x-slot name="header">
        {{ __('楽しいゲーム生活')}}
    </x-slot>
    <body>
        <h1 class="text-lg font-semibold">【最新のスレッド】</h1>
        <div>
            @foreach ($threads as $thread)
                <p>
                    {{ $thread->created_at}}&nbsp;&nbsp;&nbsp;
                    {{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    <a href="/games/{{ $thread->game->id }}/threads/{{ $thread->id }}">{{ $thread->title }}</a>
                </p>
            @endforeach
        </div>
        <br>
        <h1 class="text-lg font-semibold">【ゲーム一覧】</h1>
        <div>
            @foreach ($games as $game)
                <p><a href="/games/{{ $game->id }}">{{ $game->game_name }}</a></p>
            @endforeach
        </div>
        <div class="more-read-button">
            <button id="moreRead" class="more-read button">もっと見る</button>
        </div>
        <br>
        <p class="font-semibold">【新規ゲーム登録】</p>
        <form action="/posts" method="POST">
            @csrf
            <input type="text" name="game[game_name]" placeholder="ゲームのタイトルを入力してね"/>
            <input class="button" type="submit" value="登録"/>
        </form>
    </body>
    
<script type="text/javascript">var add = @json(count($games))</script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</x-app-layout>
