# Attila-WP

A content focused responsive theme, originally for [Ghost](http://github.com/tryghost/ghost/), now available for [WordPress](https://wordpress.org).

## Demo

* [Blog](http://attila.zutrinken.com/)
* [Post](http://attila.zutrinken.com/demo/)
* [Tag Archive](http://attila.zutrinken.com/tag/general/)
* [Author Archive](http://attila.zutrinken.com/author/zutrinken/)

## Features

* Responsive layout
* Navigation support
* Paralax cover images for posts, author archives and blog
* Author informations for posts and author archives
* Featured posts
* Reading progress for posts
* Automatic code syntax highlight and line numbers
* Disqus support
* Sharing buttons

## Setup

To enable [Disqus](https://disqus.com/) comments go to your blogs code injection settings and add `<script>var disqus = 'YOUR_DISQUS_SHORTNAME';</script>` to your blog header.

## Development

Install [Grunt](http://gruntjs.com/getting-started/):

  npm install -g grunt-cli
  
Install Grunt dependencies:

  npm install

Build Grunt project:

  grunt build
  