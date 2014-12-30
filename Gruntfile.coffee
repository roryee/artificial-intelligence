module.exports = (grunt) ->
	
	grunt.initConfig
		pkg: grunt.file.readJSON 'package.json'
		
		# Watch config
		watch:
			sass:
				files: [
					'frontend/scss/*.scss'
					'scss/**/*.scss'
				]
				tasks: [
					'sass:dist'
					'autoprefixer'
				]
			
			sassdebug:
				files: [
					'frontend/scss/*.scss'
					'scss/**/*.scss'
				]
				tasks: [
					'sass:debug'
					'autoprefixer'
				]
					
			coffee:
				files: [
					'frontend/coffee/*.coffee'
				]
				tasks: [
					'coffee:frontend'
				]
			
			streams:
				files: [
					'streams/app/**/*.coffee'
					'streams/templates/*.jade'
				]
				tasks: [
					'jade:streams'
					'coffee:streams'
				]
		
		# Sass config
		sass:
			options:
				bundleExec: true
			debug:
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
			dist:
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
					
		# Autoprefixer config
		autoprefixer:
			options:
				browsers: [
					'last 2 versions'
					'> 3%'
					'ie 8'
					'firefox esr'
				]
				map: true
				
			dist:
				src: 'frontend/gen/*.css'
			
		
		# CoffeeScript config
		coffee:
			options:
				sourceMap: true
			
			frontend:
				options:
					bare: true
					join: true
				files:
					'frontend/gen/frontend.js': ['frontend/coffee/*.coffee']
			
			streams:
				options:
					bare: true
					join: true
				files:
					'streams/streams.js': [
						'streams/app/factories/*.coffee'
						'streams/app/controllers/*coffee'
						'streams/app/config/*.coffee'
					]
				
		
		# Jade config
		# used for Streams templating, maybe eventually for WordPress
		jade:
			options:
				pretty: true
				
			streams:
				files: [
					{
						expand: true
						cwd: 'streams/templates/'
						src: ['*.jade']
						dest: 'streams/partials/'
						ext: '.html'
						extDot: 'first'
					}
				]
		
		# Modernizr config
		# Awesomeness
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
    
		# Shell config
		# Manages shell commands
		shell:
			
			# Update dependencies on branch switch
			# Can be extremely annoying to deal with otherwise
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
			
			# install
			# Installs all the things
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
			
			
	
	grunt.registerTask 'checkout', ['shell:checkout']
	
	grunt.registerTask 'build', [
		'sass:dist'
		'autoprefixer'
		'coffee'
		'jade'
		'modernizr'
	]
	
	grunt.registerTask 'setup', ['shell:install', 'build']
	
	
	require('load-grunt-tasks') grunt
