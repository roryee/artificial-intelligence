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
			dist:
				files: [
					'scss/**/*.scss'
					'coffee/**/*.coffee'
				]
				tasks: [
					'sass:dist'
					'autoprefixer'
					'coffee'
				]
				
			debug:
				files: [
					'scss/**/*.scss'
					'coffee/**/*.coffee'
				]
				tasks: [
					'sass:debug'
					'autoprefixer'
					'coffee'
				]
		
		# Sass config
		sass:
			options:
				require: [
					'sass-globbing'
					'susy'
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
						'ie 9' # screw IE8
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
						"js/**/*.js"
						"scss/**/*.scss"
					]
				
				matchCommunityTests: false
        
	}
	
	require('load-grunt-tasks') grunt # Also awesome
