import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  email !: string;
  password !: string;

  constructor(private auth: AuthService) { }

  ngOnInit(): void {
  }

  login() {
    console.log('login belül')
    let email = this.email;
    let password = this.password;
    this.auth.login(email, password)
    .subscribe(res => {
      console.log(res.token);
      console.log(res.email);
      localStorage.setItem('token', res.token);
      localStorage.setItem('email', res.email);      
    });
  }

}
