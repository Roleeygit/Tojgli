import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable, OnInit } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ProfileService {

  constructor(private http: HttpClient) { }

  profile(surname: string, lastname: string, country: string, city: string, address: string) {
    let endpoint = "profile";
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
    return this.http.post<any>(url, profileData, httpOption);
  }
}
