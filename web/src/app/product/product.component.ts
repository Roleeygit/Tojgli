import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { AuthService } from '../shared/auth.service';

styleUrls: ['./products.component.scss']
})
export class ProductComponent implements OnInit {

productForm !: FormGroup;
  constructor(
    private api: AuthService,
    private formBuilder: FormBuilder
    ) { }
ngOnInit(): void {
 this.productForm = this.formBuilder.group({
      inputName: [''],
      inputItemnumber: [''],
      inputQuantity: [''],
      inputPrice: ['']
    });
  }
  onClick() {
    this.addProducts();
  }
  addProducts() {
let data = {
      name: this.productForm.value.inputName,
      itemnumber: this.productForm.value.inputItemnumber,
      quantity: this.productForm.value.inputQuantity,
      price: this.productForm.value.inputPrice
    };
    this.clearField();
    this.api.addProducts(data)
.subscribe({
 next: (data:any) => {
        console.log('vissza: ' + data)
      },
 console.log('Hiba! A termék felévtele sikertelen!')
      }
}clearField() {
    throw new Error('Method not implemented.');
  }
);
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

function clearField() {
  throw new Error('Function not implemented.');
}
