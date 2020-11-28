@component('mail::message')

Thank You , Your Order Successfully Placed


@component('mail::table')
| Product       |   Qty         |   Price  |
| ------------- |:-------------:| --------:|
@foreach($order->products as $Single_Product)
| {{ $Single_Product->product->name }}       |   {{ $Single_Product->product_qty }}         |   {{ $Single_Product->product_price }}  |
@endforeach
@endcomponent

Total amount : {{ $order->totalPrice }}

Thanks,<br>
Khushal Shopping Center
@endcomponent
