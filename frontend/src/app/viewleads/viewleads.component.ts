import { Component, OnInit } from '@angular/core';
import { TopComponent } from '../top/top.component';
import { Leads } from '../model/leads.model';
import { LeadServices } from '../services/leads.services';






@Component({
  selector: 'app-viewleads',
  templateUrl: './viewleads.component.html',
  styleUrls: ['./viewleads.component.scss']
})
export class ViewleadsComponent implements OnInit {

  constructor(private leadservices:LeadServices) { }

  user:any;
  listeOfLeads:any; 
  

  ngOnInit() {

      this.getlead();
  
  }

  getlead(){

              this.leadservices.Show(this.user).subscribe((leads:Leads )=>{
              this.listeOfLeads = leads.entry_list;         
        });

  }


  

}

