# Artificial Intelligence

Artificial Intelligence is a WordPress theme. It wants to take your FRC team's website and give it superpowers.

Right now, we're still developing AI, so some stuff might not work as intended. If so, just submit a ticket and we'll get to at as soon as possible.

## Features

* Grab the attention of visitors and spread the mission of FIRST with a super awesome homepage.
* What would a WordPress theme be without a blog? We've spent hours crafting perfect typography to make reading as comfortable as possible. And photos are front and center here, edge-to-edge and top-to-bottom.
* AI showcases take the photos thing to a whole new level, enabling you to build gorgeous pages and embark on advertising like only Apple has. Go ahead, brag about your robot or praise your sponsors. Nothing's stopping you.
* With its built-in Skin API, AI is incredibly easy to customize to fit your site's branding. Use one of the default skins, or build your own with a config file.
* And AI isn't just beautiful; it wants to lubricate your team's communications with a little app we call Streams. It's a cross between forums, chat, and email. And it's awesome.
* It's free. Doesn't get better than that, right?
* And we're adding more stuff as fast as we can. Expect more awesome things coming soon!

## Development

To help develop AI, you'll need the following tools:

* Ruby (with Bundler)
* PHP (with Composer)
* Node (with npm)
* Grunt
* Vagrant and VirtualBox

After cloning the repo, you'll need to run the following commands to get everything up and working:

```bash
npm install
bower install
bundle install
composer install
grunt build
```

If you're using Vagrant, running a VM is as simple as a `vagrant up`.

### Documentation

Documentation is in the works. We're working hard to put out a lot of new features right now, but docs will follow shortly.

### Grunt tasks

* `grunt sass`: Compiles Sass to CSS.
* `grunt autoprefixer`: Prefixes generated CSS.
* `grunt coffee`: Compiles CoffeeScript to JavaScript.
* `grunt watch`: Run most of the above commands when certain files change.
* `grunt modernizr`: Regenerates the Modernizr build.
* `grunt build`: Quickly builds CSS and JS for conveinence.

## Browser support

Artificial Intelligence officially supports the previous two versions of all browsers with a market share of greater than 3%, as well as Firefox ESR and Internet Explorer 9.

AI *does not* officially support Internet Explorer 8. It includes Modernizr, HTML5shiv, and Respond.js to help with backwards-compatibility, but does not implement further support. This includes backend applications such as Streams.
