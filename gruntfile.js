/**
 * Created by CMills on 15-03-05.
 */
module.exports = function(grunt) {
    grunt.initConfig({
        //Tasks
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9']
            },
            multiple_files: {
                expand: true,
                flatten: true,
                src: "resources/assets/stylesheets/*.scss",
                dest: "resources/assets/compiled/css/"
            }
        },
        concat: {
            options: {
                separator: ';',
            },
            dist: {
                src: ['bower_components/jquery/dist/jquery.js','bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js', 'resources/assets/javascript/app.js'],
                dest: 'resources/assets/compiled/js/app.js',
            },
        },
        sass: {
            dist: {
                files: [{
                    expand: true,
                    cwd: "resources/assets/compiled/css",
                    src: "*.scss",
                    dest: "public/css",
                    ext: ".css"
                }]
            }
        },
        phpunit: {
            classes: {
                dir: 'tests/'
            },
            options: {
                bin: 'vendor/bin/phpunit',
                colors: true
            }
        },
        watch: {
            autoprefixer: {
                files: [
                    'resources/assets/stylesheets/base.scss',
                    'resources/assets/stylesheets/fonts.scss',
                    'resources/assets/stylesheets/variables.scss'
                ],
                tasks: ['autoprefixer'],
                options: {
                    livereload: true
                }

            },
            concat: {
                files: [
                    'bower_components/jquery/jquery.js',
                    'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
                    'assets/javascript/app.js'
                ],
                tasks: ['concat:js_condense'],
                options: {
                    livereload: true
                }
            },
            sass: {
                files: [
                    'resources/assets/compiled/css/base.scss',
                    'resources/assets/compiled/css/fonts.scss',
                    'resources/assets/compiled/css/variables.scss'
                ],
                tasks: ['sass'],
                options: {
                    livereload: true
                }

            },
            tests: {
                files: ['app/Http/Controllers/*.php', 'app/*.php'],
                tasks: ['phpunit']
            }
        }

    });

    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-phpunit');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['watch']);
};