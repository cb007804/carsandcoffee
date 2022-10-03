import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { Event } from '../model/Event.model';
import { apiServices } from '../services/apiService.service';

@Component({
  selector: 'app-event',
  templateUrl: './event.component.html',
  styleUrls: ['./event.component.css']
})
export class EventComponent implements OnInit {

  constructor(private apiService:apiServices,
    private spinner: NgxSpinnerService) { }
    events:Event[]=[];

  ngOnInit(): void {
    this.spinner.show();
  
     this.apiService.getEvents().subscribe(
       res => {
         this.spinner.hide();
         this.events = res;
      
        
       }
     );
  }
}
