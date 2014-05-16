require.config({
    baseUrl: "../js/libs/",
    paths: {
        plugins: '../plugins',
        app: '../app',
        views: '../views',
        mixins: '../mixins'
    },
    shim: {
        'jquery.class' : ['jquery'],
        'jquery.pubsub' : ['jquery']
    }
});

require(['app'], function(App) {
    console.log('main / new App()');

    App.init();

});