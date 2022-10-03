import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Router } from '@angular/router';
import { Item } from '../model/item.model';
import { Observable } from 'rxjs';
import { Gallary } from '../model/Gallary.model';
import { Event } from '../model/Event.model';
import { FormControl } from '@angular/forms';

@Injectable({ providedIn: 'any' })

export class apiServices {
    constructor(private http: HttpClient,
        private router:Router
        ) {}

        httpHeader = {
            headers: {
        "Content-Type": "application/json",
        "Access-Control-Allow-Origin": "*",
      }
    };   

    endPointURL:string = 'http://ec2-18-224-215-239.us-east-2.compute.amazonaws.com/carsandcoffe/api/v1/';
    
    
    getAllItem(): Observable<Item[]>{
        return this.http
        .get<Item[]> (
         this.endPointURL+'items' , this.httpHeader)
  }


  getLastItem(): Observable<Item[]>{
    return this.http
    .get<Item[]> (
     this.endPointURL+'items-last' , this.httpHeader)
}


getGallary(): Observable<Gallary[]>{
    return this.http
    .get<Gallary[]> (
     this.endPointURL+'gallary' , this.httpHeader)
}


getEvents(): Observable<Event[]>{
    return this.http
    .get<Event[]> (
     this.endPointURL+'events' , this.httpHeader)
}


sendEmail(name:FormControl,email:FormControl,msg:FormControl){
    const data = {
        "name":name.value,
        "email":email.value,
        "msg":msg.value
      }
      
      return  this.http
        .post(
            this.endPointURL+'sendmail',
          data,
          {responseType: 'text'});

          
}
}