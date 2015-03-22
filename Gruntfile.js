//Gruntfile
module.exports = function (grunt) {

    var config = {
        bower: grunt.file.readJSON('.bowerrc'),
        resources: './src/VirtualniNemocnice/AppBundle/Resources/public',
        dist: './src/VirtualniNemocnice/AppBundle/Resources/public'
    };
    //Initializing the configuration object
    grunt.initConfig({
        config: config,
        pkg: grunt.file.readJSON('package.json'),
        // Task configuration
        concat: {
            options: {
                separator: ';'
            },
            js_app: {
                src: [
                    '<%= config.bower.directory %>/bootstrap/dist/js/bootstrap.js',
                    '<%= config.resources %>/js/base.js'
                ],
                dest: './src/VirtualniNemocnice/AppBundle/Resources/public/js/base.js'
            }
        },
        less: {
            options: {
                paths: ['<%= config.bower.directory %>']
            },
            app: {
                files: {
                    '<%= config.dist %>/css/style.css': "<%= config.dist %>/less/style.less"
                }
            }
        },
        uglify: {
            options: {
                mangle: false  // Use if you want the names of your functions and variables unchanged
            },
            app: {
                files: {
                    '<%= config.dist %>/js/base.js': '<% config.resources %>/js/base.js'
                }
            }
        },
        watch: {
            js_app: {
                files: [
                    //watched files
                    './src/VirtualniNemocnice/AppBundle/Resources/public/js/*.js'
                ],
                tasks: ['concat:js_app'],     //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            },
            template: {
                files: [
                    //watched files
                    './src/**/*.twig'
                ],
                tasks: ['shell:clearTwigCache'],
                options: {
                    livereload: true                        //reloads the browser
                }
            },
            less: {
                files: ['./src/VirtualniNemocnice/AppBundle/Resources/public/less/**'],  //watched files
                tasks: ['less'],                          //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            },
            resourceDump: {
                files: ['./src/VirtualniNemocnice/AppBundle/Resources/**/*.*'],  //watched files
                tasks: ['shell:assetsDump'],                          //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            }
        },
        shell: {
            serverRun: {
                options: {
                    stdout: true
                },
                command: 'php app/console server:run'
            },
            npmInstall: {
                options: {
                    stdout: true
                },
                command: 'npm install --loglevel warn'
            },
            npmUpdate: {
                options: {
                    stdout: true
                },
                command: 'npm update --loglevel warn'
            },
            bowerUpdate: {
                options: {
//                    stdout: true
                },
                command: 'bower update'
            },
            composerUpdate: {
                options: {
                    stdout: true
                },
                command: 'composer update'
            },
            composerSelfUpdate: {
                options: {
                    stdout: true
                },
                command: 'composer self-update'
            },
            assetsDump: {
                options: {
                    stdout: true
                },
                command: 'php app/console assetic:dump'
            },
            clearTwigCache: {
                options: {
                    stdout: true
                },
                command: 'rm -rf app/cache/dev/twig'
            }
        },
        concurrent: {
            target: {
                tasks: ['shell:serverRun', 'watch'],
                options: {
                    logConcurrentOutput: true
                }
            },
            update: {
                tasks: ['shell:npmUpdate', 'shell:bowerUpdate', 'shell:composerUpdate'],
                options: {
                    logConcurrentOutput: true
                }
            }
        }


    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-concurrent');

    // Task definition
    grunt.registerTask('init', ['less', 'concat']);
    grunt.registerTask('heroku', ['less', 'concat']);
    grunt.registerTask('default', ['shell:npmInstall', 'concurrent:target']);
    grunt.registerTask('update', ['shell:composerSelfUpdate', 'concurrent:update']);

};
