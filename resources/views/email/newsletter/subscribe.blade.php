@extends('email.layouts.layout')
@section('content')
 <div style="padding: 0 20px 20px;"> 
 	<h2 style="font-size:22px;height:30px;color:#cc6600;border-bottom:dashed 1px gray">Newsletter</h2>
    <h2 style="text-align:center">Thanks for joining the Newsletter!</h2>
    <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
        <strong><span class="il">{{ config('app.name') }}</span></strong>
        <br>
        <a href="{{env('APP_URL')}}">{{env('APP_URL')}}</a>
    </p>
</div>    
@endsection