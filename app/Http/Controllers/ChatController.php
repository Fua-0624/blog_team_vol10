<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Chat;
use App\Models\Room;
use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;

class ChatController extends Controller
{
    //チャットを開く関数
    public function openChat(User $user){
        //自分のIDをmyUserIdに代入
        $myUserId = auth()->user()->id;
        //相手のIDをotherUserIdに代入
        $otherUserId = $user->id;
        
        //データベース内でチャットが存在するかを取得
        $chat = Room::where(function($query) use ($myUserId, $otherUserId){
            $query->where('owner_id',$myUserId)
                  ->where('guest_id',$otherUserId);
        })->orWhere(function($query) use ($myUserId, $otherUserId){
            $query->where('owner_id',$otherUserId)
                  ->where('guest_id',$myUserId);
        })->first();
        
        //チャットが存在しない場合の操作(新しいチャットを作成)
        //オーナーは新しくチャットを開いた人になる
        if(!$chat){
            $chat = new Room();
            $chat->owner_id = $myUserId;
            $chat->guest_id = $otherUserId;
            $chat->save();
        }
        
        $messages = Message::where('chat_id', $chat->id)->orderBy('updated_at', 'DESC')->get();
        
        return view('chats/chat')->with(['chat' => $chat, 'messages' => $messages]);
    }
    
    //チャット一覧を表示する関数
    public function chatIndex(User $user){
        $myUserId = auth()->user()->id;
        
        $chats_owner = Room::where(function($query) use ($myUserId){
            $query->where('owner_id',$myUserId);
        })->get();
        $chats_guest = Room::where(function($query) use ($myUserId){
            $query->where('guest_id',$myUserId);
        })->get();
        
        return view('chats/chat_index')->with(['chats_owner' => $chats_owner, 'chats_guest' => $chats_guest  , 'users' => $user->get()]);
    }
    
    //メッセージを送る関数
    public function sendMessage(Message $message, Request $request){
        $user = auth()->user();
        $strUserId = $user->id;
        $strUsername = $user->name;
        
        //リクエストからデータを取り出す
        $strMessage = $request->input('message');
        
        //メッセージオブジェクトを作成
        $chat = new Chat;
        $chat->body = $strMessage;
        $chat->chat_id = $request->input('chat_id');
        $chat->userName = $strUsername;
        MessageSent::dispatch($chat);
        
        //データベースへの保存処理を行う
        $message->user_id = $strUserId;
        $message->body = $strMessage;
        $message->chat_id = $request->input('chat_id');
        $message->save();
        
        return response()->json(['message'=> 'Message sent successfully']);
    }
}
