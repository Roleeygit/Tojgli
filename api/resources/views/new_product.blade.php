<a href="/productdata"><button>Adatok</button></a>

@if(session()->has("success"))
    <h3>{{ session("success") }}</h3>
@endif

<form action="submit-product" method="post">
    @csrf
    <p>
        <label for="">Név:</label>
        <input type="text" name="name" placeholder="name">
    </p>
    <p>
        <label for="">Ár:</label>
        <input type="text" name="price" placeholder="price">
    </p>
    <p>
        <label for="">Súly:</label>
        <input type="text" name="weight" placeholder="weight">
    </p>
    <p>
        <label for="">Leírás:</label>
        <input type="text" name="description" placeholder="description">
    </p>
    <p>
        <label for="">Kategória:</label>
        <input type="text" name="category" placeholder="category">

        {{-- <div class="dropdown">
            <button class="dropbtn">Dropdown</button>
            <div class="dropdown-content">
                @foreach( $products as $product )
                <tr>
                  <a>{{ $product->name }}</a>
                @endforeach
            </div>
          </div> --}}
    </p>

    <p>
    <button type="submit">Küldés</button>
    </p>


    
</form>

{{-- <style>
    .dropbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;} --}}