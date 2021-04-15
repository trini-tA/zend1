module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          sourcemap: false,
          compress: false,
          yuicompress: false,
          style: 'expanded',
        },
        files: {
          'public/css/global.css' : 'styles/frontend/sass/app.scss',
        }
      },
    },
    uglify: {
        // Begin JS Uglify Plugin
        build: {
            src: ['styles/frontend/js/app.js'],
            dest: 'public/js/app.js',
        },
    },
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['sass']
      },
      js: {
        files: '**/*.js',
        tasks: ['uglify'],
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  //grunt.loadNpmTasks('grunt-postcss')
  grunt.loadNpmTasks('grunt-contrib-cssmin')
  grunt.loadNpmTasks('grunt-contrib-uglify')

  grunt.registerTask('default',['watch']);
}