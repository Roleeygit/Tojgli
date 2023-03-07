import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { tap } from 'rxjs';
import { ProfileService } from '../shared/profile.service';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {

  profileForm !: FormGroup;
  errorMessage!: string;

  constructor(
    private formBuilder: FormBuilder,
    private profile: ProfileService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.profileForm = this.formBuilder.group({
      surname: [''],
      lastname: [''],
      country: [''],
      city: [''],
      address: ['']
    });
  }

  profileSave() {
    let surname = this.profileForm.value.surname
    let lastname = this.profileForm.value.lastname
    let country = this.profileForm.value.country
    let city = this.profileForm.value.city
    let address = this.profileForm.value.address

    this.profile.profile(surname, lastname, country, city, address)
    .pipe(
      tap(data => {
        console.log(data.token)
        console.log(data.surname)
        console.log(data.lastname)
        console.log(data.country)
        console.log(data.city)
        console.log(data.address)
        localStorage.setItem('token', data.token)
        localStorage.setItem('surname', data.surname)
        localStorage.setItem('lastname', data.lastname)
        localStorage.setItem('country', data.country)
        localStorage.setItem('city', data.city)
        localStorage.setItem('address', data.address)
    }))
    .subscribe({
      next: () => {
        this.router.navigate(['home']);
      },
      error: err => {
        const errorObj = err.error.data;
        
        const errorDiv = document.getElementById('error-div');
        if (errorDiv) {
          errorDiv.textContent = '';
          for (const field in errorObj) {
            if(errorObj.hasOwnProperty(field)) {
              const errorMessage = errorObj[field][0];
              errorDiv.textContent += "* " + field + ": " + errorMessage + "\n";
            }
          }
        }
      }
    });
  }
}