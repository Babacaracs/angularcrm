import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { HttpErrorResponse } from '@angular/common/http';
import { Contacts } from '../model/contacts.model';
import { Authentifier } from '../model/login.model';
import{PHP_API_SERVER} from '../app.constants';



export class ContactServices{

  


  constructor(public http: HttpClient) { }

   
  ShowContacts(auth: Authentifier){
    return this.http.get<Contacts>(`${PHP_API_SERVER}/apiviewleads.php/?username=`+localStorage['username']+`&password=`+localStorage['password']);   
  }
  
   postContact(model){
        return this.http.post(`${PHP_API_SERVER}/apipostleads.php/?username=`+localStorage["username"]+`&password=`+localStorage["password"],model,{responseType:"text"})
  }

  //Nous devons modifier le prospect ainsi crée
  putContacts(model){
    return this.http.post(`${PHP_API_SERVER}/apipostleads.php/?username=`+localStorage["username"]+`&password=`+localStorage["password"],model,{responseType:"text"})
  }



  

  

}