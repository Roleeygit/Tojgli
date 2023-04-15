import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  [x: string]: any;
  constructor(private http: HttpClient) { }

  login(username: string, email: string, password: string) {
    let endpoint = "login";
    let url = environment.apihost + endpoint;

    let userData = {
      username: username,
      email: email,
      password: password
    };
    let headers = new HttpHeaders({
      "Content-Type": "application/json",
      "Accept": "application/json"
    });
    let httpOption = {
      headers: headers
    };
    return this.http.post<any>(url, userData, httpOption);
  }

  register(username: string, email: string, password: string, confirm_password: string) {
    const formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('confirm_password', confirm_password);

    let endpoint = "register";
    let url = environment.apihost + endpoint;

    let userData = {
      username: username,
      email: email,
      password: password,
      confirm_password: confirm_password
    };
    let headers = new HttpHeaders({
      "Content-Type": "application/json",
      "Accept": "application/json"
    });
    let httpOption = {
      headers: headers
    };
    return this.http.post<any>(url, userData, httpOption);
  }

  checkUsername(username: string) {
    let endpoint = `register/${username}`;
    let url = environment.apihost + endpoint;
  
    let headers = new HttpHeaders({
      "Content-Type": "application/json",
      "Accept": "application/json"
    });
    let httpOption = {
      headers: headers
    };
    return this.http.get<any>(url, httpOption);
  }

  isLoggedIn():any {
    if(localStorage.getItem('token') === null) {
      return false;
    }
    let token = localStorage.getItem('token');
    return token;
  }
}
