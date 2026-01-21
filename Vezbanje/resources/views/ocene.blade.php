<h1>Ocene</h1>

@if(session('success'))
  <h1 style="color:green;">{{ session('success') }}</h1>
@endif

<ol>
@foreach($ocene as $ocena)
  <li>Predmet: <b>{{$ocena->predmet}}</b> | Ocena: <span style="color:green;">{{$ocena->ocena}}</span></li>
@endforeach
</ol>

<a href="/">Nazad na pocetnu</a><br>
<a href="/ocene/dodaj">Dodaj ocenu</a>