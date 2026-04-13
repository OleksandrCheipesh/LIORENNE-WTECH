<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Checkout Order - Liorenne</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        h2 { color: #01696f; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f8f9fa; font-weight: 600; }
        .total { font-size: 1.2em; font-weight: bold; color: #01696f; }
        .payment { background: #f0f8f7; padding: 15px; border-radius: 8px; margin: 15px 0; }
    </style>
</head>
<body>
    <h2>🛒 New Order Received</h2>

    <h3>Customer Information</h3>
    <table>
        <tr><td><strong>First name:</strong></td><td>{{ $orderData['first_name'] }}</td></tr>
        <tr><td><strong>Last name:</strong></td><td>{{ $orderData['last_name'] }}</td></tr>
        <tr><td><strong>Email:</strong></td><td>{{ $orderData['email'] }}</td></tr>
        <tr><td><strong>Phone:</strong></td><td>{{ $orderData['phone'] }}</td></tr>
        <tr><td><strong>Address:</strong></td><td>{{ $orderData['street'] }} {{ $orderData['street_number'] }}, {{ $orderData['zip'] }}</td></tr>
        <tr><td><strong>Country:</strong></td><td>{{ $orderData['country'] }}</td></tr>
    </table>

    <div class="payment">
        <strong>Payment Method:</strong> 
        @if($orderData['payment_method'] === 'cash')
            💵 Cash on Delivery
        @else
            💳 Credit Card
        @endif
    </div>

    @if(isset($orderData['cart']) && !empty($orderData['cart']))
    <h3>Order Items</h3>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderData['cart'] as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>€{{ number_format($item['price'], 2) }}</td>
                <td>€{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table style="margin-top: 20px;">
        <tr><td>Subtotal:</td><td>€{{ number_format($orderData['subtotal'], 2) }}</td></tr>
        <tr><td>Shipping:</td><td>€{{ number_format($orderData['shipping'], 2) }}</td></tr>
        <tr class="total"><td><strong>Total:</strong></td><td><strong>€{{ number_format($orderData['total'], 2) }}</strong></td></tr>
    </table>
    @endif

    <hr style="margin: 40px 0;">
    <p style="color: #666; font-size: 14px;">
        This is an automatic notification from Liorenne. Please do not reply to this email.
    </p>
</body>
</html>