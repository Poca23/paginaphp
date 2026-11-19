<?php
// Retourne un numéro de page valide (entre 1 et $max), sinon null
function pageValide(mixed $valeur, int $max): ?int
{
    $page = filter_var($valeur, FILTER_VALIDATE_INT);
    if ($page === false || $page < 1 || $page > $max) {
        return null;
    }
    return $page;
}