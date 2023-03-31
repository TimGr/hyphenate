# Hyphenate
Hyphenate is a Statamic addon providing a modifier to hyphenate strings based on the TeX-Hyphenation algorithm provided by the org_heigl/hyphenator package.

The Hyphenate modifier will output a “soft hyphen” using the HTML entity `&shy;`. This entity marks wehre the browser should break if necessary.

## Install via Composer
```
composer require timnarr/hyphenate
```

## Usage

```
{{ title | hyphenate }}
```

Read more about Statamic modifiers here https://statamic.dev/modifiers


## Example
Let's assume we have a multilang page and a heading `title`, which holds "Hyphenation" in english and "Silbentrennung" in german.

We output `title` in your antlers file and use the `hyphenate` modifier like this:

```html
  <h1>{{ title | hyphenate }}</h1>
```

And the final HTML output is:
```html
  <h1>Silben&shy;tren&shy;nung</h1>
  <h1>Hyphen&shy;a&shy;tion</h1>
```

## License
MIT License © 2023-present Tim Grochowski
