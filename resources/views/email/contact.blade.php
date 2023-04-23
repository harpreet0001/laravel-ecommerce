@extends('email.layouts.layout')
@section('content')
 <div style="padding: 0 20px 20px;"> 
    <h2 style="font-size:22px;height:30px;color:#cc6600;border-bottom:dashed 1px gray">Contact Us</h2>
    <br>    
        <table width="100%" id="" cellspacing="0" cellpadding="0">
	        <tbody>
	            <tr>
	                <td style="font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="">Topic</td>
	                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="">Name</td>
	                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="">Email</td>
	            </tr>
	            <tr>
	            	<td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca">{{$topic ?? ''}}</td>
	            	<td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca">{{$name  ?? ''}}</td>
	            	<td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca">{{$email ?? ''}}</td>
	            </tr>
	        </tbody>
       </table>
       <br><br>
       <table width="100%" id="" cellspacing="0" cellpadding="0">
	        <tbody>
	            <tr>
	                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="">Message</td>
	            </tr>
	            <tr>
	            	<td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca">{!! $msg ?? '' !!}</td>
	            </tr>
	        </tbody>
       </table>        
    <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
        <strong><span class="il">{{ config('app.name') }}</span></strong>
        <br>
        <a href="{{env('APP_URL')}}">{{env('APP_URL')}}</a>
    </p>
</div>    
@endsection