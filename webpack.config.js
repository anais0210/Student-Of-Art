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
    .addEntry('formAnim','./assets/form/animsition/js/animsition.js')
    .addEntry('formCount','./assets/form/countdowntime/countdowntime.js')
    .addEntry('formDate','./assets/form/daterangepicker/daterangepicker.js')
    .addEntry('formJs','./assets/form/js/main.js')
    .addEntry('formPerfe','./assets/form/perfect-scrollbar/perfect-scrollbar.min.js')
    .addEntry('formSelect','./assets/form/select2/select2.js')
    .addEntry('popper','./assets/form/js/popper.js')
    .addEntry('profilDate','./assets/profil/js/plugins/bootstrap-datepicker.js')
    .addEntry('profilNoti','./assets/profil/js/plugins/bootstrap-notify.js')
    .addEntry('profilSwi','./assets/profil/js/plugins/bootstrap-switch.js')
    .addEntry('profilChar','./assets/profil/js/plugins/chartist.min.js')
    .addEntry('profilNoui','./assets/profil/js/plugins/nouislider.min.js')
    .addEntry('profilDemo','./assets/profil/js/demo.js')

    .addStyleEntry('themeGeneralCss', './assets/themeGeneral/css/stylish-portfolio.css')
    .addEntry('bootstrapCss', './assets/bootstrap/css/bootstrap.css')
    .addEntry('fontAwesomeCss','./assets/themeGeneral/font-awesome/css/font-awesome.css')
    .addEntry('formAnimate','./assets/form/animate/animate.css')
    .addEntry('formAnimat','./assets/form/animsition/css/animsition.css')
    .addEntry('formMain','./assets/form/css/main.css')
    .addEntry('formUtil,','./assets/form/css/util.css')
    .addEntry('formHam','./assets/form/css-hamburgers/hamburgers.css')
    .addEntry('formDater','./assets/form/daterangepicker/daterangepicker.css')
    .addEntry('formPerf','./assets/form/perfect-scrollbar/perfect-scrollbar.css')
    .addEntry('formSelect2','./assets/form/select2/select2.css')
    .addEntry('galerieCss', './assets/galerie/css/4-col-portfolio.css')
    .addEntry('profilCss', './assets/profil/css/light-bootstrap-dashboard.css')
    .addEntry('simpleLineIconsCss', './assets/themeGeneral/simple-line-icons/css/simple-line-icons.css')

    .enableSassLoader()
    // uncomment if you use Sass/SCSS files

    // uncomment for legacy applications that require $/jQuery as a global variable
    .addEntry('galerieJQuery', './assets/galerie/jquery/jquery.js')
    .addEntry('formJQuery','./assets/form/jquery/jquery-3.2.1.min.js')
    .addEntry('bootstrapJQuery', './assets/bootstrap/jquery/jquery.js')
    .addEntry('bootstrapJQueryEasingCompatibility', './assets/bootstrap/jquery-easing/jquery.easing.compatibility.js')
    .addEntry('bootstrapJQueryEasingCompatibilityJs', './assets/bootstrap/jquery-easing/jquery.easing.js')

    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
