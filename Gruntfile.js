module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['src/**/*.js'],
        dest: 'dist/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dist: {
        files: {
          'dist/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
        }
      }
    },
    qunit: {
      files: ['test/**/*.html']
    },
    jshint: {
      files: ['Gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
      options: {
        // options here to override JSHint defaults
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },
    sass: {                              // Task
      dist: {                            // Target
          src: '*.scss',
          dest:'style.css',
	     },
      },
      css: {
	src:'*.css',
	
      },
      watch: {
	sass:{
		files:['*.scss', '*.php'],
		tasks: ['sass'],
		options:{
		livereload: true
		}
	},
	css:{
		files: ['*.css'],
		options:{
		livereload: true	
		},
//		files: ['*.css', '*.php'],
//		tasks: ['sass'],
//		options: {
//		livereload: true
//		}
	},
      files: ['<%= jshint.files %>', '*.php'],
      tasks: ['jshint']
    },
    livereload:{
	options: {
		livereload:true
	},
	files:['/wp-content/themes/3sol/*.php','/wp-content/themes/3sol/*.css'],
    }
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');

  grunt.registerTask('test', ['jshint', 'sass', 'uglify']);

  grunt.registerTask('default', ['jshint', 'watch', 'uglify']);
  grunt.registerTask('build', ['uglify']);

};
