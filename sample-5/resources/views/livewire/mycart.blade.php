<div>
@if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
         @if (session()->has('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
<table class="table table-striped">
                     <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Action</th> 
                     </tr>
                     @foreach($carts as $p)
                         <tr>
                            <td><img src="{{$p->options->image}}" style="width:120px;"></td>
                            <td>{{$p->name}}</td>
                            <td>Rs.{{$p->price}}</td>
                            <td>
                                <div class="row" style="width:120px">
                                    <div class="col-4"><button class="minCart" type="button" 
                                    data-action="{{route('home.cartUpdate',[$p->id,'minus'])}}">-</button></div>
                                    <div class="col-4">{{$p->qty}}</div>
                                    <div class="col-4"><button class="plusCart" type="button"
                                    data-action="{{route('home.cartUpdate',[$p->id,'plus'])}}">+</button></div>
                                </div>
                            </td>
                            <td>Rs.{{$p->subtotal}}</td>
                         </tr>
                     @endforeach
                 </table> 
</div>
