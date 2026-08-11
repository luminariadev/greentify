self.addEventListener('install', function(e) {
 e.waitUntil(
   caches.open('greentify-cache-v1').then(function(cache) {
     return cache.addAll([
       '/',
       '/index.php',
       '/css/app.css',
       '/js/app.js',
       '/images/icons/icon-72x72.png',
       '/images/icons/icon-96x96.png',
       '/images/icons/icon-128x128.png',
       '/images/icons/icon-144x144.png',
       '/images/icons/icon-152x152.png',
       '/images/icons/icon-192x192.png',
       '/images/icons/icon-384x384.png',
       '/images/icons/icon-512x512.png'
     ]);
   })
 );
});

self.addEventListener('fetch', function(e) {
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});
