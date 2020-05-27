var gulp = require('gulp'),
    cleanCSS = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify');
sass = require('gulp-sass');

gulp.task('cssmin', function () {
    return gulp.src(['./css/**/*.css', '!./css/**/*.min.css'])
        .pipe(cleanCSS({
            keepSpecialComments: 1,
            level: 2
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('sass', function () {
    return gulp.src('./sass/**/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});

gulp.task('scripts', function () {
    return gulp.src(['./js/**/*.js', '!./js/**/*.min.js'])
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('watch', function () {
    gulp.watch(['./sass/**/*.scss'], ['sass']);
    gulp.watch(['./css/**/*.css', '!./css/**/*.min.css', '!./css/*.min.css'], ['cssmin']);
    gulp.watch(['./js/**/*.js', '!./js/**/*.min.js', '!./js/*.min.js'], ['scripts']);
});


gulp.task('styles', ['sass', 'cssmin', 'scripts']);

gulp.task('default', ['styles', 'scripts']);
