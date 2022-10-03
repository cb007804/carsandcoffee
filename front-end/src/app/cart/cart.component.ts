import { Component, OnInit } from '@angular/core';
import { Item } from '../model/item.model';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor() { }
  cartItem:Item[]=[];
  

  ngOnInit(): void {
    this.cartItem = JSON.parse(localStorage.getItem('cartItem') || '[]');
  }

}
