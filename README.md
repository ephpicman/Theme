# Ephpicman Starter Theme

A lightweight, accessible, and extensible starter theme for WordPress.

## Requirements

- WordPress 6.4+
- PHP 7.4+

## Installation

1. Download or clone this repository.
2. Place the theme directory in `wp-content/themes/ephpicman-starter`.
3. Activate **Ephpicman Starter** from **Appearance → Themes**.

## Structure

- `assets/css/main.css` — theme styles
- `assets/js/main.js` — front-end JavaScript
- `inc/theme-setup.php` — theme supports and navigation
- `inc/enqueue-assets.php` — styles and scripts
- `inc/template-tags.php` — reusable template helpers
- `template-parts/` — reusable content templates
- `epm/` — automatically synchronized from the `main` branch of [EPM](https://github.com/ephpicman/EPM)

## EPM synchronization

GitHub Actions synchronizes `EPM/main` into `epm/` daily at 09:00 Asia/Tehran. You can also run it manually from **Actions → Sync EPM → Run workflow**.

Synchronization uses Git subtree with `--squash`; upstream EPM commit history is not imported in full.

## Development

Keep the theme lean, accessible, and compatible with WordPress coding conventions. Run PHP linting and WordPress coding-standard checks before release.
