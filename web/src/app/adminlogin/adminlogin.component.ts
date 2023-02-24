import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { AdminService } from '../shared/admin.service';

@Component({
  selector: 'app-login',
  templateUrl: './adminlogin.component.html',
  styleUrls: ['./adminlogin.component.scss']
})
export class AdminloginComponent implements OnInit {

  adminForm !: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private admin: AdminService
  ) { }

  ngOnInit(): void {
    this.adminForm = this.formBuilder.group({
      email: [''],
      username: [''],
      password: ['']
    });
  }

  login() {
    let email = this.adminForm.value.email
    let username = this.adminForm.value.username
    let password = this.adminForm.value.password

    this.admin.adminlogin(email, username, password)
    .subscribe({
      next: data => {
        console.log(data.token)
        console.log(data.email)
        console.log(data.username)
        localStorage.setItem('token', data.token)
        localStorage.setItem('email', data.email)
        localStorage.setItem('username', data.username)
      }
    });
  }
}