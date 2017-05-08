module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
           css: {
                src: [
                    'css/theme.css',
                    'css/shop-customs.css',
                    'css/yith-ywraq-customs.css',
                    'css/jquery.cookiebar.css'// All CSS in the CSS folder
                ],
                    dest: 'style.css',
                },
            js: {
                src: [
                    'js/cookie-bar.js',
                    'js/wonder-bar.js'
                ],
                    dest: 'js/concat-js.js'
            }
            },

        cssmin: {
          minify: {
            src: 'style.css',
            dest: 'style.min.css'
          }
        },

        uglify: {
            build: {
                src: 'js/concat-js.js',
                dest: 'js/js.min.js'
            }
        },

        watch: {
            js: {
                files: ['js/wonder-bar.js', 'js/cookie-bar.js'],
                tasks: ['concat:js', 'uglify'],
                options: {
                    spawn: false,
                },
            },

            css: {
                files: ['css/*.css'],
                tasks: ['concat:css', 'cssmin'],
                options: {
                    spawn: false,
                },
            }
        },

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'images/build/'
                }]
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');


    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['watch']);

};