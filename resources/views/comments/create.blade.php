<x-app-layout>
    <x-slot name="header">
        {{$game->title}} >  {{$thread->title}}
    </x-slot>
    <body>
     <div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="{{ route('post.store') }}" method="POST">
        <div>
            内容：
            <input type = "text" name="comment[body]" placeholder=投稿する内容/>
        </div>
        
       
        <button>送信</button>
    </body>
</x-nav-layout>