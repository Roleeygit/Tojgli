import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { map } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  constructor(private http: HttpClient) { }

  private loggedIn = false;
  loggedInUser: any;

  login(username_or_email: string, password: string) {
    let endpoint = "login";
    let url = environment.apihost + endpoint;

    let userData = {
      username_or_email: username_or_email,
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
    return this.http.post<any>(url, userData, httpOption).pipe(
      map(response => {
        if (response.success) {
          this.loggedInUser = response.user;
        }
        return response;
      })
    );
  }

  isLoggedIn():any {
    if(localStorage.getItem('token') === null) {
      return false;
    }
    let token = localStorage.getItem('token');
    return token;
  }

  logout() {
    let endpoint = 'logout';
    let url = environment.apihost + endpoint;
    let token = localStorage.getItem('token');
    localStorage.removeItem('token');
    let headers = new HttpHeaders({
      "Content-Type": "application/json",
      "Authorization": "Bearer " + token
    });
    
    let httpOption = {
      headers: headers
    };
    return this.http.post(url, "", httpOption);
  }
  
}
