<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class TokenController extends Controller
{
    public function index(Request $request){
        $user = User::find($request->user_id);
        $tokens = Token::with('tokenable')->when($user, function(Builder $query) use($user){
            return $query->where(['tokenable_type' => Account::class])->whereIn('tokenable_id', $user->accounts->pluck('id'));
        })->paginate();

        $data['tokens'] = $tokens;
        $data['user'] = $user;

        return view('admin.token.index', $data);
    }

    public function create(Request $request){
        $user = User::with('accounts')->find($request->user_id);
        return view('admin.token.create', compact('user'));
    }

    public function store(Request $request){
        $request->validate([
            'account' => ['required', 'exists:accounts,number'],
            'name' => ['required', 'max:255'],
            'type' => ['required', 'in:alpha,numeric,alphanumeric'],
            'length' => ['required', 'numeric', 'min:4', 'max:16'],
            'desc' => ['required'],
        ]);

        $account = Account::whereNumber($request->account)->firstOrFail();

        if($request->type === 'alphanumeric'){
            $token = Random::generate($request->length, '0-9a-zA-Z');
        }

        if($request->type === 'numeric'){
            $token = Random::generate($request->length, '0-9');
        }

        if($request->type === 'alpha'){
            $token = Random::generate($request->length, 'a-zA-Z');
        }

        $account->tokens()->create([
            'title' => $request->name,
            'token' => $token,
            'description' => $request->desc,
            'data' => json_encode([
                'type' =>$request->type,
                'length' =>$request->length,
            ])
        ]);

        return redirect()->route('admin.tokens.index', ['user_id' => $account->user_id])->with('message', 'Token Created Successfully');
    }

    public function destroy(Token $token){
        $token->delete();
        return redirect()->back()->with('message', 'Token removed');
    }
}
