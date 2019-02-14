<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use App\Work;
use Illuminate\Http\Request;
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
}
