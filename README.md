# Artificial Intelligence

Artificial Intelligence is a [WordPress](https://wordpress.org) theme. It wants to take your [FRC](http://www.usfirst.org/roboticsprograms/frc) team's website and give it superpowers.

![Screenshot of Artificial Intelligence](https://raw.githubusercontent.com/duchenerc/artificial-intelligence/master/screenshot.png "Screenshot of Artificial Intelligence")

Right now, we're still developing AI, so some stuff might not work as intended. If so, just submit a ticket and we'll get to it at as soon as possible.

## Features

* Grab the attention of visitors and spread the mission of [FIRST](http://www.usfirst.org) with a super awesome homepage. Put your photos up front and center for the world to see.
* Showcases take the photos-first thing to a whole new level, enabling you to build gorgeous pages and embark on advertising like only Apple has. Go ahead, brag about your robot or praise your sponsors. Nothing's stopping you.
* What would a WordPress theme be without a blog? We've spent hours crafting perfect typography to make reading as comfortable as possible, ensuring that you can keep old readers as well as you make new ones.
* With its built-in Skin API, AI is incredibly easy to customize to fit your team's branding. Use one of the default skins, or build your own with a config file.
* It's free. Doesn't get any better than that, right?
* And we're adding more stuff as fast as we can. Expect more awesome things coming soon!

### Browser support

Artificial Intelligence officially supports the previous two or three versions of all browsers with a market share greater than 3%, as well as Firefox ESR and Internet Explorer 9.

AI does not officially support Internet Explorer 8. It includes [Modernizr](http://modernizr.com/), [HTML5 Shiv](https://github.com/aFarkas/html5shiv), and [Respond.js](https://github.com/scottjehl/Respond) to help with backwards-compatibility, but does not implement further support.

### Features roadmap

We have several amazing things coming down the road for AI, including the following:

* Real-time communication app
* Automatic scouting (maybe?)
* Merchandise store
* Social media integration
* Whatever awesome ideas the community can conceive

Got an idea? Open a ticket for it and we'll see about implementing it!

## Installation

Artificial Intelligence is a [WordPress](https://wordpress.org) theme; it requires you to have a working installation of WordPress, version 3.9 or later. WordPress has a couple base requirements that almost all webhosts provide; in fact, many hosts provide one-click installations. If you're setting up your install manually, check out the [installation guide on the WordPress Codex](http://codex.wordpress.org/Installing_WordPress).

1. Download the latest release of Artificial Intelligence to your computer.
2. In your WordPress install, navigate to Appearance >> Themes. Click "Add Theme," then "Upload Theme."
3. Upload Artificial Intelligence to WordPress and activate it.

As AI is hosted on GitHub rather than the WordPress Theme Repo, you will not see available updates by default. A workaround for this is to install the [GitHub Updater](https://github.com/afragen/github-updater) plugin; you will have to download it from its repo and upload it to your install.

### Setup

We've got a [quick guide](https://github.com/duchenerc/artificial-intelligence/wiki/Setup) for you in the wiki that covers setting up your homepage, blog, navigation menus, widget areas, background, and skin.

## Development

To help develop AI, you'll need the following tools:

* [Ruby](https://www.ruby-lang.org/) (with [Bundler](http://bundler.io/))
* [PHP](http://php.net/) (with [Composer](https://getcomposer.org/))
* [Node](http://nodejs.org/) (with [npm](https://www.npmjs.com/))
* [Grunt](http://www.gruntjs.org/)
* [Bower](http://bower.io/)
* [Vagrant](https://www.vagrantup.com/) and [VirtualBox](https://www.virtualbox.org/)

After cloning the repo, you'll need to run the following commands to get everything up and working:

```bash
npm install
bower install
bundle install
composer install
grunt build
```

If you're using Vagrant, running a VM is as simple as a `vagrant up`.

Note that the master branch is for stable releases, and the development branch is unstable. Probably opposite of the way it should be, but whatever.

### Documentation

Documentation is in the works. We're working hard to put out a lot of new features right now, but docs will follow shortly.

### Grunt tasks

* `grunt sass`: Compiles Sass to CSS.
* `grunt autoprefixer`: Prefixes generated CSS.
* `grunt coffee`: Compiles CoffeeScript to JavaScript.
* `grunt watch`: Run most of the above tasks when certain files change.
	* `grunt watch:sass`: Compiles Sass to CSS and applies necessary vendor prefixes with Autoprefixer.
	* `grunt watch:coffee`: Compiles CoffeeScript to JavaScript.
* `grunt modernizr`: Regenerates the Modernizr build.
* `grunt build`: Quickly builds CSS and JS for conveinence.
