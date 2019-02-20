<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Nexmo\User\User;
use Snowfire\Beautymail\BeautymailServiceProvider;
class PageController extends Controller
{
    //

    public function home(){
        $works=Work::all('title','image_path','id');
        return view('welcome',compact('works'));
    }

    public function contact(Request $request){
        Mail::send(new contactMail($request));
        $from=$request->email;
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.Thanks', [], function($message) use ($from)
        {
            $message
                ->to($from)
                ->from('sakibwebworm@gmail.com')
                ->subject('I have recieved your mail');
        });

        return back();
    }

    public function work(Request $request){
        $work=new Work();
        $data=$request->all();
        if($request->has('image_path')){
            $getimageName = time() . '.' . $request->image_path->getClientOriginalExtension();
            $request->image_path->move(public_path('images'), $getimageName);
            $data['image_path'] = '/images/' . $getimageName;
        }
        $work->title=$request->title;
        $work->body=$request->body;
        $work->image_path=$data['image_path'];
        $work->save();
        return back();
    }
    public function edit($id){
        $work=Work::findOrFail($id);
        return $work;
    }

    public function update(Request $request,$id){
        $work=Work::findOrFail($id);
        $data=$request->all();
        if($request->has('image_path')){
            $getimageName = time() . '.' . $request->image_path->getClientOriginalExtension();
            $request->image_path->move(public_path('images'), $getimageName);
            $data['image_path'] = '/images/' . $getimageName;
            $work->title=$request->title;
            $work->body=$request->body;
            $work->image_path=$data['image_path'];
            $work->update();
        }
        else{
            $work->title=$request->title;
            $work->body=$request->body;
            $work->update();
        }
        return redirect('/');
    }

    public function delete ($id){
        if(Auth::check()){
            Work::destroy($id);
        }
        return redirect('/');
    }


}
