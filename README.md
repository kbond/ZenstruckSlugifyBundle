# ZenstruckSlugifyBundle

This bundle provides integration of the [Slugify](https://github.com/cocur/slugify) library into Symfony2.
A slugify service and twig filter is provided.

## Installation

1. Install with composer:

    ```
    php composer.phar require zenstruck/slugify-bundle
    ```

2. Enable the bundle:

    ```php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Zenstruck\SlugifyBundle\ZenstruckSlugifyBundle()
        );
    }
    ```

## Using the service

```php
/** @var Cocur\Slugify\Slugify $slugify */
$slugify = $this->container->get('zenstruck.slugify');
```

## Using the Twig filter

```html+jinja
{{ 'Hello World!'|slugify }} {# hello-world #}

{# custom space separator #}
{{ 'Hello World!'|slugify('_') }} {# hello_world #}
```

## Full Default Configuration

```yaml
zenstruck_slugify:
    twig: true
```