const mix = require( 'laravel-mix' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

mix.setPublicPath( 'dist' )
	// Compile scss and minify it
	.sass( 'src/scss/style.scss', 'css' )
	.sass( 'src/scss/admin.scss', 'css' )

	// Compile JS and minify it
	.js( 'src/js/app.js', 'js' )

	// Copy fonts so we don't have to do anything in dist
	.copyDirectory( 'src/fonts', 'dist/fonts' )

	// Copy images so we don't have to do anything in dist
	.copyDirectory( 'src/images', 'dist/images' )

	// Version all the files
	.version()

	// Create all the sourcemaps
	.sourceMaps().options( {
	// Fixes mainly @font-face URLs. Will generate non-relative URLs when true.
	processCssUrls: false,
	autoprefixer: { remove: false },
	cssnano: { preset: "default" },
} );
