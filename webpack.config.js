var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('themeGeneralJs', './assets/themeGeneral/js/stylish-portfolio.js')
    .addEntry('galerieJs', './assets/galerie/js/bootstrap.js')
    .addEntry('bootstrapBundle','./assets/bootstrap/js/bootstrap.bundle.js')
    .addEntry('bootstrapJs', './assets/bootstrap/js/bootstrap.js')
    .addEntry('profilJs','./assets/profil/js/light-bootstrap-dashboard.js')
    //.addEntry('formJs' './assets/form/js/')

    .addStyleEntry('themeGeneralCss', './assets/themeGeneral/css/stylish-portfolio.css')
    .addEntry('bootstrapCss', './assets/bootstrap/css/bootstrap.css')
    .addEntry('fontAwesomeCss','./assets/themeGeneral/font-awesome/css/font-awesome.css')
    //.addEntry('form', './assets/form/css')
    .addEntry('galerieCss', './assets/galerie/css/4-col-portfolio.css')
    .addEntry('profilCss', './assets/profil/css/light-bootstrap-dashboard.css')
    .addEntry('simpleLineIconsCss', './assets/themeGeneral/simple-line-icons/css/simple-line-icons.css')

    .enableSassLoader()
    // uncomment if you use Sass/SCSS files
    .addEntry('fontAwesomeScss','./assets/themeGeneral/font-awesome/scss/font-awesome.scss')
    .addEntry('stylishScss','./assets/themeGeneral/scss/stylish-portfolio.scss')
    .addEntry('simpleLineScss','./assets/themeGeneral/simple-line-icons/scss/simple-line-icons.scss')

    // uncomment for legacy applications that require $/jQuery as a global variable
    .addEntry('galerieJQuery', './assets/galerie/jquery/jquery.js')
    .addEntry('bootstrapJQuery', './assets/bootstrap/jquery/jquery.js')
    .addEntry('bootstrapJQueryEasingCompatibility', './assets/bootstrap/jquery-easing/jquery.easing.compatibility.js')
    .addEntry('bootstrapJQueryEasingCompatibilityJs', './assets/bootstrap/jquery-easing/jquery.easing.js')

    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
