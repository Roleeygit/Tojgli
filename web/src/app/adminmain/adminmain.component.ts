import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/api.service';

@Component({
  selector: 'app-adminmain',
  templateUrl: './adminmain.component.html',
  styleUrls: ['./adminmain.component.scss']
})
export class AdminmainComponent implements OnInit {

  users: any = [];

  constructor(private api: ApiService) { }

  ngOnInit() {
    this.getUsers();
  }

  getUsers() {
    this.api.getUsers().subscribe({
      next: (response: any) => {
        this.users = response.data;
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

}
