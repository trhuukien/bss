<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $req)
    {
        isset($req->search) ? $key = $req->search : $key = '';
        isset($req->page) ? $p = $req->page : $p = 1;

        $offset = ($p - 1) * 5;
        $data = Log::where('name', 'like', '%' . $key . '%')->get();
        $count = count($data);
        $page = ceil($count / 5);

        $logs = Log::where('name', 'like', '%' . $key . '%')->offset($offset)->limit(5)->get();
        return view('log', compact('logs', 'count', 'key', 'page'));
    }
}
