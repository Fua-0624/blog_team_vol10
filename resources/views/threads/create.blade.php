<x-app-layout>
    <x-slot name="header">
        {{$game->title}}
    </x-slot>
    <body>
      <div style="width:50%; margin: 0 auto; text-align:center;">
        <form action="/threads/post" method="POST">
            @csrf
            <div>
            <h2>タイトル</h2>
                タイトル:<br>
                <input type="text" name="thread[title]" placeholder="スレッドの目的" >
                <br>
                コメント:<br>
                内容:
                <input type="text" name="thread[body]" placeholder="説明"　>
                <br>
            {{ csrf_field() }}
            <button class="btn btn-success"> 送信 </button>
        </form>
    </div>
    </body>
</x-nav-layout>