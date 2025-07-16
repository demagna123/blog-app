<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <style>
        .article-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            width: 300px;
        }
        .article-card img {
            max-width: 100%;
            height: 300px;
        }
        .btn-detail {
            margin-top: 10px;
            display: inline-block;
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .btn-detail:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Liste des articles</h1>

@foreach ($articles as $article)
    <div class="article-card">
        @if ($article->photo)
            <img src="{{ asset('storage/' . $article->photo) }}" alt="photo de l'article">
        @else
            <p>(Pas de photo)</p>
        @endif

        <h3>{{ $article->nom }}</h3>
        <p><strong>Prix :</strong> {{ $article->prix }} €</p>

        <a href="{{ route('articles.show', $article->id) }}" class="btn-detail">Détail</a>

        <form action="{{ route('commentaires.create', ['article' => $article->id]) }}" method="GET">
            <button class="btn-detail" type="submit">Commenter</button>
        </form>

        <form action="{{ route('articles.like', $article->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-detail" style="background-color: green;">
                👍 Liker ({{ $article->likes_count }})
            </button>
        </form>
    </div>
@endforeach

</body>
</html>
