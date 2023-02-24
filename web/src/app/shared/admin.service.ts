import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AdminService {

  constructor(private http: HttpClient) { 
  }
  
  adminlogin(email: string, username: string, password: string, ) {
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
}

