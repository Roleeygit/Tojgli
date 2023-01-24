@if(session()->has("success"))
    <h3>{{ session("success") }}</h3>
@endif

<form method="post" action="submit-customer">
    @csrf
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="confirm_password">Password Confirmation:</label>
        <input type="password" id="confirm_password" name="confirm_password">
    </div>
    <div>
        <input type="checkbox" id="terms" name="terms" value="1">
        <label for="terms">Elolvastam és elfogadtam az <a href=/terms_and_conditions target="_blank">Általános Szerződési feltételeket</a> és elfogadom az <a href=/privacy_policy target="_blank">Adatvédelni Szabályzatot</a>.</label>
    </div>
    <div>
        
        <input type="submit" value="Submit">
    </div>
</form>
    <a href="/"><button>Vissza</button></a>