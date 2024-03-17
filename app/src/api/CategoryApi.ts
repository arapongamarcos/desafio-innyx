import { api } from 'src/boot/axios';
import { Category, Pagination } from 'src/types/types';

export default class CategoryApi {
  static async getCategories(payload: Pagination) {
    return await api.get('/categories', { params: payload });
  }

  static async getCategory(id: string) {
    return await api.get(`/categories/${id}`);
  }

  static async CreateCategory(payload: Category) {
    return await api.post('/categories', payload);
  }

  static async updateCategory(payload: Category, id: string) {
    return await api.put(`/categories/${id}`, payload);
  }

  static async deleteCategory(id: string) {
    return await api.delete(`/categories/${id}`);
  }
}
