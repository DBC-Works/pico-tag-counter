Pico tag counter plugin
=======================

Count tag.

## Installation 

1. Copy the php file in your plugin folder.
2. Add following statement to 246 line of  [/lib/pico.php](https://github.com/picocms/Pico/blob/master/lib/pico.php) (case of ver.0.8).

`'tags' => isset($page_meta['tags']) ? $page_meta['tags'] : '',`

## Usage

Add meta variable `CountTag` to count tag content and set value `ForServer` or `ForClient`, like this:

    /*
    Title: 2014's posts
    CountTag: ForClient
    */

Then you can use the Twig variables `{{ tag_count }}`.

If `CountTag` sets `ForClinet`, `tag_count` is json(url encoded).

## Update History

### 2014-10-11

First release.