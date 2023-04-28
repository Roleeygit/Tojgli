import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ProfileService } from '../shared/profile.service';
import { Router } from '@angular/router';

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
      editid: [''],
      editsurname: [''],
      editlastname: [''],
      editcountry: [''],
      editcity: [''],
      editaddress: ['']
    });
  }

  editProfile(profile: any) {
    this.profileForm.patchValue({
      editid: profile.id,
      editsurname: profile.surname,
      editlastname: profile.lastname,
      editcountry: profile.country,
      editcity: profile.city,
      editaddress: profile.address
    });    
  }

  updateProfile() {
    let data = {
      id: this.profileForm.value.editid,
      surname: this.profileForm.value.editsurname,
      lastname: this.profileForm.value.editlastname,
      country: this.profileForm.value.editcountry,
      city: this.profileForm.value.editcity,
      address: this.profileForm.value.editaddress
    };
    this.profile.updateProfile(data).subscribe({
      next: (res) => {
        console.log(res);
        this.router.navigate(['home']);
      },
      error: (err) => {
        console.log(err);
      }
    });
  
  }
  
}