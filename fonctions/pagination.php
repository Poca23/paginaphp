<?php
function nombrePages(int $total, int $parPage): int
{
    if ($parPage < 1) {
        throw new InvalidArgumentException('parPage doit être >= 1');
    }
    return max(1, (int) ceil($total / $parPage));
}

function articlesDeLaPage(array $articles, int $page, int $parPage): array
{
    return array_slice($articles, ($page - 1) * $parPage, $parPage);
}