import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { HeaderComponent } from '../header/header.component';
import { Gallary } from '../model/Gallary.model';
import { apiServices } from '../services/apiService.service';

@Component({
  selector: 'app-gallary',
  templateUrl: './gallary.component.html',
  styleUrls: ['./gallary.component.css']
})
export class GallaryComponent implements OnInit {

  constructor(private apiService:apiServices,
    private spinner: NgxSpinnerService,
    private headerCom:HeaderComponent) { }
    gallary:Gallary[]=[];

  ngOnInit(): void {
    this.spinner.show();
  
     this.apiService.getGallary().subscribe(
       res => {
         this.spinner.hide();
         this.gallary = res;
      
        
       }
     );
  }

}
