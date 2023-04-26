import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';
import { Router } from '@angular/router';
import { ApiService } from '../shared/api.service';

@Component({
  selector: 'app-productlist',
  templateUrl: './productlist.component.html',
  styleUrls: ['./productlist.component.scss']
})
export class ProductlistComponent implements OnInit {

  products: any = [];

  constructor(
    private auth: AuthService,
    private router: Router,
    private api: ApiService) { }

  ngOnInit() { }

  logout() {
    this.auth.logout().subscribe({
      next: (res) => {
        console.log(res);
        this.router.navigate(['/login']);
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  getProducts() {
    this.api.getProducts().subscribe({
      next: (products: any) => {        
        this.products = products;
      },
      error: (err) => {
        console.log(err);
      }
    });
  }
}