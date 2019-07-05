import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ContactComponent } from './contact/contact.component';
import { ComptesComponent } from './comptes/comptes.component';
import { LeadsComponent } from './leads/leads.component';
import { FourOhFourComponent } from './four-oh-four/four-oh-four.component';
import { LoginComponent } from './login/login.component';
import { AuthGard } from './services/authgards.services';
import { ViewleadsComponent } from './viewleads/viewleads.component';
import { ViewcontactsComponent } from './viewcontacts/viewcontacts.component';
import { PrincipalComponent } from './principal/principal.component';
import {AccountsComponent} from "./accounts/accounts.component";
import { ChangecontactComponent } from './changecontact/changecontact.component';
import { AddcontactComponent } from './addcontact/addcontact.component';







const routes: Routes = [
  {path: '',  component: LoginComponent},
  {path: 'crm', component: PrincipalComponent},
  {path: 'contact', component: ContactComponent},
  {path: 'viewcontacts', component: ViewcontactsComponent},
  {path: 'comptes', component: ComptesComponent},	
  {path: 'leads', component: LeadsComponent},
  {path: 'leads/:id', component: LeadsComponent},
  {path: 'viewleads',  component: ViewleadsComponent},
  {path: 'compte', component: AccountsComponent},
  {path: 'contact/:id', component: ChangecontactComponent},
  {path: 'addcontact', component: AddcontactComponent},
  {path: 'not-found',  component: FourOhFourComponent},
  {path: '**', redirectTo: '/not-found'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

export const routingComponent=[PrincipalComponent,ViewcontactsComponent,ContactComponent,ComptesComponent,LeadsComponent,FourOhFourComponent,LoginComponent,ViewleadsComponent,ChangecontactComponent,AddcontactComponent]

