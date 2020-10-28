<?php

namespace App\Http\Controllers;
use App\Models\TestModel;
use Illuminate\Http\Request;


class TestController extends Controller
{
    /**
     * @var TestModel
     */
    private $_test;

    public function insert(Request $request) //Запись значений в БД
    {
        $_test = new TestModel();
        $formPost = $request->all();
        $_test->name = $formPost['name'];
        $_test->phone = $formPost['phone'];
        $_test->comment = $formPost['comment'];
        $_test->email = $formPost['email'];
        $_test->htoto = $formPost['htoto'];
        $_test->save();
        return response()->json(['success' => $formPost]);
    }

    public function __construct(TestModel $_test)
    {
        $this->_test = $_test;
    }

    public function index()
    {
        $testList = $this->_test::all();
        $testList = isset($testList[0]) ? $testList : null;
        return view('Frontend.check', compact('testList'));
    }

    public function delete($id)
    {
        $model = new TestModel();
        $successDelete = $model->deleteById($id);
        return response()->json([function () {
            $result = array();
            array_key_exists('error', $result) ? $result['error'] = 'Ошибка удаления' : $result['success'] = 'Данные успешно удалены';
            return $result;
        }]);
    }

    public function update(Request $request, $id)
    {

        $_test = TestModel::find($id);
        $data = $request->all();
        $_test->name = $data['name'];
        $_test->phone = $data['phone'];
        $_test->comment = $data['comment'];
        $_test->email = $data['email'];
        $_test->htoto = $data['htoto'];
        $_test->save();
        return response()->json(['data' => $_test]);
    }

    public function search(Request $request) //Поиск по бд
    {

        $model = new TestModel();
        $data = $model->getsearch($request);
        return response()->json(['data' => $data]);

    }


}
