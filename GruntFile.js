//Gruntfile

module.exports = function (grunt) {
    'use strict';

    require('load-grunt-tasks')(grunt);
    //Initializing the configuration object
    grunt.initConfig({
        //Task configuration
        shell: {
            updateVendors: {
                command: 'bower install; bower prune; npm install; composer install'
            }
        },
        //CSS
        less: {
            development: {
                options: {
                    compress: true
                },
                files: {
                    "./assets/stylesheets/compiled.less.css": [
                        "./src/*/Views/Styles/*.less"
                    ]
                }
            }
        },
        cssmin: {
            combine: {
                files: {
                    './web/styles.min.css': [
                        './assets/bower_components/_bower.css',
                        './assets/Styles/compiled.less.css'
                    ]
                }
            }
        },
        //JS
        jshint: {
            options: {
                browser: true,
                globals: {
                    jQuery: true
                }
            },
            all: ['./src/*/Views/Scripts/*.js']
        },
        uglify: {
            dev: {
                files: {
                    './web/scripts.js': [
                        './src/*/Views/Scripts/*.js'
                    ]
                },
                options: {
                    mangle: false,
                    compress: false,
                    sourceMap: true
                }
            },
            prod: {
                files: {
                    './web/scripts.min.js': [
                        './assets/bower_components/_bower.js',
                        './src/*/Views/Scripts/*.js'
                    ]
                },
                options: {
                    mangle: false,
                    compress: false,
                    sourceMap: false
                }
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: ['./assets/bower_components/_bower.js', './web/scripts.js'],
                dest: './web/scripts.min.js'
            }
        },
        bower_concat: {
            all: {
                dest: './assets/bower_components/_bower.js',
                cssDest: './assets/bower_components/_bower.css',
                bowerOptions: {
                    relative: false
                }
            }
        },
        watch: {
            js: {
                files: ['./src/*/Views/Scripts/*.js'],
                tasks : [
                    'uglify:dev',
                    'concat',
                    'jshint'
                ]
            },
            less: {
                files: ['./src/*/Views/Styles/*.less'],
                tasks: [
                    'less',
                    'cssmin'
                ]
            }
        },
        notify_hooks: {
            options: {
                enabled: true,
                max_jshint_notifications: 5, // maximum number of notifications from jshint output
                success: true, // whether successful grunt executions should be notified automatically
                duration: 0.5 // the duration of notification in seconds, for `notify-send only (PICOLLECTA:: we aren't using this)
            }
        }

    });
    grunt.registerTask('default', [
        'build',
        'watch'
    ]);

    grunt.registerTask('build', [
        'shell:updateVendors',
        'bower_concat',
        'uglify:dev',
        'concat',
        'less',
        'cssmin'
    ]);

    grunt.registerTask('deploy', [
        'shell:updateVendors',
        'bower_concat',
        'uglify:dev',
        'uglify:prod',
        'less',
        'cssmin'
    ]);

};

