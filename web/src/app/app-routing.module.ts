import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { ProductlistComponent } from './productlist/productlist.component';
import { ProfileComponent } from './profile/profile.component';
import { RegisterComponent } from './register/register.component';
import { PagenotfoundComponent } from './pagenotfound/pagenotfound.component';
import { AdminmainComponent } from './adminmain/adminmain.component';
import { DatasheetComponent } from './datasheet/datasheet.component';
import { BasketComponent } from './basket/basket.component';

const routes: Routes = [
  {path: 'login', component: LoginComponent},
  {path: 'register', component: RegisterComponent},
  {path: 'profile', component: ProfileComponent},
  {path: 'products', component: ProductlistComponent},
  {path: 'admin', component: AdminmainComponent},
  {path: 'datasheet', component: DatasheetComponent},
  {path: 'basket', component: BasketComponent},
  {path: '', component: HomeComponent},
  {path: '**', component: PagenotfoundComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
