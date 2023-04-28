import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-datasheet',
  templateUrl: './datasheet.component.html',
  styleUrls: ['./datasheet.component.scss']
})
export class DatasheetComponent implements OnInit {

  constructor(
    private auth: AuthService,
    private router: Router,) { }

  ngOnInit(): void {
  }

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
