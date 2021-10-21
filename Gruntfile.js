module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
         build: {
         options: {
	        compress: {
		        drop_console: false
		      },
	        beautify: false,
	        mangle: true
	      },
         	files: {
         		'js/plugins.min.js': ['js/plugins/*'],
         		'js/site.min.js': ['js/site.js']
         	}
	      }
		},

		watch: {
			options: {
		        livereload: true,
		    },
		    scripts: {
		        files: ['js/*.js'],
		        tasks: ['uglify'],
		        options: {
		            spawn: false,
		        },
		    },
		    css: {
			    files: ['scss/**/*.scss'],
			    tasks: ['sass'],
			    options: {
			        spawn: false,
			    },
			},
		},

		sass: {
		    dist: {
		        options: {
		            //style: 'expanded'
		            style: 'compressed'
		        },
		        files: {
		        'css/main.css': 'scss/main.scss'
		      }
		    }
		}

    });

    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('deploy', ['sass', 'uglify']);

    grunt.registerTask('default', ['sass', 'uglify','watch']);

};
