import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { Contacts } from './../contact/model/contact';
import { Observable } from 'rxjs';
import {PHP_API_SERVER} from '../app.constants';
@Injectable({
  providedIn: 'root'
})
export class ContactService {

  constructor(private httpClient:HttpClient) { }
  getcontact(): Observable<Contacts>
  {  
    console.log()
   return this.httpClient.get<Contacts>(`${PHP_API_SERVER}/api.php?username=`+localStorage['username']+`&password=`+localStorage['password']);
    
  }
 
}
