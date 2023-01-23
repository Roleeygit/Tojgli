import { Component } from '@angular/core';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent {

  username = '';
  password = '';
  email = '';

  register() {
    console.log(this.username, this.password, this.email);
  }
}