import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';

import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AddcontactService {

  PHP_API_SERVER = "http://127.0.0.1/angularcrm/backend/myapipost.php?username=";
  utilisateur:any;
  constructor(private httpClient:HttpClient) { }
 postcontact()
  {   console.log(this.utilisateur);
 return this.httpClient.post(`${this.PHP_API_SERVER}`+localStorage['username']+`&password=`+localStorage['password'],this.utilisateur,{responseType:"text"});
    
  }
}
