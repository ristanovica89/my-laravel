<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <h1>Dobro dosli u e-Ocene</h1>

  <br>

  <a href="/ocene">Pogledaj ocene</a>
  
  <form action="/ocene/ucenik" method="get">
    <label for="ucenik">Unesite ime ucenika</label>
    <input type="text" name="name" id="ucenik" required>
    <button type="submit">Ispisi ocene</button>
  </form>
  
</body>
</html>