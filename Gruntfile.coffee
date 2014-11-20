module.exports = (grunt) ->
	
	grunt.initConfig {
		pkg: grunt.file.readJSON 'package.json'
		watch:
			styles:
				files: 'app/assets/scss/**/*.scss'
				tasks: ['sass', 'autoprefixer']
			scripts:
				files: 'app/assets/coffee/**/*.coffee'
				tasks: ['coffee']
		sass:
			compile:
				files: [
					{
						expand: true
						cwd: 'app/assets/scss/'
						src: ['**/*.scss']
						dest: 'app/assets/css/'
						ext: '.css'
						extDot: 'first'
					}
				]
				options:
					style: 'expanded'
		autoprefixer:
			compile:
				src: 'app/assets/css/*.css'
				options:
					map: true
					browsers: [
						'last 2 versions'
						'> 3%'
						'ie 9'
						'firefox esr'
					]
		coffee:
			compile:
				files: [
					{
						expand: true
						cwd: 'app/assets/coffee/'
						src: ['**/*.coffee']
						dest: 'app/assets/js/'
						ext: '.js'
						extDot: 'first'
					}
				]
		modernizr:
			build:
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
	
	require('load-grunt-tasks') grunt
