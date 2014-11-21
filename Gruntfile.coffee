module.exports = (grunt) ->
	
	# Sass files
	filesScss = [
		{
			expand: true
			cwd: 'app/assets/scss/'
			src: ['**/*.scss']
			dest: 'app/assets/css/'
			ext: '.css'
			extDot: 'first'
		}
	]
	
	# Coffee files
	filesCoffee = [
		{
			expand: true
			cwd: 'app/assets/coffee/'
			src: ['**/*.coffee']
			dest: 'app/assets/js/'
			ext: '.js'
			extDot: 'first'
		}
	]
	
	grunt.initConfig {
		pkg: grunt.file.readJSON 'package.json'
		
		# Watch config
		watch:
			styles:
				files: 'app/assets/scss/**/*.scss'
				tasks: ['sass', 'autoprefixer']
			scripts:
				files: 'app/assets/coffee/**/*.coffee'
				tasks: ['coffee']
		
		# Sass config
		sass:
			files: filesScss
			debug:
				options:
					style: 'expanded'
					lineNumbers: true
			dist:
				options:
					style: 'compressed'
					
		# Autoprefixer config
		autoprefixer:
			dist:
				src: 'app/assets/css/*.css'
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
				outputFile: "app/assets/js/deps/modernizr.js"
				
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
						"app/assets/js/**/*.js"
						"app/assets/scss/**/*.scss"
					]
				
				matchCommunityTests: false
        
	}
	
	require('load-grunt-tasks') grunt # Also awesome
