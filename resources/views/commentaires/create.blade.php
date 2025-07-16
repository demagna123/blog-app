<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('commentaires.store', ['article' => $article->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <input type="text" name="nomauteur" placeholder="Votre nom" required>
    <textarea name="messages" placeholder="Votre commentaire" required></textarea>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>