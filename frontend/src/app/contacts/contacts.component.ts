import { Component, OnInit } from '@angular/core';
import {Contacts} from '../model/contacts.model';
import { HttpClient } from '@angular/common/http';
import { HttpErrorResponse } from '@angular/common/http';
import { TopComponent } from '../top/top.component';





@Component({
  selector: 'app-contacts',
  templateUrl: './contacts.component.html',
  styleUrls: ['./contacts.component.scss']
})
export class ContactsComponent implements OnInit {

  model = new Contacts(); 

 
  


  constructor (private httpService: HttpClient) { }


  //La requete sur les donnée urls provenants du back récupère l'url du service
  ngOnInit() {

    
  }
   
  onSubmit(){
      
    
  
  }

}
