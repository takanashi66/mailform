var rootpath			= 'htdocs/';
var cmnpath				= rootpath + 'common/';

var gulp 					= require('gulp');
var sass 					= require('gulp-sass');
var browserSync 	= require('browser-sync').create();
var autoprefixer	= require('gulp-autoprefixer');
var sourcemaps 		= require('gulp-sourcemaps');
var plumber 			= require('gulp-plumber');
var mmq 					= require('gulp-merge-media-queries');
var notify 				= require('gulp-notify');
var uglify				= require('gulp-uglify');
var concat        = require("gulp-concat");
var pug           = require('gulp-pug');
var babel         = require('gulp-babel');



gulp.task('browser-sync', function() {
	browserSync.init({
/*
		server: {
			baseDir: rootpath
		}
*/
		proxy: "http://localhost/mail/htdocs/"
	});
});

gulp.task("browser-reload", function() {
  browserSync.reload();
});

gulp.task('pug', function(){
  gulp.src(rootpath + 'pug/*.pug')
  .pipe(plumber({
    errorHandler: notify.onError('Error: <%= error.message %>')
  }))
  .pipe(pug({
    pretty: true
  }))
  .pipe(gulp.dest(rootpath))
  .pipe(browserSync.stream());
})

gulp.task('sass', function(){
	gulp.src(cmnpath + 'sass/*.scss')
	.pipe(sourcemaps.init())
	.pipe(plumber({
		errorHandler: notify.onError('Error: <%= error.message %>')
	}))
	.pipe(sass({outputStyle: 'compressed'}))
	.pipe(autoprefixer({
		browsers: [
			'last 2 versions'
		],
		cascade: false
	}))
	.pipe(mmq())
	.pipe(sourcemaps.write('../map'))
	.pipe(gulp.dest(cmnpath + 'css'))
	.pipe(browserSync.stream());
});

gulp.task('babel', function() {
  gulp.src(cmnpath + 'js/es/**/*.js')
  .pipe(plumber({
    errorHandler: notify.onError('Error: <%= error.message %>')
  }))
  .pipe(babel({
    presets: ['es2015']
  }))
  .pipe(concat('script.js'))
  .pipe(uglify())
  .pipe(gulp.dest(cmnpath + 'js/'))
  .pipe(browserSync.stream());
});


gulp.task('watch', function(){
	gulp.watch(cmnpath + 'sass/**/*.scss',{ cwd: './' },['sass']);
  gulp.watch(rootpath + 'pug/**/*.pug',{ cwd: './' },['pug']);
	gulp.watch(cmnpath + 'js/es/**/*.js',{ cwd: './' },['babel']);
	gulp.watch(
		[
  		rootpath	+	'**/*.html',
			rootpath	+	'**/*.php'
		],{ cwd: './' },
		['browser-reload']);
});


gulp.task('default', ['browser-sync','watch']);
