@extends('auth.layouts.layout')
@section('content')
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo"> 
            </div>
            <div class="login-form">
                    <h1>Register</h1>
                    <livewire:register :refer_token="$refer_token"/>
            </div>
        </div>
    </div>
</div>
@endsection