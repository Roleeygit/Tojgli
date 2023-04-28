import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProfileService {
  constructor(private http: HttpClient) {}

updateProfile(profile: any) {
  let id = profile.id;
  let endpoint = 'updateprofile';
  let url = environment.apihost + endpoint + "/" + id;
  let token = localStorage.getItem('token');    
  let headers = new HttpHeaders({
    'Content-Type': 'applicaton/json',
    'Authorization': 'Bearer ' + token
  });
  let httpOption = {
    headers: headers
  };
  return this.http.put(url, profile, httpOption);
  }
}
















