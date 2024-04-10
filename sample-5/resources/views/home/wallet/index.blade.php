@extends('home.layouts.layout')
@section('content')
 
<div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">Razorpay Payment Gateway</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-12">
                Balance : <strong>{{ auth()->user()->balance() }}</strong><br />
                
            </div>
            <center>
                <form action="{{ route('home.make.payment') }}" method="POST" >
                    @csrf 
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_API_KEY') }}"
                            data-amount="100000"
                            data-buttontext="Pay 1000 INR"
                            data-name="Laravelia"
                            data-description="A demo razorpay payment"
                            data-image="https://www.laravelia.com/storage/logo.png"
                            data-prefill.name="Mahedi Hasan"
                            data-prefill.email="mahedy150101@gmail.com"
                            data-theme.color="#ff7529">
                    </script>
                </form>
            </center>

            <div class="col-12">
                 <table class="table table-striped">
                     <tr>
                        <th>Tranx ID</th>
                        <th>Amount</th>
                        <th>Credit / Debit</th>
                        <th>Method</th>
                         
                     </tr>
                     @foreach($payments as $p)
                         <tr>
                            <td>{{$p->r_payment_id}}</td>
                            <td>{{$p->amount}}</td>
                            <td>{{$p->type}}</td>
                            <td>{{$p->method}}</td>
                         </tr>
                     @endforeach
                 </table>
                 {{$payments->links()}}
            </div>
        </div>
    </div>

@endsection