var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    // '/login',
    '../frontend/bootstrap/css/bootstrap.css.map',
    '../frontend/css/splash.css',
    '../frontend/css/custom.css',
    '../frontend/js/script.js',
    '../frontend/img/cont.png',
    '../frontend/img/cont1.png',
    '../frontend/img/cont2.png',
    '../frontend/img/logo.png',
    '../frontend/img/logo1.png',
    '../frontend/img/icons/icon-72x72.png',
    '../frontend/img/icons/icon-96x96.png',
    '../frontend/img/icons/icon-128x128.png',
    '../frontend/img/icons/icon-144x144.png',
    '../frontend/img/icons/icon-152x152.png',
    '../frontend/img/icons/icon-192x192.png',
    '../frontend/img/icons/icon-384x384.png',
    '../frontend/img/icons/icon-512x512.png',
    '../frontend/img/splash/splash-640x1136.png',
    '../frontend/img/splash/splash-750x1334.png',
    '../frontend/img/splash/splash-828x1792.png',
    '../frontend/img/splash/splash-1125x2436.png',
    '../frontend/img/splash/splash-1242x2208.png',
    '../frontend/img/splash/splash-1242x2688.png',
    '../frontend/img/splash/splash-1536x2048.png',
    '../frontend/img/splash/splash-1668x2224.png',
    '../frontend/img/splash/splash-1668x2388.png',
    '../frontend/img/splash/splash-2048x2732.png',
];

// Cache on install
self.addEventListener("install", event => {
    // this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
        .then(cache => {
            return cache.addAll(filesToCache);
        })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                .filter(cacheName => (cacheName.startsWith("pwa-")))
                .filter(cacheName => (cacheName !== staticCacheName))
                .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
        .then(response => {
            return response || fetch(event.request);
        })
        .catch(() => {
            return caches.match('offline');
        })
    )
});
