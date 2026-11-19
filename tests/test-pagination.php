<?php
require_once __DIR__ . '/../fonctions/pagination.php';

function verifier(string $nom, bool $ok): void
{
    echo ($ok ? 'OK   ' : 'ECHEC') . " - $nom\n";
}

verifier('25 articles / 10 = 3 pages', nombrePages(25, 10) === 3);
verifier('0 article = 1 page', nombrePages(0, 10) === 1);
verifier('page 2 commence à 10', articlesDeLaPage(range(0, 24), 2, 10)[0] === 10);
verifier('dernière page = 5 articles', count(articlesDeLaPage(range(0, 24), 3, 10)) === 5);

try {
    nombrePages(10, 0);
    verifier('parPage 0 doit lever une erreur', false);
} catch (InvalidArgumentException $e) {
    verifier('parPage 0 lève une erreur', true);
}