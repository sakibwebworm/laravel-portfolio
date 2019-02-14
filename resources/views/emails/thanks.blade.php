@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Thanks!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p>I will reply as soon as i can!</p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
        	'title' => 'Visit me!',
        	'link' => 'http://md-sakib.com'
    ])

@stop
