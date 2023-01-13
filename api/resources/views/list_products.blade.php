<a href="/new-product"><button>Új</button></a>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Név</th>
        <th>Ár</th>
        <th>Súly</th>
        <th>Leírás</th>
        <th>Kategória</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $products as $product )
         <tr>
           <td>{{ $product->id }}</td>
           <td>{{ $product->name }}</td>
           <td>{{ $product->price }}</td>
           <td>{{ $product->weight }}</td>
           <td>{{ $product->description }}</td>
           //TODO category javítása
           {{-- <td>{{ $product->categories->name}}</td> --}}
         </tr>
      @endforeach
    </tbody>
  </table>