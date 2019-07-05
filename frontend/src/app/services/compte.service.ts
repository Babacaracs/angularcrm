import { Injectable } from '@angular/core';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {Compte} from '../model/compte';
import {Observable, throwError} from 'rxjs';
import { map, catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class CompteService {
  PHP_API_SERVER = 'http://localhost/angularcrm/backend/post.php';
  comptes: Compte[];


  constructor( private http: HttpClient) { }
  AddCompte(compte: Compte): Observable<Compte[]> {
    return this.http.post(`${this.PHP_API_SERVER}`, { data: compte })
      .pipe(map((res) => {
          this.comptes.push(res['data']);
          return this.comptes;
        }),
        catchError(this.handleError));
  }
  private handleError(error: HttpErrorResponse) {
    console.log(error);
    return throwError('Error! something went wrong.');
  }
}
