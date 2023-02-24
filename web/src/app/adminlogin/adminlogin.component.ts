import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-adminlogin',
  templateUrl: './adminlogin.component.html',
  styleUrls: ['./adminlogin.component.scss']
})
export class AdminloginComponent implements OnInit {
login() {
throw new Error('Method not implemented.');
}
  AdminloginForm!: FormGroup;
  submitted = false;
email: any;
username: any;
password: any;

  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private router: Router
  ) { }

  ngOnInit() {
    this.AdminloginForm = this.formBuilder.group({
      username: ['', Validators.required],
      email: ['',Validators.required],
      password: ['', Validators.required]
    });
  }

  get formControls() { return this.AdminloginForm.controls; }

  onSubmit() {
    this.submitted = true;

    if (this.AdminloginForm.invalid) {
      return;
    }

    this.authService.login(this.formControls['username'].value,this.formControls['email'].value, this.formControls['password'].value)
      .subscribe(
        data => {
          if (data.role === 'admin') {
            this.router.navigate(['/admin']);
          } else {
            this.router.navigate(['/']);
          }
        },
        error => {
          console.log(error);
        }
      );
  }
}
