<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>{{ $article->nom }}</h1>
<p>Prix : {{ $article->prix }} €</p>

@if ($article->photo)
    <img src="{{ asset('storage/' . $article->photo) }}" alt="photo">
@endif

<h3>Commentaires :</h3>
@if ($article->commentaires->isEmpty())
    <p>Aucun commentaire pour cet article.</p>
@else
    <ul>
        @foreach ($article->commentaires as $commentaire)
            <li>{{ $commentaire->contenu }} 
                
                ({{ $commentaire->created_at->format('d/m/Y') }})
                Auteur: {{ $commentaire->nomauteur }}
                 {{ $commentaire->messages}}
            </li>
        @endforeach
    </ul>
@endif

    
</body>
</html>