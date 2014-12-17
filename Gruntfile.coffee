module.exports = (grunt) ->
	
	grunt.initConfig {
		pkg: grunt.file.readJSON 'package.json'
		
		# Watch config
		watch:
			sass:
				files: [
					'scss/**/*.scss'
				]
				tasks: [
					'sass:dist'
					'autoprefixer'
				]
			
			sassdebug:
				files: [
					'scss/**/.scss'
				]
				tasks: [
					'sass:debug'
					'autoprefixer'
				]
					
			coffee:
				files: [
					'coffee/*.coffee'
				]
				tasks: [
					'coffee:frontend'
					# 'uglify:frontend'
				]
			
			streams:
				files: [
					'streams/app/**/*.coffee'
					'streams/templates/*.jade'
				]
				tasks: [
					'jade:streams'
					'coffee:streams'
					# 'uglify:streams'
				]
		
		# Sass config
		sass:
			options:
				require: [
					'sass-globbing'
					# 'susy'
				]
			debug:
				files: [
					{
						expand: true
						cwd: 'scss/'
						src: ['**/*.scss']
						dest: 'css/'
						ext: '.css'
						extDot: 'first'
					}
				]
				options:
					style: 'expanded'
					lineNumbers: true
			dist:
				files: [
					{
						expand: true
						cwd: 'scss/'
						src: ['**/*.scss']
						dest: 'css/'
						ext: '.css'
						extDot: 'first'
					}
				]
				options:
					style: 'compressed'
					
		# Autoprefixer config
		autoprefixer:
			dist:
				src: 'css/*.css'
				options:
					map: true
					browsers: [
						'last 2 versions'
						'> 3%'
						'ie 8'
						'firefox esr'
					]
		
		# CoffeeScript config
		coffee:
			options:
				sourceMap: true
			
			frontend:
				options:
					bare: true
					join: true
				files:
					'js/frontend.js': ['coffee/*.coffee']
			
			streams:
				options:
					bare: true
					join: true
				files:
					'streams/streams.js': ['streams/app/**/*.coffee']
				
		
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
				outputFile: "js/modernizr.js"
				
				extra:
          shiv : false
          printshiv : true
          load : true
          mq : false
          cssclasses : true
				
        extensibility:
          addtest : false
          prefixed : false
          teststyles : false
          testprops : false
          testallprops : false
          hasevents : false
          prefixes : false
          domprefixes : false
          cssclassprefix: ""
				
				parseFiles: true
				files:
					src: [
						"bower_components/**/*.js"
						"bower_components/**/*.css"
						"!bower_components/modernizr/**/*.js"
						"js/**/*.js"
						"scss/**/*.scss"
					]
				
				matchCommunityTests: false
        
	}
	
	grunt.registerTask 'build', [
		'sass:dist'
		'autoprefixer'
		'coffee'
		'jade'
		'modernizr'
	]
	
	require('load-grunt-tasks') grunt # Also awesome
