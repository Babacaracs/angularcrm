import { BrowserModule } from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {NoopAnimationsModule} from '@angular/platform-browser/animations';
import {MatInputModule} from '@angular/material/input';
import {MatSidenavModule} from '@angular/material/sidenav';
import { TopComponent } from './top/top.component';
import {NgxPaginationModule} from 'ngx-pagination'; // <-- import the module






import { NgModule } from '@angular/core';

import { AppRoutingModule,routingComponent } from './app-routing.module';
import { AppComponent } from './app.component';
import { ContactsComponent } from './contacts/contacts.component';
import {FormsModule} from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AddcontactComponent } from './addcontact/addcontact.component';





//Material 

import { CustomMaterialModule } from './material/module.material';
import { ChangecontactComponent } from './changecontact/changecontact.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import {AccountsComponent} from "./accounts/accounts.component";





//les services 
import { Login } from './services/login.services';
import { AuthGard } from './services/authgards.services';
import {LeadServices} from './services/leads.services';
import { ContactService} from './services/contact.service';
import { AddcontactService} from './services/addcontact.service';


@NgModule({
  declarations: [
    AppComponent,
    routingComponent,
    SidebarComponent,
    TopComponent,
    AccountsComponent,
  ],
  imports: [
    NgxPaginationModule,
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    MatInputModule,
    MatSidenavModule,
    FormsModule,
    CustomMaterialModule,
    HttpClientModule
  ],
  providers: [Login,LeadServices,AuthGard,ContactService,AddcontactService],
  bootstrap: [AppComponent]
})
export class AppModule { }
