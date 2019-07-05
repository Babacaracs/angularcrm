import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpErrorResponse } from '@angular/common/http';
import { Contacts } from '../addcontact/model/contacts.model'
import { AddcontactService } from './../services/addcontact.service';
import { TopComponent } from '../top/top.component';


@Component({
  selector: 'app-addcontact',
  templateUrl: './addcontact.component.html',
  styleUrls: ['./addcontact.component.scss']
})
export class AddcontactComponent implements OnInit {
  model = new Contacts(); 
  constructor(private addcontactService:AddcontactService,private httpService: HttpClient) { }

  ngOnInit() {
  }
  onSubmit(){
    this.addcontactService.utilisateur=this.model;
    this.addcontactService.postcontact().subscribe(()=>{
      // console.log("api retourne",this.photoService);
    
    //this.service_contact.my_contacts = this.contacts_telko;
    console.log(this.model);
  
  });
  }

}
