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
  isLoggedIn = false;

  constructor(
    private auth: AuthService,
    private router: Router,
    private api: ApiService) { }

  ngOnInit() { 
    this.isLoggedIn = this.auth.isLoggedIn();
  }

  logout() {
    this.auth.logout().subscribe({
      next: (res) => {
        console.log(res);
        localStorage.removeItem('isLoggedIn');
        this.isLoggedIn = false;
        this.router.navigate(['/login']);
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
  
}