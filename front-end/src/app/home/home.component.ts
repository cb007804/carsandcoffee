import { Component, OnInit } from '@angular/core';
import { FormControl, Validators } from '@angular/forms';
import { NgxSpinnerService } from 'ngx-spinner';
import { HeaderComponent } from '../header/header.component';
import { Item } from '../model/item.model';
import { apiServices } from '../services/apiService.service';
import { ToastrService } from 'ngx-toastr';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor(private apiService:apiServices,
    private toastr: ToastrService,
    private spinner: NgxSpinnerService,
    private headerCom:HeaderComponent) { }
    items:Item[]=[];
    cartItem:Item[]=[];
    name= new FormControl("",[Validators.required]);
    email= new FormControl("",[Validators.required]);
    msg= new FormControl("",[Validators.required]);

  ngOnInit(): void {
    this.spinner.show();
   
   this.cartItem = JSON.parse(localStorage.getItem('cartItem') || '[]');
  
    this.apiService.getLastItem().subscribe(
      res => {
        this.spinner.hide();
        this.items = res;
     
       
      }
    );
  }

  addCart(item:Item){
    
    this.headerCom.cartCount = parseInt(this.headerCom.cartCount)+1;
    localStorage.setItem('cartCount',this.headerCom.cartCount);
    this.cartItem.push(item);
    localStorage.setItem('cartItem', JSON.stringify(this.cartItem));
    
  }

  sendMail(){
    this.spinner.show();
    this.apiService.sendEmail(this.name ,this.email ,this.msg ).subscribe(
      res => {
        this.spinner.hide();
        this.toastr.success('Success', 'We got you email.');
        
       
      }
    );
  }
}
