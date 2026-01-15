<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
  <title>Contact Page</title>
</head>
<body>
  <div class="container">
    <h1>Contact Us</h1>

    <div class="contact">
    <p>E-mail: {{ $contacts['email'] }}</p><br>
    <p>Tel.: {{ $contacts['tel'] }}</p><br>
    <p>Address: {{ $contacts['address'] }}</p><br>
    </div>
    
  </div>
</body>
</html>