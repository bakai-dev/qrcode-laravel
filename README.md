#### QR Code content app

## Extensions

- BackEnd: [Laravel 8](https://laravel.com/)
- FrontEnd: [Vue](https://vuejs.org) + [VueRouter](https://router.vuejs.org) + [Vuex](https://vuex.vuejs.org) + [VueI18n](https://kazupon.github.io/vue-i18n/)
- Login using [JWT](https://jwt.io/) with [Vue-Auth](https://websanova.com/docs/vue-auth/home), [Axios](https://github.com/mzabriskie/axios) and [Sanctum](https://laravel.com/docs/8.x/sanctum).
- [ElementUI](http://element.eleme.io/) UI Kit
- [FontAwesome 5](http://fontawesome.io/icons/) icons

## Install
- `git clone https://github.com/bakai-dev/qrcode-laravel.git`
- `cd qrcode-laravel`
- `composer install`
- `cp .env.example .env` - copy .env file
- set your DB credentials in `.env`
- `php artisan key:generate`
- `php artisan migrate`
- `yarn install`

## Testing

### Unit Testing
`php artisan test`

## Usage
- `npm run watch` or `npm run hot` - for hot reloading
- `php artisan serve` and go [127.0.0.1:8000](http://127.0.0.1:8000)
- Create new user and login.

### Qrcode module

```
Qrcode
│
├── routes_api.php
│
├── Controllers/
│   └── QrcodeController.php
│
├── Requests/
│   └── Qrcode/Request.php
│
└── Resources/
    └── QrcodeResource.php
```

- **frontend module** `resources/js/modules/qrcode/`
```
Qrcode/
│
├── routes.js
│
├── api/
│   └── index.js
│
├── components/
│   ├── Qrcode/List.vue
│   ├── Qrcode/View.vue
│   └── Qrcode/Form.vue
│
└── store/
    ├── store.js
    ├── types.js
    └── actions.js
```
