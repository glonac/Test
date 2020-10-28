<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    private $user;

    public function register(Request $request)//Регистрация нового пользователя с пустыми картинками
    {
        $user = new UserModel();
        $formPost = $request->all();
        $check = $user->getcheck($request);
        if ($check->isEmpty()) {
            $user->name = $formPost['name'];
            $user->email = $formPost['email'];
            $user->password = $formPost['password'];
            $user->titleimg = 'images/default.png';
            $user->img = 'defaultimg';
            $user->save();
            $request->session()->put('email', 'email');

            return response()->json(['success' => $check]);
        } else {

            return response()->json(['ups']);
        }
    }

    public function logging(Request $request)
    {
        $user = new UserModel();
        $request->all();
        $check = $user->checklog($request);//Поиск пользователя по почте и паролю
        try {
        $value = $check[0]->id;
        if (!$check->isEmpty()) {
            $request->session()->put('userID', $value);
            return response()->json(['success' => $check]);
        } else {
            return response()->json(['ups']);
        }
                    } catch (\Exception $exception) {
            return response()->json(['ups']);
        }
    }

    public function show(Request $request)
    {
        $id = $request->session()->get('userID');
        $user = new UserModel();
        $userinfo = $user->userinfo($id);
        return view('frontend.log', compact('userinfo'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateimg(Request $request)//Изменение изображения пользователя
    {
        $id = $request->session()->get('userID');
        $path = $request->image->store('images');
        $user = UserModel::find($id);
        $user->titleimg = $path;
        $user->save();
        return response()->json(['success' => 'true']);
    }

    public function exit(Request $request)
    {
        $request->session()->forget('userID');
        return response()->json('success');
    }

    public function changelog(Request $request)//Изменение данных пользователя
    {
        $id = $request->session()->get('userID');
        $user = UserModel::find($id);
        $formlog = $request->all();
        $userinfo = $user->userinfo($id);
        if ($formlog['email'] == $userinfo[0]->email) {
            $user->name = $formlog['name'];
            $user->save();
            return response()->json(['successName' => 'true']);
        } else {
            $user->name = $formlog['name'];
            $user->email = $formlog['email'];
            $user->save();
            return response()->json(['success' => 'true']);
        }

    }

    public function changePass(Request $request)//Изменение пароля
    {
        $id = $request->session()->get('userID');
        $user = UserModel::find($id);
        $formlog = $request->all();
        $userinfo = $user->userinfo($id);
        if ($userinfo[0]->password == $formlog['newpassword']) {
            return response()->json(['errorPass' => 'true']);
        } else {
            $user->password = $formlog['newpassword'];
            $user->save();
            return response()->json(['success' => 'true']);
        }
    }

}
