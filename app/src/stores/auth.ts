import { defineStore } from 'pinia';
import { api } from 'boot/axios';
import { User, UserLogin } from 'src/types/types';

interface AuthState {
  status: string;
  access_token: string;
  user: User;
}

export const authStore = defineStore('auth', {
  state: (): AuthState => ({
    status: 'success',
    access_token: '',
    user: {
      name: '',
      email: '',
      role: '',
    },
  }),
  getters: {
    isLoggedIn: (state): boolean => !!state.access_token,
    userInfo: (state): User => state.user,
  },
  actions: {
    logout() {
      return new Promise((resolve, reject) => {
        api({
          url: '/logout',
          method: 'POST',
        })
          .then((resp) => {
            localStorage.removetIem('access_token');
            this.status = 'success';
            this.access_token = '';
            resolve(resp);
          })
          .catch((err) => {
            this.status = 'error';
            reject(err);
          });
      });
    },
    login(user: UserLogin): Promise<{ token: string }> {
      return new Promise((resolve, reject) => {
        api({
          url: '/login',
          data: user,
          method: 'POST',
        })
          .then((resp) => {
            const access_token = resp.data.token;
            localStorage.setItem('access_token', access_token);
            this.status = 'success';
            this.access_token = access_token;
            resolve(resp.data.token);
          })
          .catch((err) => {
            this.status = 'error';
            this.access_token = '';
            localStorage.removeItem('access_token');
            reject(err);
          });
      });
    },
    getUser(): Promise<User> {
      return new Promise((resolve, reject) => {
        api({
          url: '/me',
          method: 'GET',
        })
          .then((resp) => {
            const user = resp.data.user;
            this.user = user;
            resolve(resp.data.user);
          })
          .catch((err) => {
            this.user = {
              name: '',
              email: '',
              role: '',
            };
            reject(err);
          });
      });
    },
  },
});
