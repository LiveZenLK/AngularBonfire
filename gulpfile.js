var gulp = require('gulp')
,   plumber = require('gulp-plumber')
,   sass = require('gulp-sass')
,   sourcemaps = require('gulp-sourcemaps')
,   prefix = require('gulp-autoprefixer')
,   concat = require('gulp-concat')
,   order = require('gulp-order')
,   karma = require('karma').server;


// Set the Bonfire theme name
var themeTemplate = 'soil'

var path = {
	template : 'public/themes/'+themeTemplate,
	assets   : 'public/bower_components',
	modules  : 'application/modules/**'
}
// set up default routing for AngularBonfire
var config = {
	// dev
	jsGlobOrder: [ // You can add your own dependancies here as you build out your app
	    path.assets  +"/angular/angular.js",
	    path.assets  +"/angular-mocks/angular-mocks.js",
	    // path.assets  +"/angular-ui/build/angular-ui.js",
	    path.assets  +"/angular-ui-router.js",
	    path.assets  +"/angular-animate/angular-animate.js",
	    path.assets  +"/ng-file-upload/ng-file-upload-all.js",
	    path.assets  +"/angular-sanitize/angular-sanitize.js",
	    path.assets  +"/jquery-simple-weather.js",
	    path.assets  +"/underscore.js",
	    path.assets  +"/angular-underscore.js",
	    path.assets  +"/marked/lib/marked.js",
	    path.assets  +"/angular-marked/angular-marked.js",
    	path.template+"/ng/angular-bonfire.js",
    	path.template+"/ng/**.js",
    	path.modules +"/ng/**.js",
	],
	sassGlobOrder: [
		path.modules +'/sass/**.*', 
		path.template+'/sass/manifest.*'
	]
}
		// './'+path.assets  +'/bootstrap-sass-official/assets/stylesheets/**.*',
// Require all tasks in gulp/tasks, including subfolders
// requireDir('gulp/tasks', { recurse: true })

// gulp.task('sass', function() {
// 	// accepts an array of paths, with a second argument being an object in which the base path is set
// 	// currently set to include all files from each module, and then add compiled manifest
// 	gulp.src(config.sassGlobOrder, {base: './'})
// 	// This give us error handling, it fixes pipes
// 	.pipe(plumber())
// 	// Sass command with argument object
// 	.pipe(sass({
// 		errLogToConsole: true}
// 	))
// 	// Automatically generates vendor prefixes
// 	.pipe(prefix('last 2 version', '> 1%', 'ie 8', 'ie 9'))
// 	.pipe(concat('angular-bonfire.css'))
// 	.pipe(gulp.dest(path.template + '/css'));
// })
// var gulp = require('gulp');

 
gulp.task('build-karma', function () {
	// we already have a glob order with all our files and deps
	var glob    = config.jsGlobOrder
	// bonfire already has jquery
	var ci_deps = [path.assets+"/jquery/dist/jquery.js"]
	// so we add it to the front of AngularBonfire deps
    glob.unshift.apply( glob, ci_deps );
    // then we add the specs from our template
    glob.push(path.template+"/ngspec/**.js")
    // then we add the specs from our modules
    glob.push(path.modules +"/ngspec/**.js")
	console.log(glob)
    // gulp.src(glob).pipe(karma({configFile: 'karma.conf.js'}))
})

gulp.task('ng-bonfire', function() {
	// accepts an array of paths, with a second argument being an object in which the base path is set
	// currently set to include all files from each module, and then add compiled manifest
	gulp.src(config.jsGlobOrder, {base: './'})
	// This give us error handling, it fixes pipes
	.pipe(plumber())
	// Stops gulp from ordering them alphabetically
	.pipe(order(config.jsGlobOrder)) //, { base: './' }))
	// Automatically generates vendor prefixes
	.pipe(concat('angular-bonfire.js'))
	// See which file errors appear
	.pipe(sourcemaps.write())
	.pipe(gulp.dest(path.template + '/js'));
})
        // .pipe(ngAnnotate())
        // .pipe(uglify())

// gulp.task('ngb-karma', function() {
// 	var glob    = config.jsGlobOrder
// 	// bonfire already has jquery
// 	var ci_deps = [path.assets+"/jquery/dist/jquery.js"]
// 	// so we add it to the front of AngularBonfire deps
//     glob.unshift.apply( glob, ci_deps );
//     // then we add the specs from our template
//     glob.push(path.template+"/ngspec/**.js")
//     // then we add the specs from our modules
//     glob.push(path.modules +"/ngspec/**.js")
// 	console.log(glob)
// 	console.log('its a start')
// 	karma.start({
//     	configFile: __dirname + '/karma.conf.js',
//     	singleRun: false,
//     	files: glob
//   	});
// })

gulp.task('watch', function() {
  // If any file changes, run the sass task
  // gulp.watch([path.modules+'/sass/**.*', path.template+'/sass/**.*'], ['sass'])
  
  // If any of the file change, run the ng-bonfire task and the karma task
  gulp.watch([path.modules+'/ng/**.*', path.template+'/ng/**.*'], ['ng-bonfire',
   // 'ngb-karma'
   ])
  
  // If any of the tests change run the karma task
  // gulp.watch([path.modules+'/ngspec/**.*', path.template+'/ngspec/**.*'], [' ngb-karma'])

})


// Creating a default task
// gulp.task('default', [
// 	// 'sass', 
// 	'ng-bonfire', 'karma', 'watch']);

// gulp.task('default' [
// 	'ng-bonfire' 
// 	]);

// // gulp.task('ng-bonfire', [
// 	// 'watch'
// 	// ]);

// gulp.task('build-karma' [
// 	'watch'

// 	])

gulp.task('default', ['ng-bonfire',
	// 'ngb-karma',
	'watch'] )

