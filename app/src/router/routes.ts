import { RouteRecordRaw } from 'vue-router';

function categoryRoutes(): RouteRecordRaw[] {
  return [
    {
      name: 'Categorias',
      path: 'categorias',
      meta: {
        requiresAuth: true,
        requiredRoles: ['user', 'admin'],
      },

      component: () => import('src/pages/categories/ListPage.vue'),
    },
    {
      name: 'Adicionar categoria',
      path: 'categorias/adicionar',
      meta: {
        requiresAuth: true,
        requiredRoles: ['admin'],
      },

      component: () => import('src/pages/categories/CreatePage.vue'),
    },
    {
      name: 'Editar categoria',
      path: 'categorias/editar/:uuid',
      meta: {
        requiresAuth: true,
        requiredRoles: ['admin'],
      },

      component: () => import('src/pages/categories/EditPage.vue'),
    },
  ];
}

function productRoutes(): RouteRecordRaw[] {
  return [
    {
      name: 'Produtos',
      path: 'produtos',
      meta: {
        requiresAuth: true,
        requiredRoles: ['user', 'admin'],
      },

      component: () => import('src/pages/products/ListPage.vue'),
    },
    {
      name: 'Adicionar produto',
      path: 'produtos/adicionar',
      meta: {
        requiresAuth: true,
        requiredRoles: ['admin'],
      },

      component: () => import('src/pages/products/CreatePage.vue'),
    },
    {
      name: 'Editar produto',
      path: 'produtos/editar/:uuid',
      meta: {
        requiresAuth: true,
        requiredRoles: ['admin'],
      },

      component: () => import('src/pages/products/EditPage.vue'),
    },
  ];
}

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      {
        name: 'Início',
        path: '',
        alias: 'home',
        meta: {
          requiresAuth: true,
          requiredRoles: ['user', 'admin'],
        },
        component: () => import('pages/HomePage.vue'),
      },
      ...categoryRoutes(),
      ...productRoutes(),
    ],
  },
  {
    path: '/login',
    component: () => import('layouts/LoginLayout.vue'),
    children: [
      {
        name: 'Login',
        path: '',
        component: () => import('pages/LoginPage.vue'),
      },
    ],
  },
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue'),
  },
];

export default routes;
