import { ContactService } from './../services/contact.service';
import { Contacts } from './model/contact';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css']
})
export class ContactComponent implements OnInit {
  p: number = 1;
  contact: any;
  contactlist = new Contacts();
  constructor(private contactService: ContactService,private router: Router) { }

  ngOnInit() {
    // this.getContact();
   this.getContact();
  }

  getContact(){
      // this.photoService.getphoto(form).subscribe((user: User)=>{
    //   this.user = user;
    //   console.log(this.user);
    // })
    
             //form.value= this.selectedUser.username;
       // console.log("marche",form);
        this.contactService.getcontact().subscribe((contact: Contacts)=>{
          // console.log("api retourne",this.photoService);
          
          this.contact = contact["entry_list"];
          // this.photoService.utilisateur=this.users["value"];
          console.log(contact);
          
          
        });
      }
   
   
}
