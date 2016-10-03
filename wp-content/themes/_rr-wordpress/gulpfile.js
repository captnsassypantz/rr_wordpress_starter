// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var livereload = require('gulp-livereload');

// Lint Task
gulp.task('lint', function() {
	return gulp.src('_assets/scripts/scripts/theme-custom.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function() {
	gulp.src('_assets/styles/brandco.scss')
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(sass({errLogToConsole: true}))
		.pipe(autoprefixer())
		.pipe(minifyCSS({keepBreaks:false}))
		.pipe(rename('_assets/styles/brandco.min.css'))
		.pipe(gulp.dest('.'))
		.pipe(livereload());
});

// Compile Our Sass
gulp.task('headerfootercss', function() {
	gulp.src('_assets/styles/headerfooter.scss')
		.pipe(autoprefixer())
		.pipe(minifyCSS({keepBreaks:false}))
		.pipe(rename('_assets/styles/header-footer.min.css'))
		.pipe(gulp.dest('.'))
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
	return gulp.src('_assets/scripts/scripts/*.js')
		.pipe(concat('all-scripts.js'))
		.pipe(gulp.dest('_assets/scripts'))
		.pipe(rename('brandco.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('_assets/scripts'));
});

// Watch Files For Changes
gulp.task('watch', function() {
	var server = livereload();
	gulp.watch('_assets/scripts/scripts/theme-custom.js', ['lint', 'scripts']);
	gulp.watch('_assets/styles/**/*.scss', ['sass']);
	gulp.watch('_assets/styles/**/*.scss', ['headerfootercss']);
	gulp.watch('**/*.php').on('change', function(file) {
		livereload.changed(file.path);
	});
	livereload.listen();
});

// Default Task
gulp.task('default', ['lint', 'sass', 'headerfootercss', 'scripts', 'watch']);

// var gulp = require('gulp');
// var sass = require('gulp-sass');
// var autoprefixer = require('gulp-autoprefixer');
// var sourcemaps = require('gulp-sourcemaps');
// var inject = require('gulp-inject'); //Inject our files
// var wiredep = require('wiredep').stream; //To watch for file injections
// var browserSync = require('browser-sync').create();
// var imagemin = require('gulp-imagemin'); //Optimize our images
// var cache = require('gulp-cache'); //Cache optimzed images
//
// var bowerFiles = require('main-bower-files');
//
// var config = {
//     sassPath: './src/styles',
//     bowerDir: './bower_components' 
// }
//
//
// gulp.task('sass', function(){
//
//   var injectAppFiles = gulp.src('src/styles/scss/*.scss', {read: false});
//
//   function transformFilepath(filepath) {
//     return '@import "' + filepath + '";';
//   }
//
//   var injectAppOptions = {
//     transform: transformFilepath,
//     starttag: '// inject:app',
//     endtag: '// endinject',
//     addRootSlash: false
//   };
//
//   return gulp.src('src/styles/main.scss')
//     .pipe(wiredep())
//     .pipe(autoprefixer())
//     //return gulp.src('src/styles/scss/*.scss') //Globbing sass files
//     .pipe(inject(injectAppFiles, injectAppOptions))
//     .pipe(sass())
//     .pipe(sourcemaps.write())
//     .pipe(gulp.dest('src'))
//     .pipe(browserSync.stream());
// });
//
// gulp.task('fonts', function() { 
//     return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*') 
//         .pipe(gulp.dest('src/fonts/')); 
// });
//
// gulp.task('images', function(){
//   return gulp.src('src/imgs/*.+(png|jpg|gif|svg)')
//   .pipe(cache(imagemin()))
//   .pipe(gulp.dest('src/imgs'))
// });
//
// gulp.task('js', function(){
//
// });
//
// gulp.task('wiredep', function () {
//   gulp.src('index.html')
//     .pipe(wiredep())
//     .pipe(gulp.dest(''));
// });
//
// gulp.task('inject', ['sass'], function(){
//   var sources = gulp.src(['src/main.css', 'src/main.js'], {read: false});
//   var target = gulp.src('index.html');
//
//   //Remove the leading slash
//   var injectOptions = {
//     addRootSlash: false,
//     // ignorePath: ['src', 'dist']
//   };
//
//   // return gulp.src('src/index.html')
//   // .pipe(inject(sources, injectOptions))
//   return target.pipe(inject(sources, injectOptions))
//   // .pipe(inject(sources))
//   .pipe(gulp.dest(''))
// });
//
// // Static Server + watching scss/html files
// gulp.task('serve', ['inject'], function() {
//
//     browserSync.init({
//         //proxy: "index.html"
//         server: {
//             baseDir: "./"
//             // baseDir: "dist"
//         }
//     });
//
//     gulp.watch('src/styles/scss/*.scss', ['sass']);
//     gulp.watch('src/js/main.js', ['js']);
//     gulp.watch('index.html', ['inject']);
//     gulp.watch("*.html").on('change', browserSync.reload);
// });
//
// // Default Task
// gulp.task('default', ['serve']);
