<article>
    <h2><?= htmlspecialchars($article['titre']) ?></h2>
    <p><?= htmlspecialchars($article['contenu']) ?></p>
    <time datetime="<?= $article['date-creation']->format('Y-m-d') ?>">
        <?= $article['date-creation']->format('d/m/Y') ?>
    </time>
</article>