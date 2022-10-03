import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  constructor() { }

  cartCount:any;
  ngOnInit(): void {
    

    if(localStorage.getItem('cartCount')==null){
      this.cartCount = 0;
    }else{
      this.cartCount = localStorage.getItem('cartCount');
    }
  }

}
