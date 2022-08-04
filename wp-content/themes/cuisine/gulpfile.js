const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
//const plumber = require('gulp-plumber');
const browserSync = require('browser-sync').create();

// Compilation SCSS
gulp.task('styles', () => {
    return gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('css'))
        .pipe(browserSync.stream());
});

// Ecoute sur les fichiers SCSS
gulp.task('watch', () => {
    gulp.watch('sass/**/*.scss', (done) => {
        gulp.series('clean', 'styles')(done);
    });
});

// Clean des fichiers
gulp.task('clean', () => {
    return del([
        'css/**/*.css',
    ]);
});

// Hot reload
gulp.task('sync', () => {
    browserSync.init({
        proxy: "http://cuisine.local",
        open: false,
      });

    gulp.watch("sass/**/*.scss", gulp.series('styles'));
    gulp.watch("**/*.php").on('change', browserSync.reload);
    gulp.watch("js/**/*.js").on('change', browserSync.reload);
});

gulp.task('svg', function() {
    return gulp.src('./images/*.svg')
    //.pipe(plumber())
    .pipe(sprite({
        mode: {
            symbol: {
                dest: './',
                sprite: 'sprite.svg'
            }
        }
    }))
    .pipe(gulp.dest('./images'));
});

// Tâche par défaut
gulp.task('default', gulp.series('styles', 'sync'));
