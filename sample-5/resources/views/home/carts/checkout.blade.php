@extends('home.layouts.layout')
@section('content')
<div class="container">
      
    <h1>Checkout Page</h1>
      
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <h2 class="panel-title" >Checkout Forms</h2>
                </div>
                <div class="panel-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tr>
                                <th>Sub Total</th> <td>Rs.{{Cart::total() - Cart::tax()}}</td>
                            </tr>
                            <tr>
                                <th>Tax</th> <td>Rs.{{Cart::tax()}}</td>
                            </tr>
                            <tr>
                                <th>Earn Bonus</th> <td>Rs.{{auth()->user()->bonus_earned}}</td>
                            </tr>
                            @if(Cart::total() > auth()->user()->bonus_earned)
                            <tr>
                                <th>Payable Amount</th> <td>Rs.{{Cart::total() - auth()->user()->bonus_earned}}</td>
                            </tr>
                            @else
                            <tr>
                                <th>Payable Amount</th> <td>Rs.{{Cart::total()}}</td>
                            </tr>
                            @endif
                           
                        </table>
                    </div>
                </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                     <form id='checkout-form' method='post' action="{{ route('home.payment') }}">   
                        @csrf             
                        <input type='hidden' name='stripeToken' id='stripe-token-id'>                              
                        <br>
                        <div id="card-element" class="form-control" ></div>
                        <button 
                            id='pay-btn'
                            class="btn btn-success mt-3"
                            type="button"
                            style="margin-top: 20px; width: 100%;padding: 7px;"
                            onclick="createToken()">PAY 
                        </button>
                    <form>
      
                </div>
            </div>        
        </div>
    </div>
          
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
  
    var stripe = Stripe('{{ env('STRIPE_KEY') }}')
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');
  
    /*------------------------------------------
    --------------------------------------------
    Create Token Code
    --------------------------------------------
    --------------------------------------------*/
    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {
   
            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }
  
            /* creating token success */
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>
 
@endsection
 