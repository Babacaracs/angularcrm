export class Leads{
	public field_name_map;
    // Stored fields
    public id : String;
    public date_entered: Date;
    public date_modified: Date;
    public modified_user_id: String;
    public assigned_user_id: String;
    public created_by: String;
    public created_by_name: String;
    public modified_by_name: String;
    public description: String;
    public salutation: String;
    public first_name: String;
    public last_name: String;
    public title : String;
    public department: String;
    public reports_to_id: String;
    public do_not_call :String;
    public phone_home : String;
    public phone_mobile : String;
    public phone_work : String;
    public phone_other: String;
    public phone_fax: String;
    public refered_by: String;
    public email1: String;
    public email2 : String;
    public primary_address_street : String;
    public primary_address_city : String;
    public primary_address_state : String;
    public primary_address_postalcode : String;
    public primary_address_country: String;
    public alt_address_street: String;
    public alt_address_city: String;
    public alt_address_state: String;
    public alt_address_postalcode: String;
    public alt_address_country: String;
    public name: String;
    public full_name: String;
    public portal_name: String;
    public portal_app: String;
    public contact_id: String;
    public contact_name: String;
    public account_id :String;
    public opportunity_id : String;
    public opportunity_name:String;
    public opportunity_amount:number;
    //used for vcard export only
    public birthdate:Date;
    public status:String;
    public status_description : String;

    public website:String;

    public lead_source:String;
    public lead_source_description:String;
    // These are for related fields
    public account_name:String;
    public acc_name_from_accounts:String;
    public account_site:String;
    public account_description:String;
    public case_role:String;
    public case_rel_id:String;
    public case_id:String;
    public task_id:String;
    public note_id:String;
    public meeting_id:String;
    public call_id:String;
    public email_id:String;
    public assigned_user_name:String;
    public campaign_id:String;
    public campaign_name:String;
    public alt_address_street_2:String;
    public alt_address_street_3:String;
    public primary_address_street_2:String;
    public primary_address_street_3:String;



	entry_list:any;
		
	constructor(
		
	){}
	

}