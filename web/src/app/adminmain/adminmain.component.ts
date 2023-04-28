import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/api.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import 'jquery';
import 'bootstrap/js/dist/modal';


@Component({
  selector: 'app-adminmain',
  templateUrl: './adminmain.component.html',
  styleUrls: ['./adminmain.component.scss']
})
export class AdminmainComponent implements OnInit {

  productForm !: FormGroup;
  users: any = [];
  products: any = [];

  constructor(
    private api: ApiService,
    private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.productForm = this.formBuilder.group({
      inputName: ['', Validators.required],
      inputPrice: ['', Validators.required],
      inputWeight: ['', Validators.required],
      inputDescription: ['', Validators.required],
      inputCategory: ['', Validators.required]
    });
    this.getUsers();
    this.getProducts();
  }

  getUsers() {
    this.api.getUsers().subscribe({
      next: (response: any) => {
        this.users = response.data;
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  getProducts() {
    this.api.getProducts().subscribe({
      next: (response: any) => {
        this.products = response.data;
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  onClick() {
    this.addProduct();
  }

  addProduct() {
    let data = {
      name: this.productForm.value.inputName,
      price: this.productForm.value.inputPrice,
      weight: this.productForm.value.inputWeight,
      description: this.productForm.value.inputDescription,
      category: this.productForm.value.inputCategory
    };
    
    this.api.addProduct(data)
    .subscribe({
      next: (data:any) => {
        this.getProducts();
        this.clearField();
      },
      error: (err:any) => {
        console.log('Hiba! A termék felévtele sikertelen!')
      }
    });
  }

  clearField() {
    this.productForm.patchValue({
        inputName: '', 
        inputItemnumber: '',
        inputQuantity: '',
        inputPrice: ''
      });
  }

}
