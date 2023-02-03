import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  constructor(private http: HttpClient) { }

  login(email: string, password: string, username: string) {
    let userData = {
      username: username,
      email: email,
      password: password
    }
    let userDataJson = JSON.stringify(userData);
    let header = new HttpHeaders({
      'Content-Type': 'application/json'
    });
    let httpOption = {
      headers: header
    };
    let endpoint = 'login';
    let url = environment.apihost + endpoint;
    return this.http.post<any>(url, userDataJson, httpOption);
  }

  register(username: string, email: string, password: string, confirm_password: string) {
    let userData = {
      username: username,
      email: email,
      password: password,
      confirm_password: confirm_password,
    }
    let userDataJson = JSON.stringify(userData);
    let header = new HttpHeaders({
      'Content-Type': 'application/json'
    });
    let httpOption = {
      headers: header
    };
    let endpoint = 'register';
    let url = environment.apihost + endpoint;
    return this.http.post<any>(url, userDataJson, httpOption);
  }

}