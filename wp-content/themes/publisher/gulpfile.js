var gulp = require('gulp'),
    cleanCSS = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass');


var css_files = [
    './style.css',
    './rtl.css',
    './gutenberg.css',
    './css/*.css',
    '!./css/*.min.css',
    './includes/styles/**/*.css',
    '!./includes/styles/**/*.min.css'
];

var styles_sass_files = [
    './includes/styles/**/*.scss'
];

var main_sass_file = [
    './css/sass/*.scss'
];

var js_files = [
    './js/*.js',
    '!js/**/*.min.js'
];

var version = '7.6.2';

gulp.task('styles', ['styles-sass'], function () {
    return gulp.src(css_files)
        .pipe(cleanCSS({
            specialComments: 1,
            level: 1,
            rebase: false
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('main-style', function () {
    return gulp.src(['./style.css'])
        .pipe(cleanCSS({
            specialComments: 1,
            level: 1,
            rebase: false
        }))
        .pipe(rename({suffix: '-' + version + '.min'}))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('scripts', function () {
    return gulp.src(js_files)
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('styles-sass', function () {
    return gulp.src(styles_sass_files)
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('main-sass', function () {
    return gulp.src(main_sass_file)
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest('./'));
});

gulp.task('watch-sass', function () {
    gulp.watch(styles_sass_files, ['styles-sass']);
});

gulp.task('ws', function () {
    gulp.watch(styles_sass_files, ['styles-sass']);
});

gulp.task('watch', function () {
    gulp.watch(styles_sass_files, ['styles-sass']);
    gulp.watch(css_files, ['styles']);
    gulp.watch(js_files, ['scripts']);
});

gulp.task('default', ['styles', 'main-style', 'scripts', 'styles-sass', 'main-sass']);
