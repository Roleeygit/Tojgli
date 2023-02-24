import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AdminService {

  constructor(private http: HttpClient) { }

  adminlogin(email: string, username: string, password: string) {
    let endpoint = "adminlogin";
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

    let httpOptions = {
      headers: headers
    };

    return this.http.post<any>(url, userData, httpOptions);
  }

  checkAdmin(token: string) {
    let endpoint = "updateAdmin";
    let url = environment.apihost + endpoint;

    let headers = new HttpHeaders({
      "Content-Type": "application/json",
      "Accept": "application/json",
      "Authorization": "Bearer " + token
    });

    let httpOptions = {
      headers: headers
    };

    return this.http.get<any>(url, httpOptions);
  }

}
