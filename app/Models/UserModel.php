<?php


namespace App\Models;

use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'name',
        'email',
        'password',
        'titleimg',
        'img'
    ];

    public function getcheck($request)
    {
        $email = $request->get('email');
        $tableUser = DB::table('user');
        $tableUser->where('email', 'like', '%' . $email . '%');
        return $tableUser->get();

    }

    public function checklog($request)//Проверка пользователя
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $tableUser = DB::table('user');
        $tableUser->where('email', '=',  $email )
            ->where('password', '=',  $password );
        return $tableUser->get();
    }

    public function userinfo($id)
    {
        $tableUser = DB::table('user');
        return $tableUser->where('id', $id)->get();
    }

}
