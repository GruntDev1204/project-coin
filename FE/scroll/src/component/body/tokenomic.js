import React from "react";
import Chart from "./configToken";

export default function Tokenomic(){
    return(
        <div className="token-area">
            <h3 className="title-font">Tokenomics</h3>
            <div className="chart-container">
                <Chart/>
            </div>
        </div>

    )
}
