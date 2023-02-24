import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AdminService } from '../shared/admin.service';

@Component({
  selector: 'app-login',
  templateUrl: './adminlogin.component.html',
  styleUrls: ['./adminlogin.component.scss']
})
export class AdminloginComponent implements OnInit {

  adminForm !: FormGroup;
  is_admin = false;

  constructor(
    private formBuilder: FormBuilder,
    private admin: AdminService
  ) { }

  ngOnInit(): void {
    this.adminForm = this.formBuilder.group({
      email: ['', Validators.required],
      username: ['', Validators.required],
      password: ['', Validators.required]
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

          
          this.admin.checkAdmin(data.email)
            .subscribe((response: any) => {
              if (response.is_admin) {
                console.log("Sikertelen belépés!")
              } else {
            
                this.is_admin= true;
                console.log("Sikeres belépés!")
              }
            });
        }
      });
  }

}
