import { api } from 'src/boot/axios';
import { Pagination, Product } from 'src/types/types';

export default class ProductService {
  static async getProducts(payload: Pagination) {
    return await api.get('/products', { params: payload });
  }

  static async addProduct(payload: Product) {
    const formData = new FormData();
    Object.keys(payload).forEach((key) => {
      formData.append(key, payload[key as keyof Product]);
    });
    return await api.post('/products', formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });
  }

  static async createProduct() {
    return await api.get('/products/create');
  }

  static async updateProduct(payload: Product, id: string) {
    const formData = new FormData();
    Object.keys(payload).forEach((key) => {
      formData.append(key, payload[key as keyof Product]);
    });
    return await api.post(`/products/${id}`, payload, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });
  }

  static async editProduct(id: string) {
    return await api.get(`/products/${id}`);
  }

  static async deleteProduct(id: string) {
    return await api.delete(`/products/${id}`);
  }
}

// export default class ProductApi {
//   static async getProducts(payload: Pagination) {
//     return await api.get('/products', { params: payload });
//   }

//   static async getProduct(id: string) {
//     return await api.get(`/products/${id}`);
//   }

//   static async createProduct() {
//     return await api.get(`/products/create`);
//   }

//   static async createProduct(payload: Product) {
//     const formData = new FormData();
//     Object.keys(payload).forEach((key) => {
//       formData.append(key, payload[key as keyof Product]);
//     });
//     return await api.post('/products', formData, {
//       headers: {
//         'Content-Type': 'multipart/form-data',
//       },
//     });
//   }

//   static async updateProduct(payload: Product, id: string) {
//     const formData = new FormData();
//     Object.keys(payload).forEach((key) => {
//       formData.append(key, payload[key as keyof Product]);
//     });
//     return await api.post(`/products/${id}`, payload, {
//       headers: {
//         'Content-Type': 'multipart/form-data',
//       },
//     });
//   }

//   static async deleteProduct(id: string) {
//     return await api.delete(`/products/${id}`);
//   }
// }
