var gulp = require('gulp'),
  sass = require('gulp-sass'),
	groupConcat = require('gulp-group-concat'),
  concat = require('gulp-concat'),
  debug = require('gulp-debug'),
  bowerMain = require('main-bower-files'),
	uglify = require('gulp-uglify'),
	minify = require('gulp-clean-css'),
	filter = require('gulp-filter'),
  flatten = require('gulp-flatten'),
  autoprefix = require('gulp-autoprefixer'),
  sourcemaps = require('gulp-sourcemaps'),
	rename = require('gulp-rename'),
  imagemin = require('gulp-imagemin'),
  gutil = require('gulp-util'),
  del = require('del'),
  postcss = require('gulp-postcss'),
  pScss = require('postcss-scss'),
  customProperties = require('postcss-custom-properties'),
  Import = require('postcss-sassy-import'),
  styleguide = require('postcss-style-guide');

/**
 * Recipes
 * deleting files/folders - https://github.com/gulpjs/gulp/blob/master/docs/recipes/delete-files-folder.md
 */

/**
 * basic application paths
 */
var baseApp = {
  in: 'assets/',
  out: 'dist/',
  ptype: 'prototype-utilities/'
};

var basePaths = {
  styles: baseApp.in+'styles/',
  scripts: baseApp.in+'scripts/',
  images: baseApp.in+'images/**',
  movies: baseApp.in+'movies/**',
  fonts: baseApp.in+'fonts/**',
  bower: 'bower_components/',
};

/**
 * Generic paths configuration
 */
var paths = {
  sassMain: basePaths.styles+'main.scss',
  sassIncludes: [
    basePaths.styles,
    basePaths.bower
  ],
  scriptsMain: basePaths.scripts+'main.js',
  stylesOut: baseApp.out+'styles/',
  scriptsOut: baseApp.out+'scripts/',
  fontsOut: baseApp.out+'fonts/',
  imagesOut: baseApp.out+'images/',
  videosOut: baseApp.out+'images/',
  ptypeOut: baseApp.ptype+'dist/'
};

/**
 * fileNames Configuration
 */
var fNames = {
  styles: {
    main: 'main.min.css',
    vendor: 'vendor.min.css'
  },
  scripts: {
    main: 'main.min.js',
    vendor: 'vendor.min.js'
  }
};

/**
 * Configuration for custom CS2 stylesheet
 */
var sassConfig = {
	src: paths.sassMain,
	outputDirectory: paths.stylesOut,
	options: {
		outputStyle: 'expanded',
		includePaths: paths.sassIncludes
	}
};

/**
 * Configuration for Autoprefixer
 * TODO: check autoprefixer config in detail and account for IE10 especially
 * All options that provides for autoprefixer https://github.com/postcss/autoprefixer#options
 * broweserlist https://github.com/ai/browserslist#queries
 * Autoprefixer Online for css and filter browser http://autoprefixer.github.io/
 */

var apConfig = {
  browsers: [
    'last 2 versions', // Support the last 2 versions of every browser
    'android 4',
    'opera 12',
    'ie >= 9' // ensure that all versions of IE (from 9 upwards) are supported
  ]
};

/**
 * Configuration for custom javascript file
 */
var jsConfig = {
	inputDirectory: basePaths.scripts,
	outputDirectory: paths.scriptsOut
};

/**
 * Predefined file-type filters to use with gulp-filter
 */
var filters = {
  css: '**/*.css',
  js: '**/*.js',
  scss: '**/*.scss',
  webFonts: ['**/*.otf','**/*.woff*', '**/*.woff2','**/*.ttf','**/*.eot','**/*.svg'],
  images: ['**/*.png','**/*.gif','**/*.jpg','**/*.svg'],
  movies: []
};

/**
 * concatVendorCSS
 * Create vendor.min.css from bower main files without bootstrap (as it is included in custom main.css)
 * no autoprefixing included: should be done by source package
 * scss-Files will be ignored - include them in /assets/styles/main.scss
 */
gulp.task('styles:vendor',['clean:vendor:styles'], function(){
	console.log('concatenating bower vendor css files into vendor.min.css and moving to ' + sassConfig.outputDirectory + '...');

  return gulp.src(bowerMain())
    .pipe( filter(filters.css) )
    .pipe( debug() )
    .pipe( sourcemaps.init() )
		.pipe( groupConcat( { 'vendor.min.css': filters.css } ) )
    .pipe( autoprefix(apConfig) )
		.pipe( minify() )
    .pipe( sourcemaps.write('./maps') )
		.pipe( gulp.dest(sassConfig.outputDirectory) );
});

/**
* css
* Create CS2 custom stylesheet including customized bootstrap
* Autoprefixing included
*/
gulp.task('styles:custom',['clean:custom:styles'], function() {
  var cssSrc = sassConfig.src;
  var cssFile = fNames.styles.main;
  var cssDest = sassConfig.outputDirectory;
  console.log('building '+cssFile+' from '+cssSrc+' to '+cssDest);

  return gulp.src(cssSrc)
  .pipe( sourcemaps.init() )
  .pipe( sass(sassConfig.options) )
  .pipe( concat(cssFile) )
  .pipe( autoprefix(apConfig) )
  .pipe( minify() )
  .pipe( sourcemaps.write('./maps') )
  .pipe( gulp.dest(cssDest) );
});

/*
* concatVendorJS
* Create vendor.min.js from bower components
*/
gulp.task('scripts:vendor', ['clean:vendor:scripts'], function(){
  console.log('concatenating bower vendor js files into vendor.min.js and moving to ' + jsConfig.outputDirectory + '...');

  return gulp.src( bowerMain() )
  .pipe( filter(filters.js) )
  .pipe( debug() )
  .pipe( sourcemaps.init() )
  .pipe( groupConcat( { 'vendor.min.js': filters.js } ) )
  .pipe( uglify() )
  .pipe( sourcemaps.write('./maps') )
  .pipe( gulp.dest(jsConfig.outputDirectory) );
});

/*
 * custom fonts
 * Custom Font Files
 * FileTypes: see filter
 */
gulp.task('fonts:custom',['clean:fonts','fonts:vendor'],function(){
	var filterFonts = filter(filters.webFonts);
  console.log('moving custom fonts to' + paths.fontsOut + '...');

  return gulp.src(basePaths.fonts)
		.pipe( filterFonts )
		.pipe( gulp.dest(paths.fontsOut) );
});

/*
* fonts
* Move font files from bower components to dist folder
* FileTypes: see filter
* rename() - flattens folder structure
*/
gulp.task('fonts:vendor',['clean:fonts'],function(){
  var filterFonts = filter(filters.webFonts);
  console.log('moving fonts to ' + paths.fontsOut + ' ...');

  return gulp.src(bowerMain())
  .pipe( filterFonts )
  .pipe( debug() )
  .pipe( rename( { dirname: '' } ) )
  .pipe( gulp.dest(paths.fontsOut) );
});

/**
* vendor
* Creates vendor css and js from bower
* Moves fonts from bower to dist
*/
gulp.task('vendor',['styles:vendor','scripts:vendor','fonts:vendor']);


/**
* js
* Create CS2 custom javascript
*/
gulp.task('scripts:custom',['clean:custom:scripts'],function(){
  var jsFile = fNames.scripts.main;
  var jsSrc = jsConfig.inputDirectory+'**/*';
  var jsDest = jsConfig.outputDirectory;
  console.log('building '+jsFile+' from '+jsSrc+' to '+jsDest);
  return gulp.src(jsSrc)
  .pipe(sourcemaps.init())
  .pipe(concat(jsFile))
  .pipe(uglify())
  .on('error', function(err) { gutil.log(gutil.colors.red('[Error]'), err.toString()); })
  .pipe(sourcemaps.write('./maps'))
  .pipe(gulp.dest(jsDest));
});

/*
 * images
 * Compress & Move image files from bower components to dist folder
 * FileTypes: see filter
 * TODO: Better plugin options for imagemin possible?
 */
gulp.task('images',['clean:images'],function(){
	console.log('compressing images ...');
	var filterImages = filter(filters.images);
	return gulp.src(basePaths.images)
		.pipe(filterImages)
    .pipe(imagemin())
		.pipe(gulp.dest(paths.imagesOut));
});


/*
* videos
* Move videoe files from bower components to dist folder
* FileTypes: see filter
* rename() - flattens folder structure
*/
gulp.task('videos',['clean:videos'],function(){
  console.log('moving videos ...');
  return gulp.src(basePaths.videos+'**/*')
  .pipe(gulp.dest(paths.videosOut));
});
/**
 * custom
 * Creates CS2 custom css and js
 */
gulp.task('custom',['styles:custom','scripts:custom','images','fonts:custom']);

/**
 * Task Aliases for quicker working
 */
gulp.task('css',['styles:custom']);
gulp.task('js',['scripts:custom']);


gulp.task('ptypeUtilities',['ptypeUtilities:sass','ptypeUtilities:js']);

gulp.task('ptypeUtilities:sass',function(){
  return gulp.src(baseApp.ptype + "**/*")
    .pipe( filter(filters.scss) )
    .pipe( sourcemaps.init() )
    .pipe( sass(sassConfig.options) )
    .pipe( concat('ptypeUtilities.min.css') )
    .pipe( autoprefix(apConfig) )
    .pipe( minify() )
    .pipe( sourcemaps.write('./maps') )
    .pipe( gulp.dest(paths.ptypeOut + 'styles/') );
});

gulp.task('ptypeUtilities:js',function(){
  return gulp.src(baseApp.ptype + "**/*")
    .pipe( filter(filters.js) )
    .pipe( sourcemaps.init() )
    .pipe( concat('ptypeUtilities.min.js') )
    .pipe( uglify() )
    .pipe( sourcemaps.write('./maps') )
    .pipe( gulp.dest(paths.ptypeOut + 'scripts/') );
});

/**
 * clean:custom:styles
 * Cleaning Task for custom files
 */
gulp.task('clean:custom:styles',function(){
  return del([
    paths.stylesOut+fNames.styles.main
  ]);
});

/**
 * clean:custom:scripts
 * Cleaning Task for custom files
 */
gulp.task('clean:custom:scripts',function(){
  return del([
    paths.scriptsOut+fNames.scripts.main
  ]);
});

/**
 * clean:vendor:styles
 * Cleaning Task for custom files
 */
gulp.task('clean:vendor:styles',function(){
  return del([
    paths.stylesOut+fNames.styles.vendor
  ]);
});

/**
 * clean:vendor:scripts
 * Cleaning Task for custom files
 */
gulp.task('clean:vendor:scripts',function(){
  return del([
    paths.scriptsOut+fNames.scripts.vendor
  ]);
});

/**
 * clean:images
 * Cleaning Task for custom files
 */
gulp.task('clean:images',function(){
  return del([
    paths.imagesOut+'**/*'
  ]);
});

/**
 * clean:vdieos
 * Cleaning Task for custom files
 */
gulp.task('clean:videos',function(){
  return del([
    paths.videosOut+'**/*'
  ]);
});

/**
 * clean:fonts
 * Cleaning Task for all styles
 */
gulp.task('clean:fonts',function(){
  return del([
    paths.fontsOut+'**/*'
  ]);
});

/**
 * clean:styles
 * Cleaning Task for all styles
 */
gulp.task('clean:styles',function(){
  return del([
    paths.stylesOut+'**/*'
  ]);
});

/**
 * clean:scripts
 * Cleaning Task for all scripts
 */
gulp.task('clean:scripts',function(){
  return del([
    paths.scriptsOut+'**/*'
  ]);
});

gulp.task('watch', function() {
	gulp.watch(basePaths.styles, ['css']);
	gulp.watch(jsConfig.inputDirectory, ['js']);
  gulp.watch(paths.imagesBase, ['images']);
  gulp.watch(paths.videosBase, ['videos']);
  gulp.watch(baseApp.bower, ['vendor']);
});

/**
* css
* Create CS2 custom stylesheet including customized bootstrap
* Autoprefixing included
*/
gulp.task('styleguide', ['styles:guide'], function() {
  return gulp.src(sassConfig.outputDirectory + 'styleguide/styleguide.css')
    .pipe(debug())
    .pipe(postcss([
      autoprefix,
      styleguide({
        project: 'Caterpillar',
        dest: '../styleguide/index.html',
        showCode: false
      })
    ]));
});

gulp.task('styles:guide', function() {
  var cssSrc = sassConfig.src;
  var cssFile = 'styleguide.css';
  var cssDest = sassConfig.outputDirectory + "styleguide/";
  console.log('building '+cssFile+' from '+cssSrc+' to '+cssDest);

  return gulp.src(cssSrc)
  .pipe(sass(sassConfig.options))
  .pipe(concat(cssFile))
  .pipe(gulp.dest(cssDest));
});

/**
 * Default gulp task
 */
gulp.task('default', ['vendor','custom','images','videos']);
