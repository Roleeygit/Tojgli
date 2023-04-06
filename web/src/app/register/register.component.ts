import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { tap } from 'rxjs';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss'],
})
export class RegisterComponent implements OnInit {

  errors: string[] = [];
  registerForm !: FormGroup;
  errorMessage!: string;
  
  constructor(
    private formBuilder: FormBuilder,
    private auth: AuthService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.registerForm = this.formBuilder.group({
      username: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
      confirm_password: ['', Validators.required],
    });
  }
  
  register() {
    let username = this.registerForm.value.username
    let email = this.registerForm.value.email
    let password = this.registerForm.value.password
    let confirm_password = this.registerForm.value.confirm_password

    this.auth.register(username, email, password, confirm_password)
    .pipe(
      tap(data => {
        localStorage.setItem('token', data.token)
        localStorage.setItem('username', data.name)
        localStorage.setItem('email', data.name)
    }))
    .subscribe({
      next: () => {
        this.router.navigate(['login']);
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
