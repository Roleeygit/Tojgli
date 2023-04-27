import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  constructor(
    private auth: AuthService,
    private router: Router,) { }

  ngOnInit() { }

  logout() {
    this.auth.logout().subscribe({
      next: (res) => {
        console.log(res);
        this.router.navigate(['/login']);
      },
      error: (err) => {
        console.log(err);
      }
    });
  }
}
