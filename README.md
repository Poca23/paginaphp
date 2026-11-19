# Paginaphp

Auteure : Claire Naudin, formation CDA 2026-2027

## Objectif

Une pagination d'articles en PHP : 10 articles par page, navigation
entre les pages, affichage adapté au mobile et au desktop.

Points travaillés : validation du numéro de page, redirection 303,
architecture modulaire, séparation logique / affichage, tests automatiques.

## Structure

```
.
├── index.php
├── donnees/
│   └── articles.php
├── fonctions/
│   ├── main-fonctions.php
│   ├── pagination.php
│   └── validation.php
├── vues/
│   ├── main-vues.php
│   ├── entete.php
│   ├── navigation.php
│   ├── article.php
│   └── pied.php
├── css/
│   ├── main.css
│   ├── base.css
│   ├── composants.css
│   └── responsive.css
└── tests/
    ├── test-pagination.php
    └── test-validation.php
```

## Rôle des fichiers

| Fichier                        | Rôle                                              |
| ------------------------------ | ------------------------------------------------- |
| `index.php`                    | point d'entrée : valide la page, appelle les vues |
| `fonctions/main-fonctions.php` | importe toutes les fonctions                      |
| `fonctions/pagination.php`     | `nombrePages()` et `articlesDeLaPage()`           |
| `fonctions/validation.php`     | `pageValide()` : retourne la page ou `null`       |
| `vues/main-vues.php`           | appelle les vues dans l'ordre                     |
| `css/main.css`                 | importe tous les CSS                              |

## Lancer le projet

```bash
php -S localhost:8000
```

Ouvrir `http://localhost:8000/index.php`.

## Tester

```bash
php tests/test-pagination.php
php tests/test-validation.php
```

Résultat attendu : 10 lignes `OK`.

## Validation du numéro de page

| Cas                          | Comportement                |
| ---------------------------- | --------------------------- |
| Page absente                 | page 1                      |
| Non entier (`abc`), 0, < 0   | redirection 303 vers page 1 |
| Supérieur à la dernière page | redirection 303 vers page 1 |
| Erreur interne               | statut 500 + message        |

## Bonnes pratiques

- Fichiers de moins de 100 lignes.
- Un `main` par rôle : CSS, vues, fonctions.
- `htmlspecialchars()` sur les données affichées (protection XSS).
- Balises sémantiques : `header`, `main`, `nav`, `article`, `time`, `footer`.
- `aria-current="page"` sur la page active.
- CSS mobile first : 1 colonne, puis 2 colonnes dès 768 px.

## Méthode : TDD

Écrire le test, le lancer (il échoue), écrire le code, relancer (il réussit).

## Ce que j'ai appris

- `array_slice()` découpe les articles d'une page sans boucle compliquée.
- `ceil()` arrondit au supérieur pour obtenir le nombre de pages.
- Séparer le calcul de l'affichage permet de le tester simplement.
- Une redirection relative évite d'écrire `localhost:8000` en dur.

## Statut

Exercice terminé et validé.
