'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    haml: {
      compile: {
        files: [{
          expand: true,
          src: ['assets/haml/*.haml'],
          dest: 'templates/',
          ext: '.php'
        }]
      }
    },
    compass: {
      dist: {
        options: {
          sassDir: 'assets/sass',
          cssDir: 'assets/css',
          imagesPath: 'assets/img',
          environment: 'production',
          relativeAssets: true
        }
      },
      debug: {
        options: {
          environment: 'development',
          debugInfo: true,
          noLineComments: false,
          sassDir: 'assets/sass',
          cssDir: 'assets/css',
          imagesDir: 'assets/img',
          outputStyle: 'expanded',
          relativeAssets: true
        }
      }
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    imagemin: {
      dist: {
        options: {
          optimizationLevel: 7,
          progressive: true
        },
        files: [{
            expand: true,
            cwd: 'assets/img/',
            src: '**/*',
            dest: 'assets/img/'
          }]
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            'assets/js/plugins/bootstrap/transition.js',
            'assets/js/plugins/bootstrap/button.js',
            'assets/js/plugins/bootstrap/affix.js',
            'assets/js/plugins/bootstrap/modal.js',
            'assets/js/plugins/bootstrap/bootbox.js',
            'assets/js/vendor/flowtype-1.1.js',
            'assets/js/vendor/jquery.backstretch.js',
            'assets/js/_*.js'
          ]
        }
      }
    },
    version: {
      options: {
        file: 'lib/scripts.php',
        css: 'assets/css/app.css',
        cssHandle: 'roots_main',
        js: 'assets/js/scripts.min.js',
        jsHandle: 'roots_scripts'
      }
    },
    watch: {
      haml: {
        files: ['assets/haml/*.haml'],
        tasks: ['haml']
      },
      compass: {
        files: [
          'assets/sass/*.scss',
          'assets/sass/bootstrap/*.scss'
        ],
        tasks: ['compass:debug']
      },
      coffee: {
        options: {
          sourceMap: true,
          join: true
		},
        files: 'assets/coffee/*.coffee',
        tasks: ['coffee']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify', 'version']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/app.css',
          'assets/js/scripts.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'assets/css/app.css',
        'assets/js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-haml-php');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-wp-version');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'compass',
    'haml',
    'uglify',
    'version'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
