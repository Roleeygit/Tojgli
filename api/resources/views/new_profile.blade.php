<a href="/profiledata"><button>Adatok</button></a>

@if(session()->has("success"))
    <h3>{{ session("success") }}</h3>
@endif

<form action="submit-profile" method="post">
    @csrf

    <p>
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname">
    </p>
    <p>
        <label for="lastname">Lastname:</label>
        <input type="text" id="lastname" name="lastname">
    </p>
    <p>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country">
    </p>
    <p>
        <label for="city">City:</label>
        <input type="text" id="city" name="city">
    </p>
    <p>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
    {{-- </p>
    <p>
        <input type="hidden" name="order_date" value="{{ Carbon\Carbon::now()->toDateString() }}">
    </p>
    <p>
        <label for="customer_id">Customer ID:</label>
        <input type="number" name="customer_id" id="customer_id" required>
    </p> --}}



    <p>
        <label for="paymentmode_id">Payment mode:</label>
        <select name="paymentmode_id" id="paymentmode_id">
            @foreach ($payment_modes as $paymentmode)
                <option value="{{ $paymentmode->id }}">{{ $paymentmode->payment_mode }}</option>
            @endforeach
        </select>
    </p>

    <p>
        <label for="deliverymode_id">Delivery mode:</label>
        <select name="deliverymode_id" id="deliverymode_id">
            @foreach ($delivery_modes as $deliverymode)
                <option value="{{ $deliverymode->id }}">{{ $deliverymode->delivery_mode }}</option>
            @endforeach
        </select>
    </p>
    
    <button type="submit">Submit</button>
</form>

<style>
    body
    {
        background-color: rgb(53, 53, 53);
        color: white;
    }
</style>