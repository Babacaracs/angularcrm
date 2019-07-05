import { Component, OnInit } from '@angular/core';
import {Compte} from '../model/compte';
import {Email} from '../model/email';
import {CompteService} from '../services/compte.service';

@Component({
  selector: 'app-accounts',
  templateUrl: './accounts.component.html',
  styleUrls: ['./accounts.component.scss']
})
export class AccountsComponent implements OnInit {

  dataarray = [];
  comptes: Compte[];
  compte = new Compte();
  email1 = new Email();

  constructor( private apiService: CompteService) { }
  ngOnInit() {
     this.dataarray.push(this.email1);
  }

  saveCompte(form) {
    this.apiService.AddCompte(form.value)
      .subscribe(
        (res: Compte[]) => {
          // Update the list of cars
          this.comptes = res;
        },
      );
  }
  addForm() {
    this.email1 = new Email();
    this.dataarray.push(this.email1);
  }

  removeForm(index) {
    this.dataarray.splice(index);
  }


}
