import React from "react";
import { Link } from "react-router-dom";

export default function Welcome(){
    return(
        <div className="welcome-form">
             <p>Welcome cc</p>
             <Link to="/home"><li>Introduce</li> </Link>
        </div>
    )
}