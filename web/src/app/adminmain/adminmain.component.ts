import { Component, OnInit } from '@angular/core';
import { ProductService } from '../shared/product.service';
import { Router } from '@angular/router';
import { ProductComponent } from '../product/product.component';

@Component({
  selector: 'app-admin-main',
  templateUrl: './adminmain.component.html',
  styleUrls: ['./adminmain.component.scss']
})
export class AdminMainComponent implements OnInit {
  products: ProductComponent[] | undefined;
  selectedProduct: ProductComponent = new ProductComponent();
  isAddProduct: boolean | undefined;
  isEditProduct: boolean | undefined;

  constructor(
    private productService: ProductService,
    private Router:Router,
    ) { }

  ngOnInit(): void {
    this.getProducts();
  }

  getProducts(): void {
    this.productService.getProducts
     return;
  }

  addProduct(): void {
    this.isAddProduct = true;
    this.isEditProduct = false;
    this.selectedProduct = new ProductComponent();
    document.getElementById("productModalButton")?.click();
  }
  
}
