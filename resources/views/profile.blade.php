<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour du profil utilisateur</title>
</head>
<body>
    <h1>Mettre à jour le profil</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
        <br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
