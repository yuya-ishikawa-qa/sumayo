<?php

namespace App\Http\Controllers;

use App\EmailReset;
use App\User;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ChangeEmailController extends Controller
{
    public function sendChangeEmailLink(Request $request) {
        $new_email = $request->new_email;

        // トークン生成
        $token = hash_hmac(
            'sha256',
            Str::random(40) . $new_email,
            config('app.key')
        );

        $params = [
            'user_id' => Auth::id(),
            'new_email' => $new_email,
            'token' => $token,
        ];
        
        $email_reset = EmailReset::create($params);    
        $email_reset->sendEmailResetNotification($token);

        return back()->with('flash_message', '確認メールを送信しました、メールを確認してください。');
    
    }

    public function reset(Request $request, $token)
    {
        $email_resets = DB::table('email_resets')
            ->where('token', $token)
            ->first();

        // トークンが存在している、かつ、有効期限が切れていないかチェック
        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            // ユーザーのメールアドレスを更新
            $user = User::find($email_resets->user_id);
            $user->email = $email_resets->new_email;
            $user->save();

            // レコードを削除
            DB::table('email_resets')
                ->where('token', $token)
                ->delete();
            
            $message = 'メールアドレスを更新しました！';
            
            return view('emails.notificationChangeEmail', ['message' => $message]);
        } else {

            // レコードが存在していた場合削除
            if ($email_resets) {
                DB::table('email_resets')
                    ->where('token', $token)
                    ->delete();
            }

            $message = 'メールアドレスの更新に失敗しました。もう一度管理者に依頼してください。';

            return view('emails.notificationChangeEmail', ['message' => $message]);
        }
    }


    /**
     * トークンが有効期限切れかどうかチェック
     *
     * @param  string  $createdAt
     * @return bool
     */
    protected function tokenExpired($createdAt)
    {
        // トークンの有効期限は60分に設定
        $expires = 60 * 60;
        return Carbon::parse($createdAt)->addSeconds($expires)->isPast();
    }

}
