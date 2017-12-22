<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Subscribe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribe = Subscribe::first();
        return view('home', compact('subscribe'));
    }

    public function store(Request $request)
    {
//        $input = $request->all();
//        Subscribe::create($input);
        $Subscribe = new Subscribe;

        $Subscribe->title = $request->title;

        $Subscribe->content = $request->content;

        $Subscribe->save();

        return redirect('home')->with('success','成功！');
    }
}
