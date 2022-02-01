<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use Illuminate\Http\Request;
use App\Models\testbot;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;


class FormController extends Controller{
//    public function submit(){
//        return 'OKKK';
//    }


    public function submit(testbot $req) {
    $testbot = new testbot();
    $testbot->id = $req->input('id');
    $testbot->name = $req->input('name');
    $testbot->qty = $req->input('qty');
    $testbot->desc = $req->input('desc');
    $testbot->price = $req->input('price');
    $testbot->img = $req->input('img');
    $testbot->availability = $req->input('availability');

    $testbot->save();
    return redirect()->route('/')->with('success','all saved');
}



    public function botMess() {
        $mesbot = new Bot;
        return view('admin', ['mesdata' => $mesbot->orderBy('id', 'desc')->take(1)->get()]);
//        ->orderBy('id', 'desc')->take(1)->get()
//        dd($mesbot -> all());
//        return view('admin', ['botdata'=>testbot::all()]);

//        $testbot = testbot::all();
//        dd($testbot);
    }

    public function okkk()
    {
        $mesbot = new Bot();
//        $mesbot->id = $req->input('id');
        $mesbot->message = $req->input('message');
//        $mesbot->qty = $req->input('qty');

        $testbot->save();
        return redirect()->route('/')->with('success','all saved');
//        return 'test ok';
}

    public function test2(Request $req) {
        dd($req->input('message'));
    }

    public function submit2(MessageRequest $req) {

        $mesbot = new Bot();
//        $mesbot->id = $req->input('id');
        $mesbot->message = $req->input('message');
//        $mesbot->qty = $req->input('qty');

        $mesbot->save();

//        dd($req->input('message'));
        return view('welcome', ['data'=>testbot::all()]);
//return 'ok val';
    }

    public function allData() {
        return view('welcome', ['data'=>testbot::all()]);

//        $testbot = testbot::all();
//        dd($testbot);
    }
}
