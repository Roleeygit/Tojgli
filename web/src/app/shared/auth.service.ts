import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  host = "http://localhost:8000/api/";
  constructor(private http: HttpClient) { }

  login() {
    
  }
}
