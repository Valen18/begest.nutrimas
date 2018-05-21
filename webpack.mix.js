let mix = require('laravel-mix');

mix.sass('resources/assets/sass/app.scss', 'public/css')
   	.js([
   		'node_modules/jquery/dist/jquery.js',   
   		'node_modules/bootstrap/dist/js/bootstrap.js',
   		'node_modules/chart.js/src/chart.js',
   		'resources/assets/js/app.js',
   		'resources/assets/js/signature_pad.umd.js'
		], 'public/js/all.js', 'node_modules');

mix.autoload({ jquery: ['$', 'window.jQuery', 'jQuery'], }); 


