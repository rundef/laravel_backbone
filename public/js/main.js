var rootPath = document.querySelector('body').dataset.rooturl.replace('://', '');
var index = rootPath.indexOf('/');
rootPath = (index !== -1 && index+1 < rootPath.length) ? rootPath.substr(index) : rootPath = '/';

require.config({
  // Base path used to load scripts
  baseUrl: rootPath+'js',
  deps: ['app'],

  // Prevent caching during dev
  urlArgs: "t=" + (new Date()).getTime(),
  
  // Set common library paths
  paths: {
    jquery: 'node_modules/jquery/dist/jquery.min',
    lodash: 'node_modules/lodash/index',
    backbone: 'node_modules/backbone/backbone-min',
    toastr: 'node_modules/toastr/build/toastr.min'
  },
  map: {
    "*": {
      "underscore": "lodash"
    }
  }
});
