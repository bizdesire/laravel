@extends('home.layouts.layout')
@section('content')
 
<div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">Cart Page</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif 

            <div class="col-12" id="getCarts"> 
               
            </div>
            @if(Cart::count() > 0)
            <a href="{{route('home.checkout')}}" class="btn btn-primary">Checkout</a>
            @endif
        </div>
    </div>
<input type="hidden" value="{{route('home.cartItems')}}" id='urlCart'>
@endsection

@section('scripts')
<script>
  
    $("body").on('click','.updateCartData',function(e){
        e.preventDefault(); 
        $this = $(this);
        $loader = $("body").find('.loader');
        $.ajax({ 
                url:$this.data('action'), 
                method: "GET",  
                dataType: 'JSON', 
                beforeSend: function() { 
                     $loader.show();
                    // $this.find('button').attr('disabled','true');
                },
                success: function(data) { 
                    
                    sendAjaxRequest();
                    alert(data.message);
                } 
        });
    })


    sendAjaxRequest();
    function sendAjaxRequest() {
        $loader = $("body").find('.loader');
        $.ajax({ 
                url:"{{route('home.cartItems')}}", 
                method: "GET",  
                dataType: 'JSON', 
                beforeSend: function() { 
                    $loader.show();
                    // $this.find('.innder-loader').show();
                    // $this.find('button').attr('disabled','true');
                },
                success: function(data) { 
                    $loader.hide();
                     $('#getCarts').html(data.data);
                     $('#counts').text(data.counts);
                } 
        });
    }
    
</script>
@endsection