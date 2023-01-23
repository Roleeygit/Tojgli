import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatIconModule} from '@angular/material/icon';
import {MatCommonModule} from '@angular/material/core';
import { MatMenuModule } from '@angular/material/menu';
import { NgxUiLoaderModule } from "ngx-ui-loader";
import {AtomSpinnerModule} from 'angular-epic-spinners'

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { DatasheetComponent } from './datasheet/datasheet.component';
import { CopyrightComponent } from './copyright/copyright.component';
import { ProfileComponent } from './profile/profile.component';
import { AdminloginComponent } from './adminlogin/adminlogin.component';
import { AdminmainComponent } from './adminmain/adminmain.component';
import { NewproductComponent } from './newproduct/newproduct.component';
import { ProductlistComponent } from './productlist/productlist.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HomeComponent } from './home/home.component';
import { NgxUiLoaderHttpModule } from 'ngx-ui-loader';
import { LoaderComponent } from './loader/loader.component';
@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    DatasheetComponent,
    CopyrightComponent,
    ProfileComponent,
    AdminloginComponent,
    AdminmainComponent,
    NewproductComponent,
    ProductlistComponent,
    HomeComponent,
    LoaderComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatToolbarModule,
    MatIconModule,
    MatCommonModule,
    MatMenuModule,
    NgxUiLoaderHttpModule,
    NgxUiLoaderModule,
    AtomSpinnerModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
