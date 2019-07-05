import { Component, OnInit } from '@angular/core';
import { TopComponent } from '../top/top.component';
import { Contacts } from '../model/contacts.model';
import { ContactServices } from '../services/contacts.service';



@Component({
  selector: 'app-viewcontacts',
  templateUrl: './viewcontacts.component.html',
  styleUrls: ['./viewcontacts.component.scss']
})
export class ViewcontactsComponent implements OnInit {

  constructor(private leadservices:ContactServices) { }


  user:any;
  listeOfContacts:any;

  ngOnInit() {

  }

    getContacts(){

          this.leadservices.ShowContacts(this.user).subscribe((contacts:Contacts )=>{
          this.listeOfContacts = contacts.entry_list; 

          console.log(this.listeOfContacts);
              
      });
        

        

  }
  

}
