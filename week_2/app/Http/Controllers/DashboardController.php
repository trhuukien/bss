<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboards = Dashboard::all();
        return view('dashboard', compact('dashboards'));
    }

    public function add(Request $req)
    {
        $req->validate(
            [
                'device' => 'required',
                'ip' => 'required',
                'mac' => [
                    'required',
                    Rule::unique('dashboards'),
                ],
                'pc' => [
                    'required',
                    'numeric',
                    'min:0'
                ],
            ],
            [
                'device.required' => 'Hãy nhập trường này!',
                'ip.required' => 'Hãy nhập trường này!',
                'mac.required' => 'Hãy nhập trường này!',
                'mac.unique' => 'Địa chỉ MAC đã tồn tại!',
                'pc.required' => 'Hãy nhập trường này!',
                'pc.numeric' => 'Hãy nhập vào số!',
                'pc.min' => 'Giá trị là số dương!',
            ]
        );

        $req['color'] = 'rgb(' . rand(1, 200) . ',' . rand(1, 200) . ',' . rand(1, 200) . ')';
        $model = new Dashboard();
        $model->fill($req->all());
        $model->save();
        return redirect()->back()->with('msg', 'Thành công!');
    }

    public function delete($id)
    {
        if (Dashboard::destroy($id)) {
            return redirect()->back()->with('msg', 'Xóa dữ liệu thành công!');
        } else {
            return redirect()->back()->with('msg', 'Bản ghi không tồn tại!');
        }
    }
}
