var gulp = require('gulp'),
    cleanCSS = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    insert = require('gulp-insert');

gulp.task('cssmin', function () {
    return gulp.src(['./assets/css/**/*.css', '!./assets/css/**/*.min.css'])
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
    return gulp.src(['./assets/js/**/*.js', '!./assets/js/**/*.min.js', '!./assets/js/admin-wpep.js'])
        .pipe(concat('admin-wpep.js'))
        .pipe(insert.transform(function (contents, file) {

            return "jQuery(document).ready(function($) { \n" + contents + "\n});";
        }))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }))
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('watch', function () {
    gulp.watch(['./css/**/*.css', '!./css/**/*.min.css', '!./css/*.min.css'], ['cssmin']);
    gulp.watch(['./js/**/*.js', '!./js/**/*.min.js', '!./js/*.min.js'], ['scripts']);
});


gulp.task('styles', ['cssmin', 'scripts']);
gulp.task('default', ['styles', 'scripts']);
