/// <binding />
module.exports = function (grunt) {

    "use strict";

    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        template_path: 'templates/ta2ta/',

        uglify: {
            vendors: {
                options: {
                    sourceMap: true
                },
                files: {
                    'js/build/vendors.min.js': ['js/vendors/jquery-2.2.4.min.js', 'js/vendors/modernizr-3.4.0.min.js', 'js/vendors/bootstrap.min.js', 'js/vendors/picturefill-3.0.2.min.js', 'js/vendors/svgxuse.js']
                }
            },
            main: {
                options: {
                    sourceMap: true
                },
                files: {
                    'js/build/main.min.js': ['js/main.js', 'js/bootstrapHelper.js', 'js/validation.js']
                }
            }
        },

        // SASS
        sass: {
            options: {
                outputStyle: 'compressed',
                sourceMap: true
            },
            build: {
                files: {
                    'stylesheets/css/styles.min.css': 'stylesheets/scss/styles.scss'
                }
            }

        },

        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')({ browsers: 'last 4 versions' }), // add vendor prefixes
                    require('cssnano')() // minify the result
                ]
            },
            build: {
                src: 'stylesheets/css/styles.min.css'
            }
        },

        // Convert px units to rem
        px_to_rem: {
            main: {
                options: {
                    base: 16,
                    fallback: false,
                    fallback_existing_rem: true,
                    ignore: ['border', 'border-top', 'border-right', 'border-bottom', 'border-left', 'hr', 'box-shadow', 'background'],
                    map: true
                },
                files: {
                    'stylesheets/css/styles.min.css': 'stylesheets/css/styles.min.css'
                }
            }
        },


        watch: {
            grunt: {
                files: ['gruntfile.js']
            },
            sass: {
                files: ['stylesheets/scss/**/*.scss', 'stylesheets/scss/*.scss'],
                tasks: ['buildcss']
            },
            main_js: {
                files: ['js/*.js'],
                tasks: ['uglify:main']
            }
        }

    });

    grunt.registerTask('default', []);
    grunt.registerTask('buildcss', ['sass', 'postcss', 'px_to_rem']);

};