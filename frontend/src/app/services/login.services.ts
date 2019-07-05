import { Observable } from 'rxjs';
import { Authentifier } from '../model/login.model';
import { HttpClient } from '@angular/common/http';
import { HttpErrorResponse } from '@angular/common/http';
import {PHP_API_SERVER} from '../app.constants';

export class Login{

   isAuth= false;

   user :any;
   

   

   constructor(private httpService: HttpClient) { }

  
  AuthentificateUser(auth: Authentifier){

    

    return this.httpService.get<Authentifier>(`${PHP_API_SERVER}/apiviewleads.php/?username=`+auth.username+`&password=`+auth.password);   
  }


    signIn() {
        return new Promise(
          (resolve, reject) => {
            setTimeout(
              () => {
                this.isAuth = true;
                resolve(true);
              }, 2000
            );
          }
        );
      }
    
      signOut() {
        this.isAuth = false;
      }
    
   

	

}
