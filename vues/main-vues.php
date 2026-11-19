<?php
require 'vues/entete.php';
require 'vues/navigation.php';

foreach ($articlesPage as $article) {
    require 'vues/article.php';
}

require 'vues/pied.php';