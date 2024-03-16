export type TableColumn = {
  name: string;
  label: string;
  align?: 'left' | 'center' | 'right';
  field: string;
  sortable?: boolean;
  sort?: (a: string, b: string, rowA: string, rowB: string) => number;
  style?: string;
};

export type Product = {
  name: string;
  description: string;
  price: string;
  expirationDate: string;
  categoryId: string;
  imageUrl: string;
};

export type Category = {
  name: string;
};

export type User = {
  name: string;
  email: string;
  role: string;
};

export type UserLogin = {
  password: string;
  email: string;
  device_name: string;
};

export type Pagination = {
  sortBy: string;
  descending: boolean;
  page: number;
  rowsPerPage: number;
  rowsNumber: number;
  from: number;
  to: number;
  search: string;
};
