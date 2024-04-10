<table class="table table-striped">
                     <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th> 
                        <th>Action</th> 
                     </tr>
                     @foreach(Cart::content() as $p)
                         <tr>
                            <td><img src="{{$p->options->image}}" style="width:120px;"></td>
                            <td>{{$p->name}}</td>
                            <td>Rs.{{$p->price}}</td>
                            <td>
                                <div class="row" style="width:120px">
                                    <div class="col-4"><button class="updateCartData" <?= $p->qty < 2 ? 'disabled="true"' : ''?> type="button" 
                                    data-action="{{route('home.cartUpdate',[$p->rowId,'minus'])}}">-</button></div>
                                    <div class="col-4">{{$p->qty}}</div>
                                    <div class="col-4"><button class="updateCartData" type="button"
                                    data-action="{{route('home.cartUpdate',[$p->rowId,'plus'])}}">+</button></div>
                                </div>
                            </td>
                            <td>Rs.{{$p->subtotal}}</td>
                            <td><button class="updateCartData" type="button"
                                    data-action="{{route('home.cartUpdate',[$p->rowId,'remove'])}}">remove</button></td>
                         </tr>
                     @endforeach
</table> 