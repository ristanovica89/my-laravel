
Ime: {{ $user->name }}
E-mail: {{ $user->email }}
<hr>
<h1>Ocene</h1>
<ol>
  @foreach($ocene as $ocena)
    <li>Predmet: {{$ocena->predmet}} | Nastavnik: {{ $ocena->profesor }} | Ocena: {{ $ocena->ocena }}</li>
  @endforeach
</ol>

<a href="/">Vrati se na pocetnu</a>