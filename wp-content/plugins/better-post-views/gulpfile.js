var gulp = require('gulp'),
    cleanCSS = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify');


var css_files = [
    './css/*.css',
    '!css/*.min.css'
];

var js_files = [
    './js/*.js',
    '!js/*.min.js'
];


gulp.task('styles', function () {
    return gulp.src(css_files)
        .pipe(cleanCSS({
            keepSpecialComments: 1,
            level: 2
        }))
        .pipe(rename({suffix: '.min'}))
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

gulp.task('watch', function () {
    gulp.watch(css_files, ['styles']);
    gulp.watch(js_files, ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);
