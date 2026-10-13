# Ephpicman Starter Theme

A lightweight, accessible, and extensible starter theme for WordPress. The theme provides the product-specific entry point and integrates with EPM, the shared framework that orchestrates the lifecycle of Ephpicman products.

## Platform requirements

The theme's minimum platform requirements are:

- **PHP 8.0** — declared as `Requires PHP: 8.0` in the theme metadata.
- **WordPress 6.3** — declared as `Requires at least: 6.3` in the theme metadata.

These values are kept aligned between `functions.php` and `style.css`. If a derived theme requires newer versions, update both declarations and this documentation together. Do not lower the requirements below what the theme code and the synchronized EPM version actually support.

These are minimum compatibility requirements, not recommendations to run outdated software. For production sites, use currently supported PHP and WordPress releases.

## Architecture and request lifecycle

EPM is the shared framework responsible for orchestrating the lifecycle of products built on it. WordPress remains the host platform and continues to own its native theme lifecycle hooks.

1. WordPress loads `functions.php`, which guards against direct access, defines the theme file constant, loads the synchronized EPM bootstrap and the theme class, and registers the theme with `EpmLoader`.
2. The theme entry point connects activation and deactivation callbacks to WordPress and registers the theme's initialization method on `init`.
3. `src/Theme.php` registers the active theme's directory with EPM during initialization and loads the theme's translations.
4. The EPM bootstrap initializes its loader and invokes `EPM\\App::run()` on `wp_loaded`. This happens after the theme and active plugins have had their earlier WordPress initialization opportunities to register with EPM.
5. The theme's `index.php` delegates final request handling to `EPM\\App::terminate()`. EPM owns that framework-level termination boundary; WordPress still determines which template is selected.

The lifecycle methods are intentionally small placeholders. Add behavior only when the theme has a concrete requirement. Keep WordPress-native theme hooks integrated with WordPress rather than trying to replace them.

## Repository structure

```text
functions.php                       Theme metadata, bootstrap, and WordPress hooks
index.php                           Delegates request termination to EPM
src/Theme.php                       Theme lifecycle and initialization
style.css                           Required theme metadata and stylesheet entry point
epm/bootstrap.php                   Shared EPM loader/bootstrap
epm/src/                             Synchronized EPM framework source
languages/                          POT template and translated PO/MO catalogs
.github/workflows/translations.yml  Translation catalog generation and compilation
.github/workflows/sync-epm.yml      Scheduled and manual EPM synchronization
```

## Installation

1. Clone or download this repository.
2. Place the theme directory in `wp-content/themes/ephpicman-starter`.
3. Activate **Ephpicman Starter** from **Appearance → Themes**.

WordPress discovers the theme using the metadata in `style.css`. Keep its theme name, version, requirements, text domain, and other metadata consistent with the header in `functions.php`.

## Customizing the theme

### 1. Rename and identify the theme

Update the theme name, description, URI, author details, repository/folder slug, and any product-specific documentation in `functions.php` and `style.css`. Keep the PHP namespace in `src/Theme.php` aligned with the namespace passed to `EpmLoader::register()`.

Keep the Text Domain unique and stable. Update it consistently in both metadata headers, translation calls, catalog filenames, and `.github/workflows/translations.yml` if you rename it.

### 2. Preserve platform requirements

The starter declares **PHP 8.0** and **WordPress 6.3** as its minimum requirements. When raising either minimum, update `functions.php`, `style.css`, this documentation, and any CI or compatibility checks that cover the theme. Do not claim compatibility with a version that the theme code or its dependencies do not support.

### 3. Configure translations

- Wrap user-facing translatable strings in WordPress internationalization functions such as `__()`, `_e()`, `esc_html__()`, and `esc_attr__()`, as appropriate.
- Use the theme's Text Domain consistently.
- Keep source `.po` catalogs under version control. The workflow generates the `.pot` template and compiles `.mo` files.
- Review generated changes to ensure existing translations are preserved.
- Remove starter/test strings and test translations that are not part of the product.

The current workflow uses `ephpicman-starter` and updates `languages/ephpicman-starter-fa_IR.po` when that file exists. Update `.github/workflows/translations.yml` when renaming the Text Domain or translation catalogs.

### 4. Add theme behavior

Implement theme-specific behavior under `src/`. Keep shared framework code under `epm/`; that directory is maintained by the EPM synchronization workflow and must not be used for theme-specific classes.

Keep the entry point and main lifecycle class focused on bootstrapping, registration, and lifecycle boundaries. Add abstractions only when they solve a concrete requirement. Keep presentation and theme-specific configuration in the theme rather than duplicating shared framework responsibilities.

### 5. Follow WordPress security and accessibility practices

- Validate and sanitize input.
- Check capabilities and nonces for privileged actions.
- Prefer WordPress APIs.
- Escape output where it is rendered.
- Follow WordPress accessibility and semantic markup conventions.
- Do not commit secrets, credentials, environment-specific configuration, or production data.

### 6. Review repository workflows

- Confirm EPM synchronization succeeds and that the expected files under `epm/` are present.
- Confirm the translation workflow uses the correct Text Domain and catalog filenames.
- Run PHP syntax and WordPress Coding Standards checks before release.
- Ensure GitHub Actions permissions allow only the writes required by the workflows.
- Test theme activation and actual rendering in a WordPress environment. A successful PHP syntax check alone does not prove that the theme renders correctly or that EPM initializes as expected.

## EPM synchronization

GitHub Actions synchronizes `Ephpicman/EPM` `main` into `epm/` daily at **09:00 Asia/Tehran** and supports manual runs through **Actions → Sync EPM → Run workflow**. The workflow uses `git subtree` with `--squash`, so it does not import EPM's full commit history.

Treat `epm/` as synchronized framework code rather than a place for local theme changes. After creating or updating the theme repository, verify that synchronization succeeds and the framework files are present.

The sync workflow needs repository contents write permission to commit updates. The translation workflow also needs contents write permission to commit generated catalogs.

## License

This starter is distributed under **GNU General Public License version 2 or, at your option, any later version (GPL-2.0-or-later)**. See [LICENSE](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html) for the license terms.

## Design principles

- Keep the theme lean, accessible, and maintainable.
- Treat EPM as the shared framework and keep theme code separate.
- Preserve WordPress's native lifecycle hooks while letting EPM orchestrate product lifecycle.
- Guard direct access to PHP files.
- Use WordPress APIs and escape output at the point of rendering.
- Validate requirements before adding features or abstractions.
- Keep PHP and WordPress minimums consistent across metadata and documentation.
- Never commit secrets or environment-specific configuration.
