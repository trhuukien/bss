<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboards = Dashboard::all();
        return view('dashboard', compact('dashboards'));
    }

    public function add(Request $req)
    {
        $req['color'] = 'rgb(' . rand(1, 200) . ',' . rand(1, 200) . ',' . rand(1, 200) . ')';
        $model = new Dashboard();
        $model->fill($req->all());
        $model->save();
        return redirect()->back()->with('msg', 'Thành công!');
    }
}
