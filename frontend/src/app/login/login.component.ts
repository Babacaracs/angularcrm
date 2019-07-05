import { Component,Input, OnInit, Injectable } from '@angular/core';
import {Login} from '../services/login.services'
import { Router } from '@angular/router';
import { Authentifier } from '../model/login.model';
import { Observable } from  'rxjs';





@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})

@Injectable({
  providedIn: 'root'
})

export class LoginComponent implements OnInit {

  

  
  
  authstatus:boolean;



  model = new Authentifier();


  user = this.model;

 

  constructor(private login_service:Login,private router:Router) { }

  
  ngOnInit() {

    this.authstatus = this.login_service.isAuth;

    this.login_service.user = this.user;

    
    

   // this.user = this.model;

        
  }

  Authentificated(form){
    
    if(this.user && this.user.username){
            this.model.username = this.user.username;
            this.login_service.AuthentificateUser(form.value).subscribe((model: Authentifier)=>{
                console.log("authentification réussi");

                localStorage['username'] = this.user["username"];
                localStorage['password'] = this.user["password"];
            

                        //Redirection vers les pages de navigation
                        this.login_service.signIn().then(
                          ()=>{
                            
                            console.log(this.user);
                            
                            this.authstatus = this.login_service.isAuth;
                            this.router.navigate(['crm']);
                          }
                      )
                      
                
            });
    }




      
  }


  



}
