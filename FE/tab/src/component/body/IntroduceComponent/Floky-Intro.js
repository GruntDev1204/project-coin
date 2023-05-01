import React from "react";
import Logo from "../../../img/dogelogo.png"
import Logo1 from "../../../img/2.png"
import Logo2 from "../../../img/3.png"
import Logo4 from "../../../img/4.png"


export default function Floky(){
    return(
        <div className="the-floKy">
        <div className="title sm"><p>THE FLOKI SYSSTEM</p></div>
        <div className="floky-body">
           <div className="object-floky">
              <div  className="logo-list"><img  src={Logo}></img></div>
               <p className="tieu-de">SNOPEDOGE</p>
               <p className="chu-thich">deo biec</p>
           </div>
           <div className="object-floky">
              <div  className="logo-list"><img  src={Logo1}></img></div>
               <p className="tieu-de">FLOKIPLACE</p>
               <p className="chu-thich">deo biec</p>
           </div>
           <div className="object-floky">
               <div  className="logo-list"><img  src={Logo2}></img></div>
               <p className="tieu-de">FLOKIFI</p>
               <p className="chu-thich">deo biec</p>
           </div>
           <div className="object-floky">
              <div  className="logo-list"><img  src={Logo4}></img></div>
               <p className="tieu-de">DEFI</p>
               <p className="chu-thich">deo biec</p>
           </div>
        </div>
   </div>
    )
}