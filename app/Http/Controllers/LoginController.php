<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    /**
     * トップページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('/user/login');
    }

    /**
     * ログイン処理
     *
     */
    public function login(LoginPostRequest $request)
    {
        // validate済

        // データの取得
        $datum = $request->validated();
        //var_dump($datum); exit;

        // 認証
        if (Auth::attempt($datum) === false) {
            return back()
                   ->withInput() // 入力値の保持
                   ->withErrors(['auth' => 'emailかパスワードに誤りがあります。',]) // エラーメッセージの出力
                   ;
        }

        //
        $request->session()->regenerate();
        //var_dump($datum); exit;
        return redirect()->intended('/main/menu');
    }

    /**
     * ログアウト処理
     *
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('front.index'));
    }
}