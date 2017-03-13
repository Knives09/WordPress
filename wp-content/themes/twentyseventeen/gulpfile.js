var gulp	= require('gulp'),
	sass	= require('gulp-ruby-sass');

gulp.task('default', ['watch', 'sass']);

gulp.task('sass', function() {
	sass(['./assets/scss/style-custom.scss'], {
		sourcemap: false,
		style: 'compressed',
		quiet: true
	})
	.pipe(gulp.dest('./assets/css'))
});

gulp.task('watch', function() {
	gulp.watch('./assets/scss/*.scss', ['sass'])
});
/*gulp.task('compress', function() {
	gulp.src('./src/AppBundle/Resources/public/js-source/*.js')
		.pipe(minify({
			ext:{
	            min:'.js'
	        },
	        noSource: ['.js'],
			ignoreFiles: ['-min.js']
		}))
		.pipe(gulp.dest('./src/AppBundle/Resources/public/js'))
});*/