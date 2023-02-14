import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { ProductComponent } from '../product/product.component';


@Injectable({
  providedIn: 'root'
})
export class ProductService {
  getProducts() {
    throw new Error('Method not implemented.');
  }
  updateProduct(selectedProduct: ProductComponent) {
    throw new Error('Method not implemented.');
  }
  deleteProduct(product: ProductComponent) {
    throw new Error('Method not implemented.');
  }
  addProduct(selectedProduct: ProductComponent) {
    throw new Error('Method not implemented.');
  }

  constructor(
    private HttpClient:HttpClient,

  ) { }
}
