import React from "react";
import CoinGecko from '../../img/logoPartner/CoinGecko.png'
import Dogechain from '../../img/logoPartner/DogechainLogo.png'
import MkC from '../../img/logoPartner/MarketCap.png'


export default function Partnership(){
    return(
       <div className="form-partner">
         <h3 className="title-font ">PARTNERSHIP</h3>
         <div className="list-partner">
            <div className="list-pn-content">
                <img className="pn-logo" src={CoinGecko}></img>
                <h3 className="pn-name">CoinGecko</h3>
            </div>
            <div className="list-pn-content">
                <img className="pn-logo" src={Dogechain}></img>
                <h3 className="pn-name">DOGECHAIN</h3>
            </div>
            <div className="list-pn-content">
                <img className="pn-logo" src={MkC}></img>
                <h3 className="pn-name">CoinMarketCap</h3>
            </div>
         </div>
       </div>
    )
}
