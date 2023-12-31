// i18n.js
import { createI18n } from 'vue-i18n';

// Function to load messages dynamically
function loadLocaleMessages() {
  const locales = import.meta.globEager('./locales/*.json');

  const messages = {};
  Object.keys(locales).forEach((key) => {
    const matched = key.match(/\.\/locales\/(\w+)\.json$/);
    if (matched && matched.length === 2) {
      const locale = matched[1];
      messages[locale] = locales[key];
    }
  });

  return messages;
}

const i18n = createI18n({
  legacy: false, // set to false if you want to use Composition API
  locale: 'en', // default locale
  fallbackLocale: 'en', // fallback locale
  messages: loadLocaleMessages(),
});

// // Somewhere in your application, e.g., a settings page
// import i18n from './i18n';

// // Switch to a different locale dynamically
// i18n.global.locale = 'es'; // Switch to Spanish

export default i18n;
