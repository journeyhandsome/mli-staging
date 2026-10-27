<template>
  <div class="form-group mb-4">
    <div ref="widget"></div>
    <div v-if="error" class="text-danger mt-1">{{ error }}</div>
  </div>
</template>

<script>
  const API_URL = 'https://www.google.com/recaptcha/api.js?onload=onRecaptchaApiLoaded&render=explicit';

  // The Google script can only be added to the page once, no matter how many widgets use it.
  let apiPromise = null;

  function loadApi() {
    if (window.grecaptcha && window.grecaptcha.render) {
      return Promise.resolve(window.grecaptcha);
    }

    if (!apiPromise) {
      apiPromise = new Promise((resolve, reject) => {
        window.onRecaptchaApiLoaded = () => resolve(window.grecaptcha);

        const script = document.createElement('script');
        script.src = API_URL;
        script.async = true;
        script.defer = true;
        script.onerror = () => {
          apiPromise = null;
          reject(new Error('Unable to load the reCAPTCHA script.'));
        };

        document.head.appendChild(script);
      });
    }

    return apiPromise;
  }

  export default {
    props: {
      siteKey: {
        type: String,
        default: ''
      }
    },
    data: function() {
      return {
        widgetId: null,
        token: '',
        error: '',
      }
    },
    methods: {
      getToken() {
        return this.token;
      },
      showError(message) {
        this.error = message;
      },
      scrollIntoView() {
        this.$el.scrollIntoView({ behavior: 'smooth', block: 'center' });
      },
      reset() {
        this.token = '';

        if (this.widgetId !== null) {
          window.grecaptcha.reset(this.widgetId);
        }
      },
      onVerify(token) {
        this.token = token;
        this.error = '';
      },
      onExpired() {
        this.token = '';
      },
    },
    mounted() {
      if (!this.siteKey) {
        this.error = 'reCAPTCHA is not configured. Please contact us by phone or email.';
        console.error('Missing recaptcha_site_key: set RECAPTCHA_SITE_KEY before building the site.');

        return;
      }

      loadApi().then(grecaptcha => {
        this.widgetId = grecaptcha.render(this.$refs.widget, {
          sitekey: this.siteKey,
          callback: this.onVerify,
          'expired-callback': this.onExpired,
          'error-callback': this.onExpired,
        });
      }).catch(() => {
        this.error = 'Could not load reCAPTCHA. Please refresh the page and try again.';
      });
    },
  }
</script>
