#### QR Code content app

<p align="center">
    <img width="100%" src="https://user-images.githubusercontent.com/13073820/204442472-05d02467-2e53-468a-aba2-b0e96b7cfce0.png" >
</p>

<p align="center">
    <img width="100%" src="https://user-images.githubusercontent.com/13073820/204442486-00f3172b-f852-47ae-95b8-afce542f0f76.png" >
</p>


## Extensions

- BackEnd: [Laravel](https://laravel.com/)
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
