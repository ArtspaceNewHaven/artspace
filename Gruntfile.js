module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-postcss');

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss', 'bower_components/motion-ui/src']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/app.css': 'scss/app.scss'
        }        
      }
    },
    postcss: {
        options: {
            map: true,
            processors: [
                require('autoprefixer')({
                    browsers: ['last 2 versions']
                })
            ]
        },
        dist: {
            src: 'css/*.css'
        }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['postcss','sass']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['postcss:dist','build','watch']);
}