import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProfileService {
  constructor(private http: HttpClient) {}

  updateProfile(id: number, surname: string, lastname: string, country: string, city: string, address: string): Observable<any> {
    const endpoint = `updateprofile/${id}`;
    let url = environment.apihost + endpoint;

    const profileData = {
      surname: surname,
      lastname: lastname,
      country: country,
      city: city,
      address: address
    };
    
    const headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    });
    
    const httpOptions = {
      headers: headers
    };

    return this.http.put<any>(url, profileData, httpOptions);
  }
}















