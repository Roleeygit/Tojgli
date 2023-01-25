import { Component } from '@angular/core';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent {

  username !: string;
  password !: string;
  confirm_password !: string;
  email !: string;

  constructor(private auth: AuthService) { }

  ngOnInit(): void {
  }
  
  register() {
    let username = this.username;
    let email = this.email;
    let password = this.password;
    let confirm_password = this.confirm_password;
    this.auth.register(username, email, password, confirm_password)
    .subscribe(res => {
      localStorage.setItem('token', res.token);
      localStorage.setItem('email', res.email);
      localStorage.setItem('username', res.username);
      localStorage.setItem('password', res.password);
      localStorage.setItem('confirm_password', res.confirm_password);       
    });
  }
}