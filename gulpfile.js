var gulp = require('gulp');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var cleanCSS = require('gulp-clean-css');
var decomment = require('gulp-decomment');

function htmlCopy(done) {
  gulp.src('./html/**/*.html')
    .on('error', console.error.bind(console))
    .pipe(decomment())
    .pipe(gulp.dest('./www/'));
  done();
}

function cssCopy(done) {
  gulp.src('./css/**/*.css')
    .pipe(sourcemaps.init())
    .on('error', console.error.bind(console))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(rename({suffix: '.min'}))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./www/css/'));
  done();
}

function watchHtmlCopy() {
  gulp.watch("./html/**/*", htmlCopy);
}

function watchCssCopy() {
  gulp.watch("./css/**/*", cssCopy);
}

gulp.task('default', gulp.parallel(watchCssCopy, watchHtmlCopy));
