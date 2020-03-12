const CACHE_NAME = "firstpwa";
var urlsToCache = [
  "/",
  "layout.html",
  "nav.html",
  "index.html",
  "mycontact.html",
  "forminput.html",
  "editinput.html",
  "pages/home.html",
  "pages/about.html",
  "pages/contact.html",
  "pages/setting.html",
  "css/materialize.min.css",
  "js/materialize.min.js",
  "js/nav.js",
  "js/jquery.js",
  "fonts/font-awesome-4.7.0/css/font-awesome.min.css",
  "192.png",
  "512.png",
  "images/bg-01.webp",
  "https://unpkg.com/vue@2.0.3/dist/vue.js",
  "https://unpkg.com/axios@0.12.0/dist/axios.min.js",
  "https://unpkg.com/lodash@4.13.1/lodash.min.js",
  "js/main.js",
  "vendor/bootstrap/css/bootstrap.min.css",
  "fonts/Linearicons-Free-v1.0.0/icon-font.min.css",
  "vendor/animate/animate.css",
  "vendor/css-hamburgers/hamburgers.min.css",
  "vendor/animsition/css/animsition.min.css",
  "css/util.css",
  "css/main.css",
  "vendor/bootstrap/js/popper.js",
  "vendor/bootstrap/js/bootstrap.min.js",
  "https://rawgit.com/schmich/instascan-builds/master/instascan.min.js",
];

self.addEventListener("install", function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function(cache) {
      return cache.addAll(urlsToCache);
    })
  );
});

self.addEventListener("fetch", function(event) {
  event.respondWith(
    caches
      .match(event.request, { cacheName: CACHE_NAME })
      .then(function(response) {
        if (response) {
          console.log("ServiceWorker: Gunakan aset dari cache: ", response.url);
          return response;
        }

        console.log(
          "ServiceWorker: Memuat aset dari server: ",
          event.request.url
        );
        return fetch(event.request);
      })
  );
});

self.addEventListener("activate", function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheName != CACHE_NAME) {
            console.log("ServiceWorker: cache " + cacheName + " dihapus");
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
