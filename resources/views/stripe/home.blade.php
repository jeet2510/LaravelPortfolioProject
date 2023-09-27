
@include('layouts.app')
    <div class="flex text-center">
    <h1>Payment Details</h1>
    <p>This is for testing purpose only</p>
    <p>Amount: 100 Rupees</p>
    <form id="paymentForm" action="{{ route('stripe.payment') }}" method="POST">
    @csrf
    <button type="submit" style="border: none; background: none; padding: 0; font: inherit; cursor: pointer; text-decoration: underline; color: blue;">Pay Now</button>
    </form>

    </div>

