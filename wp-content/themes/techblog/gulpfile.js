var gulp = require('gulp');
var notify = require("gulp-notify");
var plumber = require("gulp-plumber");
var pug = require('gulp-pug');
var browserSync = require("browser-sync");

//setting : paths
var paths = {
  'pug': './src/pug/',
  'html': '.',
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
    .pipe(rename({
      extname: '.php'
    }))
    .pipe(gulp.dest(paths.html));
});

//Browser Sync
gulp.task('browser-sync', () => {
  browserSync({
    server: {
      baseDir: paths.html,
      index: "index.php"

    }
  });
});
gulp.task('reload', () => {
  browserSync.reload();
});

//watch
gulp.task('watch', function () {
  gulp.watch([paths.pug + '**/*.pug', '!' + paths.pug + '**/_*.pug'],['pug', 'reload']);
});

gulp.task('default', ['watch','browser-sync']);
