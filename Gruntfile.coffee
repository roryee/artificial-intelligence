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
					style: 'compressed'
		autoprefixer:
			compile:
				src: 'app/assets/css/*.css'
				options:
					map: true
		coffee:
			compile:
				files: [
					{
						expand: true
						cwd: 'app/assets/'
						src: 'coffee/**/*.coffee'
						dest: 'js/'
						ext: '.js'
						extDot: 'first'
					}
				]
	}
	
	require('load-grunt-tasks') grunt
