const mix = require('laravel-mix');
mix
    .browserSync({
        notify: false,
        proxy: 'http://basic-laravel-app-dashboard.test/',
        codeSync: true
    });
