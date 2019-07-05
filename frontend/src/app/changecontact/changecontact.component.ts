import { GetcontactService } from './../services/getcontact.service';
import { Component, OnInit } from '@angular/core';
import { Contacts } from '../contact/model/contact';
import { ActivatedRoute } from '@angular/router';



@Component({
  selector: 'app-changecontact',
  templateUrl: './changecontact.component.html',
  styleUrls: ['./changecontact.component.scss']
})
export class ChangecontactComponent implements OnInit {
  public id: string;
  contact: any;
  constructor(private getcontactservice:GetcontactService,private route: ActivatedRoute) { }

  ngOnInit() {
    
    this.id = this.route.snapshot.paramMap.get('id');
     // console.log("marche",form);
     this.getcontactservice.getcontact(this.id).subscribe((contact: Contacts)=>{
      // console.log("api retourne",this.photoService);
      this.contact = contact["entry_list"];
          // this.photoService.utilisateur=this.users["value"];
      console.log(contact);
      
      
    });
  }

}
