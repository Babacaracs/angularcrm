import { CanActivate, Router } from '@angular/router';
import { Injectable } from '@angular/core';
import {Login } from './login.services'

@Injectable()
export class AuthGard implements CanActivate{

    constructor(private loginService:Login, private router:Router){}

    canActivate(route: import("@angular/router").ActivatedRouteSnapshot, state: import("@angular/router").RouterStateSnapshot): boolean | import("@angular/router").UrlTree | import("rxjs").Observable<boolean | import("@angular/router").UrlTree> | Promise<boolean | import("@angular/router").UrlTree> {

        if(this.loginService.isAuth){
            return true;
        }
        else{

            this.router.navigate(['/']);

        }
        throw new Error("Method not implemented.");
    }

}