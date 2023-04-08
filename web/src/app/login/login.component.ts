import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { tap } from 'rxjs';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  errors: string[] = [];
  loginForm !: FormGroup;
  errorMessage!: string;
  
  constructor(
    private formBuilder: FormBuilder,
    private auth: AuthService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({  
      username: ['', [Validators.required]],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]]
    });
  }

  login() {
    let username = this.loginForm.value.username
    let email = this.loginForm.value.email  
    let password = this.loginForm.value.password

    this.auth.login(username, email, password)
    .pipe(
      tap(data => {
        localStorage.setItem('token', data.token)
        localStorage.setItem('username', data.name)
        localStorage.setItem('email', data.name)
    }))
    .subscribe({
      next: () => {
        this.router.navigate(['/profile']);
      },
      error: err => {
        const errorObj = err.error.data;
        this.errors = [];
        for (const field in errorObj) {
          if(errorObj.hasOwnProperty(field)) {
            const errorMessage = errorObj[field][0];
            this.errors.push(`${errorMessage}`);
          }
        }
      }
    });
  }
}