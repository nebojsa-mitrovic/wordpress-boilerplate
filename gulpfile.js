const { src, dest, watch, series, parallel } = require("gulp"),
	imagemin = require("gulp-imagemin"),
	sourcemaps = require("gulp-sourcemaps"),
	sass = require("gulp-sass"),
	concat = require("gulp-concat"),
	terser = require("gulp-terser"),
	postcss = require("gulp-postcss"),
	autoprefixer = require("autoprefixer"),
	browserSync = require("browser-sync").create(),
	cssnano = require("cssnano");
