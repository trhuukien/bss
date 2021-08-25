<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LogController extends Controller
{
    public function index(Request $req)
    {
        isset($req->search) ? $key = $req->search : $key = '';
        if ($req->page > 2 && is_numeric($req->page)) {
            $p = $req->page;
        } else {
            $p = 5;
        }
        if ($req->page_size > 2 && is_numeric($req->page_size)) {
            $pz = $req->page_size;
        } else {
            $pz = 5;
        }

        $offset = ($p - 1) * $pz;
        $data = Log::where('name', 'like', '%' . $key . '%')->get();
        $count = count($data);
        $page = ceil($count / $pz);

        $logs = Log::where('name', 'like', '%' . $key . '%')->offset($offset)->limit($pz)->get();
        return view('log', compact('logs', 'count', 'key', 'page', 'pz'));
    }

    public function add()
    {
        $dashboards = Dashboard::all();
        return view('logadd', compact('dashboards'));
    }

    public function postAdd(Request $req)
    {
        $req->validate(
            [
                'db_id' => 'required',
                'name' => [
                    'required',
                    Rule::unique('logs'),
                ],
                'action' => 'required',
                'date' => [
                    'required',
                    'date_format:Y-m-d'
                ],
            ],
            [
                'db_id.required' => 'Hãy nhập trường này!',
                'name.required' => 'Hãy nhập trường này!',
                'name.unique' => 'Tên này đã tồn tại!',
                'action.required' => 'Hãy nhập trường này!',
                'date.required' => 'Hãy nhập trường này!',
                'date.date_format' => 'Định dạng ngày không đúng!',
            ]
        );

        $find = Dashboard::find($req->db_id);
        if (!$find) {
            return redirect()->back()->with('msg', 'Thêm dữ liệu thất bại! Kiểm tra dữ liệu nhập!');
        }

        $model = new Log();
        $model->fill($req->all());
        $model->save();
        return redirect(route('log'))->with('msg', 'Thêm dữ liệu thành công!');
    }

    public function delete($id)
    {
        if (Log::destroy($id)) {
            return redirect()->back()->with('msg', 'Xóa dữ liệu thành công!');
        } else {
            return redirect()->back()->with('msg', 'Bản ghi không tồn tại!');
        }
    }
}
