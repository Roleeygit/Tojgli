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
  editForm !: FormGroup;
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
    this.editForm = this.formBuilder.group({
      editInputId: ['', Validators.required],
      editInputName: ['', Validators.required],
      editInputPrice: ['', Validators.required],
      editInputWeight: ['', Validators.required],
      editInputDescription: ['', Validators.required],
      editInputCategory: ['', Validators.required]
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
        const message = document.createElement('div');
      },
      error: (err:any) => {
        console.log('Hiba! A termék felévtele sikertelen!')
      }
    });
  }

  deleteProduct(id: number) {
    this.api.deleteProduct(id).subscribe({
      next: (res) => {
        console.log(res);
        this.getProducts();
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  editProduct(product: any) {
    this.editForm.patchValue({editInputId: product.id});
    this.editForm.patchValue({editInputName: product.name});
    this.editForm.patchValue({editInputPrice: product.price});
    this.editForm.patchValue({editInputWeight: product.weight});
    this.editForm.patchValue({editInputDescription: product.description});
    this.editForm.patchValue({editInputCategory: product.category});
  }
  updateProduct() {
    let data = {
      id: this.editForm.value.editInputId,
      name: this.editForm.value.editInputName,
      price: this.editForm.value.editInputPrice,
      weight: this.editForm.value.editInputWeight,
      description: this.editForm.value.editInputDescription,
      category: this.editForm.value.editInputCategory,
    };
    this.api.updateProduct(data).subscribe({
      next: (res) => {
        this.getProducts();
      },
      error: (err) => {
        console.log(err);
      }
    });

  }

  clearField() {
    this.productForm.patchValue({
        inputName: '', 
        inputPrice: '',
        inputWeight: '',
        inputDescription: '',
        inputCategory: ''
      });
  }

}
