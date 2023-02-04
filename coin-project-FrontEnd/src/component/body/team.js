import React from "react";
import Trung from '../../img/member/trung.png'
import Member1 from '../../img/member/1.png'



export default function TeamMember(){
   return(
     <div className="form-Member">
        <h3 className="title-member">SNOPE DOGE MEMBERS</h3>
        <div className="content-member">
            <div className="member">
                 <img className="logo-list" src={Trung}></img>
                 <p className="name-member">Ho Trung</p>
                 <p className="des-member">Full Stack Dev</p>
            </div>
            <div className="member">
                 <img className="logo-list" src={Member1}></img>
                 <p className="name-member">Huan Vo</p>
                 <p className="des-member">Lam gi lam</p>
            </div>
            <div className="member">
                 <img className="logo-list" src={Member1}></img>
                 <p className="name-member">Ho Trung</p>
                 <p className="des-member">Full Stack Dev</p>
            </div>
            <div className="member">
                 <img className="logo-list" src={Member1}></img>
                 <p className="name-member">Ho Trung</p>
                 <p className="des-member">Full Stack Dev</p>
            </div>
            <div className="member">
                 <img className="logo-list" src={Member1}></img>
                 <p className="name-member">Ho Trung</p>
                 <p className="des-member">Full Stack Dev</p>
            </div>
        </div>
     </div>
   )
}