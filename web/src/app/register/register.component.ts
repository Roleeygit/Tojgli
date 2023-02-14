import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss'],
})
export class RegisterComponent implements OnInit {
  
  registerForm !: FormGroup;
  errorMessage!: string;
  
  constructor(
    private formBuilder: FormBuilder,
    private auth: AuthService
  ) { }

  ngOnInit(): void {
    this.registerForm = this.formBuilder.group({
      username: ['', [Validators.required]],
      email: [''],
      password: [''],
      confirm_password: ['']
    });
  }
  
  register() {
    let username = this.registerForm.value.username
    let email = this.registerForm.value.email
    let password = this.registerForm.value.password
    let confirm_password = this.registerForm.value.confirm_password

    this.auth.register(username, email, password, confirm_password)
    .subscribe({
      next: data => {
        console.log(data.token)
        console.log(data.username)
        console.log(data.email)
        localStorage.setItem('token', data.token)
        localStorage.setItem('username', data.name)
        localStorage.setItem('email', data.name)
      },
      error: err => {
        const errorObj = err.error.data;
        const errorMessage = errorObj.username[0];
        const errorDiv = document.getElementById('error-div');
        if (errorDiv) {
          errorDiv.textContent = errorMessage;
        }
      }
    });
  }
}