import React from "react";
import { Link } from "react-router-dom";

export default function Welcome(){
    return(
        <div className="welcome-form">
             <h3 className="welcome-large">Welcome! </h3>
            <p className="welcome-sm"> <span>We are premier platform for secure and </span> <span> transactions in the world of cryptocurrency.</span></p>
             <Link to="/home"><button className="tiep-tuc"><i className="fas fa-play"></i> Start For Free</button> </Link>
        </div>
    )
}
