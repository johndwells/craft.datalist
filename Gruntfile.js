module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

        watch: {
			uglify: {
		        files: ['./datalist/resources/js/*.js'],
		        tasks: ['uglify']
			},
        }
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

    // Default Task
    grunt.registerTask('default', ['uglify']);
}