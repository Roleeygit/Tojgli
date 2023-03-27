import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable, OnInit } from '@angular/core';
import { environment } from 'src/environments/environment';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class ProfileService {

  constructor(private http: HttpClient, private auth: AuthService) { }

  profile(surname: string, lastname: string, country: string, city: string, address: string) {
    let endpoint = "updateprofile/{id}";
    let url = environment.apihost + endpoint;

    let profileData = {
      surname: surname,
      lastname: lastname,
      country: country,
      city: city,
      address: address
    };
    let headers = new HttpHeaders({
      "Content-Type": "application/json",
      "Accept": "application/json"    
    });
    let httpOption = {
      headers: headers
    };
    return this.http.put<any>(url, profileData, httpOption);
  }
}
