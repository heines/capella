var gulp = require('gulp');
var notify = require("gulp-notify");
var plumber = require("gulp-plumber");
var pug = require('gulp-pug');
var browserSync = require("browser-sync");
var rename = require('gulp-rename');
var sass = require('gulp-sass');

//setting : paths
var paths = {
  'pug': './src/pug/',
  'html': './src/dest/',
  'sass': './src/scss/',
  'css': './src/dest/css/'
}

//setting : Pug Options
var pugOptions = {
  pretty: true
}

//Pug
gulp.task('pug', () => {
  return gulp.src([paths.pug + '**/*.pug', '!' + paths.pug + '**/_*.pug'])
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(pug(pugOptions))
    .pipe(gulp.dest(paths.html));
});

gulp.task('sass', () => {
  return gulp.src([paths.sass + '**/*.scss', '!' + paths.sass + '**/_*.scss'])
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(gulp.dest(paths.css));
});

//Browser Sync
gulp.task('browser-sync', () => {
  browserSync({
    server: {
      baseDir: paths.html,
      index: "front-page.html"
    }
  });
  gulp.watch(paths.html + "**/*.html", ['reload']);
  gulp.watch(paths.css + "**/*.css", ['reload']);
});
gulp.task('reload', () => {
  browserSync.reload();
});

//watch
gulp.task('watch', function () {
  gulp.watch([paths.sass + '**/*.scss', '!' + paths.sass + '**/_*.scss'],['sass']);
  gulp.watch([paths.pug + '**/*.pug', '!' + paths.pug + '**/_*.pug'],['pug', 'reload']);
});

gulp.task('default', ['watch','browser-sync']);
