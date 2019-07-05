import { Component, OnInit } from '@angular/core';
import {Compte} from '../model/compte';
import {CompteService} from '../allservices/compte.service';
import * as $ from 'jquery';

@Component({
  selector: 'app-accounts',
  templateUrl: './accounts.component.html',
  styleUrls: ['./accounts.component.scss']
})
export class AccountsComponent implements OnInit {

  dataarray = [];
  comptes: Compte[];
  compte = new Compte();

  constructor( private apiService: CompteService) { }
  ngOnInit() {
    this.dataarray.push(this.compte);
  }

  saveCompte(form) {
    this.apiService.AddCompte(this.compte)
      .subscribe(
        (res: Compte) => {
          // Update the list of cars
          this.compte = res;
        },
      );
    console.log(this.compte);
  }
  addForm() {
    this.compte = new Compte();
    this.dataarray.push(this.compte);
  }

  removeForm(index) {
    this.dataarray.splice(index);
  }


}
