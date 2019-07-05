import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { HttpErrorResponse } from '@angular/common/http';
import { Leads } from '../model/leads.model';
import { Authentifier } from '../model/login.model';
import{PHP_API_SERVER} from '../app.constants';



export class LeadServices{

  


  constructor(public http: HttpClient) { }

   
  Show(auth: Authentifier){
    return this.http.get<Leads>(`${PHP_API_SERVER}/apiviewleads.php/?username=`+localStorage['username']+`&password=`+localStorage['password']);   
  }
  
   Ajout(model){
        return this.http.post(`${PHP_API_SERVER}/apipostleads.php/?username=`+localStorage["username"]+`&password=`+localStorage["password"],model,{responseType:"text"})
  }

  
  getById(id:String){
    return this.http.get<Leads>(`${PHP_API_SERVER}/api_entrylead.php/?username=`+localStorage['username']+`&password=`+localStorage['password']+`&id=`+id);   
  }


  Edit(id,model){
    return this.http.put(`${PHP_API_SERVER}/apiputleads.php/?username=`+localStorage["username"]+`&password=`+localStorage["password"]+`&id=`+id,model,{responseType:"text"})
}

  
  

}