import { Component, OnInit } from '@angular/core';
import { TopComponent } from '../top/top.component';
import { Login } from '../services/login.services';
import { Leads } from '../model/leads.model';
import {LeadServices} from '../services/leads.services';
import { ActivatedRoute, Router } from '@angular/router';



@Component({
  selector: 'app-leads',
  templateUrl: './leads.component.html',
  styleUrls: ['./leads.component.scss']
})
export class LeadsComponent implements OnInit {

  model = new Leads(); 

  public id: string;

  constructor(private router: Router, private route: ActivatedRoute,private addleads:LeadServices) { }

  data:any;

  ngOnInit() {

    this.id = this.route.snapshot.paramMap.get('id');
    
        
        if(this.onEmplacement()==='Edit'){

            this.onEntry();
          
        }

    
  }
  
  onAjouter(){

        this.addleads.Ajout(this.model).subscribe(()=>{
            console.log(this.model);
      });

  }
  onModifier(){

          this.addleads.Edit(this.id,this.model).subscribe((Leads)=>{
            console.log("Modifié avec succes",this.model);
      });

     

     


  }


  onEntry(){
    
      this.addleads.getById(this.id).subscribe((Leads)=>{
          this.data = Leads.entry_list[0].name_value_list;

          //On remplit les donnée du formulaire
          this.model.salutation=this.data.salutation.value;
          this.model.first_name = this.data.first_name.value;
          this.model.last_name = this.data.last_name.value;
          this.model.opportunity_amount = this.data.opportunity_amount.value;
          this.model.phone_fax = this.data.phone_fax.value;
          this.model.phone_mobile = this.data.phone_mobile.value;
          this.model.phone_work = this.data.phone_work.value;
          this.model.department = this.data.department.value;
          this.model.description= this.data.description.value;
          this.model.lead_source = this.data.lead_source.value;
          this.model.status = this.data.status.value;
          this.model.lead_source_description = this.data.lead_source_description.value;
          this.model.opportunity_name = this.data.opportunity_name.value;
          this.model.phone_home = this.data.phone_home.value;
          this.model.phone_other = this.data.phone_other.value;
          this.model.refered_by = this.data.refered_by.value;
          this.model.title = this.data.title.value;
          this.model.account_name = this.data.account_name.value;
          this.model.status_description= this.data.status_description.value;
          this.model.website = this.data.website.value;
          
            
      });
  }

  onEmplacement(){

    if(this.router.url==='/leads'){
      return "Ajout";
    }
    else if(this.router.url!='/leads'){
      return "Edit";
    }


}

  onChoiceAction(){

        if(this.onEmplacement()==='Edit'){

            this.onModifier();

        }
        else if(this.onEmplacement()==='Ajout'){

             this.onAjouter();


        }


  }
  



 
}

