<!DOCTYPE html>
<html>
<head>
    <title>Mon Formulaire</title>
</head>
<body>
<form method="POST" action="{{ route('process-form') }}">
    @csrf <!-- Ajoutez le jeton CSRF pour la sécurité -->

    <label for="myInput">Âge :</label>
    <input type="text" id="myInput" name="age"> <!-- Changez le nom du champ en "age" -->

    <button type="submit">Soumettre</button>
</form>
</body>
</html>
