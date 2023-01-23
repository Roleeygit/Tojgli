import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  host = "http://localhost:8000/api/";
  constructor(private http: HttpClient) { }

  login(email: string, password: string) {
    let userData = {
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
    let url = this.host + endpoint;
    return this.http.post<any>(url, userDataJson, httpOption);
  }

}