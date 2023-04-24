import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { tap } from 'rxjs';
import { AuthService } from '../shared/auth.service';
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
    private formBuilder: FormBuilder
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
}