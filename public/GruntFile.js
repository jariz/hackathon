module.exports = function(grunt) {
  
  grunt.initConfig({
    compass: {
      dist: {
        options: {
          config: 'config.rb',
          'output-style': 'compressed'
        }
      },
      dev: {
        options: {
          config: 'config.rb',
          'output-style': 'expanded',
          watch: true
        }
      }
    },
    requirejs: {
      compile: {
        options: {
          baseUrl: "./js/libs/",
          mainConfigFile: "js/main.js",
          name: "../main",
          out: "js/built/main.min.js",
          preserveLicenseComments: false
        }
      }
    },
    imagemin: {
      dynamic: {
        options: {
          optimizationLevel: 7
        },
        files: [{
          expand: true,
          cwd: 'images/',
          src: ['**/*.{png,jpg,gif}']
          }]
        }
      },
      clean: {
        css: ['css']
      }
  });

  // Displays the elapsed execution time of grunt tasks
  require('time-grunt')(grunt);

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-requirejs');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // Tasks
  grunt.registerTask('dev', ['clean:css','compass:dev']);

  grunt.registerTask('dist', ['clean:css','compass:dist', 'requirejs:compile', 'imagemin:dynamic']);


};