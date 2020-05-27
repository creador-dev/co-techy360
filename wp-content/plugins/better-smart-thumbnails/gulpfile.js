var elixir = require('laravel-elixir');

elixir.config.publicDir = 'assets';
elixir.config.publicPath = 'assets';
elixir.config.assetsPath = '';
elixir.config.js.folder = '';
elixir.config.css.folder = '';
Elixir.inProduction = true;

elixir(function (mix) {

    var suffix = Elixir.inProduction ? '.min' : '';

    mix.scripts(getJsList(), 'assets/js/better-smart-thumbnails' + suffix + '.js');
    mix.styles(getCssList(), 'assets/css/better-smart-thumbnails' + suffix + '.css');
});


function getJsList() {

    return ['assets/js/.before-concat.txt'].concat(require('./assets/js/list.js')).concat('assets/js/.after-concat.txt');
}

function getCssList() {

    return require('./assets/css/list.js');
}
