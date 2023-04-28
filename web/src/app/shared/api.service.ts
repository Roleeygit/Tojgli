import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private http: HttpClient) { }

  addProduct(data: any) {
    let endpoint = 'submit-product';
    let url = environment.apihost + endpoint;

    let token = localStorage.getItem('token');

    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });

    let httpOption = {
      headers: headers
    };
    return this.http.post<any>(url, data, httpOption);
  }

  updateProduct(product: any) {
    let id = product.id;
    let endpoint = 'updateproduct';
    let url = environment.apihost + endpoint + "/" + id;
    let token = localStorage.getItem('token');    
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.put(url, product, httpOption);
  }

  deleteProduct(id: number) {
    let endpoint = 'deleteproduct';
    let url = environment.apihost + endpoint + "/" + id;
    let token = localStorage.getItem('token');    
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.delete<any>(url, httpOption);
  }

  deleteUser(id: number) {
    let endpoint = 'deleteuser';
    let url = environment.apihost + endpoint + "/" + id;
    let token = localStorage.getItem('token');    
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.delete<any>(url, httpOption);
  }

  deleteProfile(id: number) {
    let endpoint = 'deleteprofile';
    let url = environment.apihost + endpoint + "/" + id;
    let token = localStorage.getItem('token');    
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.delete<any>(url, httpOption);
  }

  getProducts() {
    let endpoint = 'productlist';
    let url = environment.apihost + endpoint;
    return this.http.get<any>(url);
  }

  getUsers() {
    let endpoint = 'registeredusers';
    let url = environment.apihost + endpoint;
    return this.http.get<any>(url);
  }

  getProfiles() {
    let endpoint = 'profilelist';
    let url = environment.apihost + endpoint;
    return this.http.get<any>(url);
  }

}
