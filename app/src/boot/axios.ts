import { boot } from 'quasar/wrappers';
import axios, { AxiosInstance } from 'axios';
import { Loading, Notify } from 'quasar';
declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $axios: AxiosInstance;
  }
}

const api = axios.create({
  baseURL: process.env.API_URL,
  timeout: 30000,
  headers: {
    'Content-Type': 'application/json',
  },
});

api.interceptors.request.use(
  async (config) => {
    Loading.show();
    const token = localStorage.getItem('access_token');
    if (token) {
      config.headers = Object.assign({
        Authorization: `Bearer ${token}`,
        'Content-Type': config.headers['Content-Type'],
      });
      return config;
    }
    if (!window.location.href.endsWith('login')) {
      document.location.href = '/#/login';
      return Promise.reject();
    }
    return config;
  },
  (error) => {
    Notify.create({
      message: `Erro: ${error.message}`,
      color: 'negative',
    });
    Promise.reject(error);
  }
);

api.interceptors.response.use(
  async (response) => {
    Loading.hide();
    return response;
  },
  async (error) => {
    Loading.hide();

    if (error?.response?.status === 401) {
      document.location.href = '/#/login';
    } else {
      Notify.create({
        message: `Erro: ${
          error?.response?.data?.message
            ? error?.response?.data?.message
            : error?.message
        }`,
        color: 'negative',
      });
    }
    Promise.reject(error);
  }
);

export default boot(({ app }) => {
  app.config.globalProperties.$axios = axios;
  app.config.globalProperties.$api = api;
});

export { api };
