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
          <p>Kategória:
          <select name="category">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category }}</option>
          @endforeach
          </select>
          </p>

    <p>
    <button type="submit">Küldés</button>
    </p>

</form>