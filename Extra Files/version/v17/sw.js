self.addEventListener('install', e => {
  console.log('%c Service worker installed.', 'color: green');
});

self.addEventListener('fetch', e => {
});