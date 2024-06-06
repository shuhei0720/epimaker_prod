const CACHE_NAME = 'epimaker-cache-v1';
const urlsToCache = [
    '/',
    '/welcome',
    '/register',
    '/login',
    '/css/app.css',
    '/js/app.js',
    '/img/すべらない話.png'
    // 必要に応じて他のURLを追加
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => cache.addAll(urlsToCache))
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => response || fetch(event.request))
    );
});