<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Bienvenu sur notre Notre fomulaire de création d'article</h2>
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-card">
        <label for="">Nom Article</label>
        <input type="text" name="nom" id="">
    </div>

     <div class="form-card">
        <label for="">Prix</label>
        <input type="text" name="prix" id="">
    </div>

     <div class="form-card">
        <label for="">Categorie</label>
        <input type="text" name="categorie" id="">
    </div>

     <div class="form-card">
        <label for="">Quantite</label>
        <input type="text" name="quantite" id="">
    </div>

    <div class="form-card">
        <label for="">Description</label>
        <textarea name="description" id=""></textarea>
    </div>

    <div class="form-card">
        <label for="">Photo</label>
        <input type="file" name="photo" id="">
    </div>


    <div class="btn">
        <button>Creer</button>
    </div>
</form>
</body>
</html>