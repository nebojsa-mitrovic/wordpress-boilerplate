const { src, dest, watch, series, parallel } = require("gulp"),
	sourcemaps = require("gulp-sourcemaps"),
	sass = require("gulp-sass"),
	concat = require("gulp-concat"),
	terser = require("gulp-terser"),
	postcss = require("gulp-postcss"),
	autoprefixer = require("autoprefixer"),
	browserSync = require("browser-sync").create(),
	cssnano = require("cssnano");

/** Paths and Variables */
const srcPath = "/",
	assetsScssPath = "/assets/scss/",
	assetsJsPath = "/assets/js/";

// Source Files Variables
const srcFiles = {
	phpFiles: srcPath + "*.php",
	CSSFiles: srcPath + "css/**/*.{css,css.map}",
	jsFiles: srcPath + "js/**/*.js",
};

// Assets Files Variables
const assetsFiles = {
	scssFiles: [assetsScssPath + "**/*.scss"],
	jsFiles: [assetsJsPath + "index.js"],
};

// Source Paths Variables
const srcPaths = {
	CSSPath: srcPath + "css",
	jsPath: srcPath + "js",
};

/** Tasks */

// Compiling
function scssCompile() {
	return src(assetsFiles.scssFiles)
		.pipe(sourcemaps.init())
		.pipe(sass().on("error", sass.logError))
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(concat("main.css"))
		.pipe(sourcemaps.write("."))
		.pipe(dest(srcPaths.CSSPath))
		.pipe(browserSync.stream());
}

function jsCompile() {
	return src(assetsFiles.jsFiles)
		.pipe(sourcemaps.init())
		.pipe(terser())
		.pipe(concat("all.js"))
		.pipe(sourcemaps.write("."))
		.pipe(dest(srcPaths.jsPath));
}

// Watch
function watchMe() {
	browserSync.init({
		server: {
			baseDir: "./",
		},
	});
	watch(assetsFiles.scssFiles, scssCompile);
	watch(assetsFiles.jsFiles, jsCompile).on("change", browserSync.reload);
	watch(srcFiles.phpFiles).on("change", browserSync.reload);
}

/** Exports */
exports.scssCompile = scssCompile;
exports.jsCompile = jsCompile;
exports.copyCSS = copyCSS;
exports.copyJS = copyJS;
exports.watchMe = watchMe;

exports.build = series(copyCSS, copyJS);
exports.default = series(scssCompile, jsCompile, watchMe);
