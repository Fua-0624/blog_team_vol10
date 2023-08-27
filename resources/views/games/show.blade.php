<x-app-layout>
    <x-slot name="header">
        {{ $game->game_name }}
    </x-slot>
    <body>
        <h1 class="text-lg font-semibold">【スレッド一覧】</h1>
        <select name="input-select">
            <option value="asc">古い順</option>
            <option value="desc">新しい順</option>
        </select>
        <div class="item">
            @foreach ($threads as $thread)
                <p class="item_child item">
                    <span class="text-sm item_child_content">{{ $thread->created_at }}&nbsp;&nbsp;&nbsp;</span>
                    <span class="text-sm">
                    @if ($thread->user->grade === 1)
                        小：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif ($thread->user->grade === 2)
                        中：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @elseif( $thread->user->grade === 3)
                        高：{{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @else
                        {{ $thread->user->name}}&nbsp;&nbsp;&nbsp;
                    @endif</span>
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
<script>
    window.addEventListener('DOMContentLoaded',function(){
        var inputSelect = document.querySelector('[name="input-select"]');

        inputSelect.addEventListener('change',function(){
        const tableBody = document.querySelector('.item');
        const rows = Array.from(document.querySelectorAll('.item_child'));
        
        if (inputSelect.value === 'desc') {
            rows.sort((a, b) => {
                const dateA = new Date(a.querySelector('.item_child_content').textContent);
                const dateB = new Date(b.querySelector('.item_child_content').textContent);
                console.log('dateA',dateA);
                return dateB - dateA; // 降順
                
            });    
        } else {
            rows.sort((a, b) => {
                const dateA = new Date(a.querySelector('.item_child_content').textContent);
                const dateB = new Date(b.querySelector('.item_child_content').textContent);
                return dateA - dateB; // 昇順
            });
        }
        rows.forEach(row => {
            tableBody.appendChild(row);
        });
    });
});    
</script>
</x-app-layout>
