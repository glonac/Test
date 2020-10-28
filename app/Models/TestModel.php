<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class TestModel extends Model
{
    protected $table = '_test';
    protected $fillable = [
        'name',
        'email',
        'comment',
        'phone',
        'htoto'
    ];

    public function gettest()
    {
        return $this->get();
    }

    public function deleteById($id)
    {
        try {
            return $this->where('id', $id)->delete();
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function getsearch($request)//Фильтр
    {
        $filtersComment = $request->get('comment');
        $filtersEmail = $request->get('email');
        $query = $request->get('search');
        $fp = DB::table('_test');
        if ($filtersEmail != '') {
            $fp->where('email', 'like', '%' . $filtersEmail . '%');
        } else {
            $fp->orWhere('email', 'like', '%' . $query . '%');
        }
        if ($filtersComment != '') {
            $fp->where('comment', 'like', '%' . $filtersComment . '%');
        }
        if ($query != '') {
            $fp->orWhere('name', 'like', '%' . $query . '%')
                ->orWhere('phone', 'like', '%' . $query . '%')
                ->orWhere('htoto', 'like', '%' . $query . '%')
                ->orWhere('comment', 'like', '%' . $query . '%');
        }
        return $fp->orderBy('id', 'desc')->get();


    }
}
