import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  email !: string;
  username !: string;
  password !: string;

  constructor(private auth: AuthService) { }

  ngOnInit(): void {
  }

  login() {
    console.log('login belül')
    let email = this.email;
    let username = this.username;
    let password = this.password;
    this.auth.login(email, password, username)
    .subscribe(res => {
      localStorage.setItem('token', res.token);
      localStorage.setItem('email', res.email);      
      localStorage.setItem('username', res.username);      
    });
  }

}
