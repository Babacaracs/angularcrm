import { Component, OnInit, Input } from '@angular/core';
import {LoginComponent} from '../login/login.component';
import { AppRoutingModule,routingComponent } from '../app-routing.module';
import { Login } from '../services/login.services';



@Component({
  selector: 'app-top',
  templateUrl: './top.component.html',
  styleUrls: ['./top.component.scss']
})
export class TopComponent implements OnInit {

  whoisconnected :any;

  constructor(private login_service:Login) { }


  ngOnInit() {

    this.whoisconnected = localStorage["username"];
    
    
    
  }

}
