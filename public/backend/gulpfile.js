/* ------------------------------------------------------------------------------
 *
 *  # Gulp file
 *
 *  Gulp tasks for Limitless template
 *
 *  Includes following tasks:
 *  # gulp lint - lints core JS files, excluding libraries
 *  # gulp sass - compiles SCSS files. Depends on variables defined below
 *  # gulp watch - watches for changes in all SCSS files and automatically recompiles them
 *  # gulp default - runs default set of tasks. Configurable by user
 *  # gulp icons - compiles icon set
 *  # gulp ckeditor - compiles ckeditor
 *
 * ---------------------------------------------------------------------------- */


// Configuration
// ------------------------------

// Define variables
const layout = 'layout_1',      // 'layout_1', 'layout_2', 'layout_3', 'layout_4', 'layout_5'
    theme = 'default',          // 'default', 'material' or 'dark'
    direction = 'LTR',          // 'LTR' or 'RTL'
    type = 'full',              // 'full' or 'seed'
    iconset = 'icomoon';        // 'icomoon' (default), 'fontawesome', 'material'

// Define plugins
const { src, dest, watch, series } = require('gulp'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    jshint = require('gulp-jshint'),
    compileSass = require('gulp-sass'),
    minifyCss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    rtlcss = require('gulp-rtlcss');


// Setup tasks
// ------------------------------

// Lint
function lint() {
    return src(layout + '/' + direction + '/' + theme + '/' + type + '/assets/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
}


//
// SCSS compilation
//

// Autoprefixer config
const processors = [
    autoprefixer({
        overrideBrowserslist: [
            '>= 1%',
            'last 1 major version',
            'Chrome >= 45',
            'Firefox >= 38',
            'Edge >= 12',
            'Explorer >= 10',
            'iOS >= 9',
            'Safari >= 9',
            'Android >= 4.4',
            'Opera >= 30'
        ],
        map: false
    })
];

// Make it dynamic by changing core variables. Sensitive to location: make sure
// the paths are correct if you need to use a custom assets location
function sass() {
    if(direction == 'LTR') {
        return src('global_assets/scss/layouts/' + layout + '/' + theme + '/compile/*.scss')
            .pipe(compileSass())
            .pipe(postcss(processors))
            .pipe(dest(layout + '/' + direction + '/' + theme + '/' + type + '/assets/css'))
            .pipe(minifyCss({
                level: {1: {specialComments: 0}}
            }))
            .pipe(rename({
                suffix: ".min"
            }))
            .pipe(dest(layout + '/' + direction + '/' + theme + '/' + type + '/assets/css'));
    }
    else {
        return src('global_assets/scss/layouts/' + layout + '/' + theme + '/compile/*.scss')
            .pipe(compileSass())
            .pipe(postcss(processors))
            .pipe(dest(layout + '/' + direction + '/' + theme + '/' + type + '/assets/css'))
            .pipe(rtlcss())
            .pipe(dest(layout + '/' + direction + '/' + theme + '/' + type + '/assets/css'))
            .pipe(minifyCss({
                level: {1: {specialComments: 0}}
            }))
            .pipe(rename({
                suffix: ".min"
            }))
            .pipe(dest(layout + '/' + direction + '/' + theme + '/' + type + '/assets/css'));
    }
}

// Icons
function icons() {
    return src('global_assets/scss/shared/icons/' + iconset + '/compile/*.scss')
        .pipe(compileSass())
        .pipe(postcss(processors))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(dest('global_assets/css/icons/' + iconset));
}

// CKEditor
function ckeditor() {
    if (direction == 'LTR') {
        return src('global_assets/scss/layouts/' + layout + '/' + theme + '/compile/ckeditor/*.scss')
            .pipe(compileSass())
            .pipe(postcss(processors))
            .pipe(minifyCss({
                level: { 1: { specialComments: 0 } }
            }))
            .pipe(dest('global_assets/js/plugins/editors/ckeditor/skins/' + theme + '/'));
    }
    else {
        return src('global_assets/scss/layouts/' + layout + '/' + theme + '/compile/ckeditor/*.scss')
            .pipe(compileSass())
            .pipe(postcss(processors))
            .pipe(rtlcss())
            .pipe(minifyCss({
                level: { 1: { specialComments: 0 } }
            }))
            .pipe(dest('global_assets/js/plugins/editors/ckeditor/skins/' + theme + '_' + direction.toLowerCase() + '/'));
    }
}


//
// Watch files for changes
//

function watchFiles() {
    return watch('global_assets/scss/**/*.scss', series(sass));
}


//
// Default task
//

exports.default = series(lint, sass, watchFiles);


//
// Register tasks
//

exports.lint = lint;
exports.watch = watchFiles;
exports.sass = sass;
exports.icons = icons;
exports.ckeditor = ckeditor;
