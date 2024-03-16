import { defineStore } from 'pinia';
import { api } from 'boot/axios';
import { User, UserLogin } from 'src/types/types';

interface AuthState {
  status: string;
  user: User;
}

export const authStore = defineStore('auth', {
  state: (): AuthState => ({
    status: 'success',
    user: {
      name: '',
      email: '',
      role: '',
    },
  }),
  getters: {
    isLoggedIn: (state): boolean => !!state.user.name,
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
            resolve(resp.data);
          })
          .catch((err) => {
            this.status = 'error';
            localStorage.removeItem('access_token');
            reject(err);
          });
      });
    },
    getUser(): Promise<User> {
      console.log('store');
      return new Promise((resolve, reject) => {
        api({
          url: '/me',
          method: 'GET',
        })
          .then((resp) => {
            const user = resp.data.me;
            this.user = user;
            localStorage.setItem('user', JSON.stringify(user));
            resolve(resp.data.me);
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
