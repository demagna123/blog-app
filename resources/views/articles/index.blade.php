<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <style>
    .article-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
    padding: 20px;
    justify-items: center;
}

.article-card {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    width: 100%;
    max-width: 250px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.article-card img {
    max-width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 4px;
}

    </style>
</head>
<body>
<a href="{{ route('articles.create') }}">Cliquer pour créer un article</a>

<h1>Liste des articles</h1>

<div class="article-grid">
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
</div>


</body>
</html>
