<nav aria-label="Pagination">
    <?php for ($i = 1; $i <= $pageMax; $i++): ?>
        <a href="index.php?page=<?= $i ?>" <?= $i === $page ? 'aria-current="page"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>
</nav>