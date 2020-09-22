const mix = require('laravel-mix')

mix
  .postCss('resources/css/app.css', 'public/css', require('tailwindcss'))
  .setPublicPath('public')
  .copy('public', '../../public/vendor/nebula')
  .disableNotifications()

if (mix.inProduction()) {
  mix.version()
}
