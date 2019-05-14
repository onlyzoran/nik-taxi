var gulp = require('gulp');
var rename = require('gulp-rename');
// var sass = require('gulp-sass');
// var autoprefixer = require('gulp-autoprefixer');
// var sourcemaps = require('gulp-sourcemaps');

function cssCopy(done) {
  gulp.src('./css/**/*.css')
    .on('error', console.error.bind(console))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./www/css/'));
  done();
}

function watchCssCopy() {
  gulp.watch("./css/**/*", cssCopy);
}

gulp.task('default', watchCssCopy);
