module.exports = (grunt) ->
	
	grunt.initConfig
		pkg: grunt.file.readJSON 'package.json'
		
		## sass
		## Compiles Sass assets
		## @see watch:frontend
		## @see watch:frontendd
		## @see watch:forums
		## @see watch:forumsd
		## @see build
		sass:
			options:
				bundleExec: true
			
			## sass:frontend
			## Compiles frontend Sass.
			## @see watch:frontend
			## @see build
			frontend:
				files: [
					{
						expand: true
						cwd: 'scss/skins/'
						src: ['*.scss']
						dest: 'frontend/gen/'
						ext: '.css'
						extDot: 'first'
					}
				]
				options:
					style: 'compressed'
					loadPath: [
						'scss/'
						'frontend/scss/'
					]
			
			## sass:frontendd
			## Compiles frontend Sass with debug info
			## @see watch:frontendd
			frontendd:
				files: [
					{
						expand: true
						cwd: 'scss/skins/'
						src: ['*.scss']
						dest: 'frontend/gen/'
						ext: '.css'
						extDot: 'first'
					}
				]
				options:
					style: 'expanded'
					lineNumbers: true
					loadPath: [
						'scss/'
						'frontend/scss/'
					]
				
			## sass:forums
			## Compiles forums Sass
			## @see watch:forums
			## @see build
			forums:
				files: [
					{
						expand: true
						cwd: 'scss/skins/'
						src: ['*.scss'],
						dest: 'forums/gen/'
						ext: '.css'
						extDot: 'first'
					}
				]
				options:
					style: 'compressed'
					loadPath: [
						'scss/'
						'forums/scss/'
					]
			
			## sass:forumsd
			## Compiles forums Sass with debug info
			## @see watch:forumsd
			forumsd:
				files: [
					{
						expand: true
						cwd: 'scss/skins/'
						src: ['*.scss'],
						dest: 'forums/gen/'
						ext: '.css'
						extDot: 'first'
					}
				]
				options:
					style: 'expanded'
					lineNumbers: true
					loadPath: [
						'scss/'
						'forums/scss/'
					]
			
		## autoprefixer
		## Automatically adds vendor prefixes to generated CSS
		## @see watch:frontend
		## @see watch:frontendd
		## @see watch:forums
		## @see watch:forumsd
		## @see build
		autoprefixer:
			options:
				browsers: [
					'last 2 versions'
					'> 3%'
					'ie 8'
					'firefox esr'
				]
				map: true
			
			## autoprefixer:frontend
			## Prefixes frontend CSS
			## @see watch:frontend
			## @see watch:frontendd
			frontend:
				src: 'frontend/gen/*.css'
			
			## autoprefixer:frontend
			## Prefixes frontend CSS
			## @see watch:frontend
			## @see watch:frontendd
			forums:
				src: 'forums/gen/*.css'
			
		
		## coffee
		## Compiles CoffeeScript assets
		## @see watch:frontend
		## @see watch:frontendd
		## @see watch:forums
		## @see watch:forumsd
		## @see build
		coffee:
			options:
				sourceMap: true
			
			## coffee:frontend
			## Compiles frontend CoffeeScript
			## @see watch:frontend
			## @see watch:frontendd
			frontend:
				options:
					bare: true
					join: true
				files:
					'frontend/gen/frontend.js': ['frontend/coffee/*.coffee']
			
			## coffee:forums
			## Compiles forums CoffeeScript
			## @see watch:forums
			## @see watch:forumsd
			forums:
				options:
					bare: true
					join: true
				files:
					'forums/gen/forums.js': ['forums/coffee/*.coffee']
		
		## watch
		## Watches files for changes and runs tasks upon change
		watch:
			
			## watch:frontend
			## Watches frontend assets and compiles them
			frontend:
				files: [
					'frontend/scss/*.scss'
					'frontend/coffee/*.coffee'
					'scss/**/*.scss'
				]
				tasks: [
					'sass:frontend'
					'autoprefixer:frontend'
					'coffee:frontend'
				]
			
			## watch:frontendd
			## Watches frontend asssets and compiles them with debug info
			frontendd:
				files: [
					'frontend/scss/*.scss'
					'frontend/coffee/*.coffee'
					'scss/**/*.scss'
				]
				tasks: [
					'sass:frontendd'
					'autoprefixer:frontend'
					'coffee:frontend'
				]
			
			## watch:forums
			## Watches forums assets and compiles them
			forums:
				files: [
					'forums/scss/*.scss'
					'forums/coffee/*.coffee'
					'scss/**/*.scss'
				]
				tasks: [
					'sass:forums'
					'autoprefixer:forums'
					'coffee:forums'
				]
			
			## watch:forumsd
			## Watches forums assets and compiles them with debug info
			forumsd:
				files: [
					'forums/scss/*.scss'
					'forums/coffee/*.coffee'
					'scss/**/*.scss'
				]
				tasks: [
					'sass:forums'
					'autoprefixer:forums'
					'coffee:forums'
				]
		
		## modernizr
		## Generates custom modernizr build based on CSS and JS assets
		## @see build
		modernizr:
			dist:
				devFile: "bower_components/modernizr/modernizr.js"
				outputFile: "frontend/gen/modernizr.js"
				
				extra:
					shiv:           false
					printshiv:      true
					load:           true
					mq:             false
					cssclasses:     true
				
				extensibility:
					addtest:        false
					prefixed:       false
					teststyles:     false
					testprops:      false
					testallprops:   false
					hasevents:      false
					prefixes:       false
					domprefixes:    false
					cssclassprefix: ""
				
				parseFiles: true
				files:
					src: [
						"bower_components/**/*.js"
						"bower_components/**/*.css"
						"!bower_components/modernizr/**/*.js"
						"frontend/**/*.js"
						"frontend/**/*.scss"
						"scss/**/*.scss"
						"streams/**/*.js"
						"streams/**/*.scss"
					]
				
				matchCommunityTests: false
    
		## shell
		## Adds shell shortcuts
		## @see build
		shell:
			
			## shell:checkout
			## Update dependencies on branch switch
			checkout:
				command: (branch) ->
					if branch is "dependencies" or branch is "master"
						[
							"git checkout #{branch}"
							"composer install"
							"bower install"
						].join("&&")
					
					else
						"git checkout #{branch}"
			
			## shell:install
			## Installs all dependencies
			## @see setup
			install:
				command: [
					"npm install"
					"echo npm install finished"
					"bower install"
					"echo bower install finished"
					"bundler install"
					"echo bundler install finished"
					"composer install"
					"echo composer install finished"
				].join("&&")
			
			
	
	## build
	## Builds all assets
	## @see setup
	grunt.registerTask 'build', [
		'sass:frontend'
		'sass:forums'
		'autoprefixer'
		'coffee'
		'modernizr'
	]
	
	## setup
	## Initializes a repository from scratch
	grunt.registerTask 'setup', [
		'shell:install'
		'build'
	]
	
	
	require('load-grunt-tasks') grunt
