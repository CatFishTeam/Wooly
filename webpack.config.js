const Encore = require('@symfony/webpack-encore');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    .addEntry('js/app', './assets/js/app.js')
    .enableVueLoader()
    .addStyleEntry('css/app', './assets/sass/app.sass')
    .enableSassLoader(function(options){
        options.includePaths = [require('path').resolve(__dirname, 'node_modules')];
    })
    .autoProvidejQuery();

let config = Encore.getWebpackConfig();

config.resolve = {
    alias: {
        'vue$': 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
    }
}

/*
config.plugins.push(new BrowserSyncPlugin(
    {
        host: 'local.wooly.com',
        port: 3000,
        proxy: 'http://local.wooly.com/',
        logLevel: 'silent',
        logConnections: false,
        logSnippet: false
    },
    {
        reload: false, // this allow webpack server to take care of instead browser sync
        name: 'bs-webpack-plugin' // notice the name when getting instance above
    }
));
*/

module.exports = config