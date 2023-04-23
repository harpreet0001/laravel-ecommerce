@extends('email.layouts.layout')
@section('content')
 <div style="padding: 0 20px 20px;"> 
    <p style="margin-top:12px;padding: 10px;">
        To change your customer account password at MEGATAN please click this
        link or copy and paste it into your browser:<br><br>
    </p>
    <div style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
        <a href="{{url('password/reset',$token).'?email='.urlencode($notifiable->email)}}">Reset Password</a>
    </div>
    <br>
    <font color="#888888">
        <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
            <strong><span class="il">{{ config('app.name') }}</span></strong>
            <br>
            <a href="{!! env('APP_URL') !!}" >{{env('APP_URL')}}</a>
        </p>
    </font>
</div>    
@endsection