<a href="/new-profile"><button>Új</button></a>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Család név</th>
        <th>Kereszt név</th>
        <th>Ország</th>
        <th>Város</th>
        <th>Lakcim</th>
        <th>Felhasználó név</th>
        <th>Email</th>
        <th>Vásárlási idő</th>
        <th>Vásárlási mód</th>
        <th>Szállitási mód</th>
      </tr>
    </thead>
    <tbody>
        @foreach($profiles as $profile)
        <tr>
          <td>{{ $profile->id }}</td>
          <td>{{ $profile->surname }}</td>
          <td>{{ $profile->lastname }}</td>
          <td>{{ $profile->country }}</td>
          <td>{{ $profile->city }}</td>
          <td>{{ $profile->address }}</td>
          <td>{{ $profile->customer->username }}</td>
          <td>{{ $profile->customer->email }}</td>
          <td>{{ $profile->orderdate->order_date }}</td>
          <td>{{ $profile->paymentmode->payment_mode }}</td>
          <td>{{ $profile->deliverymode->delivery_mode }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
