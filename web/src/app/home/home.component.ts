import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  googlemaps = "https://www.google.com/maps/place/Erzs%C3%A9bet,+F%C5%91+u.+65,+7661/@46.0992651,18.4558574,17z/data=!4m6!3m5!1s0x4742c7d9ae0b8a81:0x16eeeb28bd9078da!8m2!3d46.0992614!4d18.4580461!16s%2Fg%2F11gm_gz68g";
  isLoggedIn = false;

  constructor(
    private auth: AuthService,
    private router: Router,) { }

  ngOnInit() { 
    this.isLoggedIn = this.auth.isLoggedIn();
  }

  logout() {
    this.auth.logout().subscribe({
      next: (res) => {
        console.log(res);
        localStorage.removeItem('isLoggedIn');
        this.isLoggedIn = false;
        this.router.navigate(['/login']);
      },
      error: (err) => {
        console.log(err);
      }
    });
  }
}
