define(['jquery', 'backbone'], function($, Backbone) {
  var Router = Backbone.Router.extend({   
    routes: {
      "product":           "showContent",
      "product/*anything": "showContent"
    },
    showContent: function() {
      this._loadAjaxContent(function() {
        $('#page-content .action-delete').submit(function () {
          return confirm('Are you sure you want to delete this product ?');
        });
      });
    },
    _loadAjaxContent: function(callback) {
      $.ajax({
        method: "GET",
        url: Backbone.history.root + Backbone.history.fragment
      })
      .done(function(msg) {
        document.querySelector('#page-content').innerHTML = msg;
        if(typeof callback == 'function') {
          callback();
        }
      });
    }
  });
  return new Router();
});