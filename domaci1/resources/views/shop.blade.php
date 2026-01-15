<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
  <title>Shop</title>
</head>

<body>
  <div class="container">
    <h1>Shop</h1>

    <div class="articles">
    @foreach ($products as $article)
      <div class="article">
      <h2 class="article-name">{{ $article['name'] }}</h2>
      <p class="article-code">code: {{ $article['code'] }}</p>
      <span class="article-price">price: {{ $article['price'] }} eur</span><br>
      <button>Add to Cart</button>
    </div>
    @endforeach
    <!-- <div class="article">
      <h2 class="article-name">Super Gadget</h2>
      <p class="article-code">code: SG123</p>
      <span class="article-price">price: 50e</span><br>
      <button>Add to Cart</button>
    </div>
    
    
    <div class="article">
      <h2 class="article-name">Super Gadget</h2>
      <p class="article-code">code: SG123</p>
      <span class="article-price">price: 50e</span><br>
      <button>Add to Cart</button>
    </div> -->
    </div>
  </div>

</body>

</html>