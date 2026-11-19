<?php
require_once __DIR__ . '/../fonctions/validation.php';

function verifier(string $nom, bool $ok): void
{
    echo ($ok ? 'OK   ' : 'ECHEC') . " - $nom\n";
}

verifier('"2" est valide', pageValide('2', 5) === 2);
verifier('0 est refusé', pageValide(0, 5) === null);
verifier('-3 est refusé', pageValide(-3, 5) === null);
verifier('6 > max est refusé', pageValide(6, 5) === null);
verifier('"abc" est refusé', pageValide('abc', 5) === null);