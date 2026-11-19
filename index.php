<?php
declare(strict_types=1);

require_once 'donnees/articles.php';
require_once 'fonctions/main-fonctions.php';

const PAR_PAGE = 10;

try {
    $pageMax = nombrePages(count($articles), PAR_PAGE);
    $page = pageValide($_GET['page'] ?? 1, $pageMax);

    if ($page === null) {
        header('Location: index.php?page=1', true, 303);
        exit;
    }
    $articlesPage = articlesDeLaPage($articles, $page, PAR_PAGE);
    require 'vues/main-vues.php';
} catch (Throwable $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo '<p>Une erreur est survenue. Réessayez plus tard.</p>';
}