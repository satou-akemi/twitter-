// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },

  css: [
    '~/assets/css/index.css',
    '~/assets/css/register.css',
    '~/assets/css/login.css',
    '~/assets/css/comment.css',
    '~/assets/css/header.css',
    '~/assets/css/side.css',
  ]
})
