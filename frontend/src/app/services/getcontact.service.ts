import { Injectable } from '@angular/core';
import { Contacts } from './../contact/model/contact';
import { HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs';
import {PHP_API_SERVER} from '../app.constants';


@Injectable({
  providedIn: 'root'
})
export class GetcontactService {

  constructor(private httpClient:HttpClient) { }
  getcontact(id): Observable<Contacts>
  {  

   return this.httpClient.get<Contacts>(`${PHP_API_SERVER}/getcontact.php?username=`+localStorage['username']+`&password=`+localStorage['password']+`&id=`+id);
    
  }
}
