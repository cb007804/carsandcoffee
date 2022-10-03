import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { HeaderComponent } from '../header/header.component';
import { Item } from '../model/item.model';
import { apiServices } from '../services/apiService.service';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {

  constructor(private apiService:apiServices,
              private spinner: NgxSpinnerService,
              private headerCom:HeaderComponent) { }
  items:Item[]=[];
  cartItem:Item[]=[];

  ngOnInit(): void {
    this.spinner.show();
   
   this.cartItem = JSON.parse(localStorage.getItem('cartItem') || '[]');
   console.log(this.cartItem);
    this.apiService.getAllItem().subscribe(
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

}
