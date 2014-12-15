module.exports = (grunt) ->
	
	# Sass files
	filesScss = [
		{
			expand: true
			cwd: 'scss/'
			src: ['**/*.scss']
			dest: 'css/'
			ext: '.css'
			extDot: 'first'
		}
	]
	
	# Coffee files
	filesCoffee = [
		{
			expand: true
			cwd: 'coffee/'
			src: ['**/*.coffee']
			dest: 'js/'
			ext: '.js'
			extDot: 'first'
		}
	]
	
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
					'coffee/**/*.coffee'
				]
				tasks: [
					'coffee'
				]
		
		# Sass config
		sass:
			options:
				require: [
					'sass-globbing'
					# 'susy'
				]
			debug:
				files: filesScss
				options:
					style: 'expanded'
					lineNumbers: true
			dist:
				files: filesScss
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
			dist:
				files: filesCoffee
				
		# Modernizr config
		# Awesomeness
		modernizr:
			dist:
				devFile: "bower_components/modernizr/modernizr.js"
				outputFile: "js/deps/modernizr.js"
				
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
	
	require('load-grunt-tasks') grunt # Also awesome
