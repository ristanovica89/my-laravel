@if($errors->any)
  <h1 style="color:red;">{{ $errors->first() }}</h1>
@endif

<div style="width: 60%; margin: 50px auto;">
  <form action="/ocene" method="post">
    @csrf

    <label for="predmet">Unesite naziv predmeta</label><br>
    <input type="text" name="predmet" id="predmet" required><br>
    <hr>
    <label for="ocena">Unesite ocenu</label><br>
    <input type="number" name="ocena" id="ocena" step="1" required><br>
    <hr>
    <label for="profesor">Unesite ime profesora</label><br>
    <input type="text" name="profesor" id="profesor" required><br>
    <hr>
    <label for="ucenik">Unesite ID ucenika</label><br>
    <input type="number" name="user_id" id="ucenik" required><br>
    <br>
    <button type="submit">Dodaj ocenu</button>
  </form>
</div>