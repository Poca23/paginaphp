<?php
require_once 'bdd-articles.php';

$nombreArticlesAAfficher = 10;
// Ceil (plafond) : quand on divise, si ça tombe pas juste, on arrondit
// méchamment au-dessus (l'entier au dessus)
$numeroPageMax = ceil(count($articles) / $nombreArticlesAAfficher);

// Je récupère le numéro de page envoyé par le client
// J'en profite pour valider que c'est un entier (parce qu'un numéro
// de page, c'est un entier)
$numeroPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
// Si le numéro de page n'est pas là ou si c'est zéro ou un nombre négatif...
if(!$numeroPage || $numeroPage < 1) {
    // Le numéro de page est pas bon, on devrait prévenir l'usager
    // Une solution : l'envoyer paître
    // http_response_code(404);
    // echo "<h1>Wtf</h1><p>Votre numéro de page demandé est pas super</p>";
    // exit();

    // Une autre solution : le rediriger vers la bonne page
    http_response_code(303);
    header('Location: http://localhost:8000/index.php?page=1');
    exit();
}
// J'en profite pour vérifier : est-ce que le numéro de page qu'on me
// demande, c'est pas "au-delà" du numéro de page maximum ?
if($numeroPage > $numeroPageMax) {
    // Plutôt que de définir le numéro de page comme le numéro de page
    // maximum, on peut envoyer paître le client, ou le rediriger
    // $numeroPage = $numeroPageMax;
    // Exemple avec la redirection :
    http_response_code(303);
    header('Location: http://localhost:8000/index.php?page=' . $numeroPageMax);
    exit();
}
// En théorie, le numéro de page est forcément :
// - Un entier
// - Pas plus petit que 1
// - Pas plus grand que le numéro de page max

$articleMinimum = ($numeroPage - 1) * 10;
// Si page = 1, articleMinimum = 0
// Si page = 2, articleMinimum = 10
// Si page = 3, articleMinimum = 20
// ...
$articleMaximum = $articleMinimum + $nombreArticlesAAfficher;

// Autre possibilité : ne retenir que les articles qui nous intéressent
// $articles = array_slice($articles, $articleMaximum, $nombreArticlesAAfficher);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des articles</title>
</head>
<body>
    <h1>Les articles</h1>
    <em>Page <?= $numeroPage ?></em>

    <nav>
        <?php for($i = 1; $i <= $numeroPageMax; $i++): ?>
        <a href="index.php?page=<?= $i ?>">Page <?= $i ?></a>
        <?php endfor; ?>
    </nav>

    <?php for($i = $articleMinimum; $i < $articleMaximum; $i++): ?>
        <?php 
        if(!isset($articles[$i])) break;
        $article = $articles[$i];
        ?>

        <article>
            <h2><?= $article['titre'] ?></h2>
            <p><?= $article['contenu'] ?></p>
            <em>Date : <?= $article['date-creation']->format('d/m/Y') ?></em>
        </article>
    <?php endfor; ?>
</body>
</html>