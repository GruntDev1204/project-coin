import React from "react";
import { Link } from "react-router-dom";

export default function Thanhmenu(){
    return (
        <div className="thanh-menu">
            <ul>
                <Link to="/home"><li>Introduce</li> </Link>
                <Link to="/home/Rmap"><li>Roadmap</li></Link>
                <Link to="/home/Tokenomic"><li>Tokenomic</li></Link>
                <Link to="/home/Team"><li>About Team</li></Link>
                <Link to="/home/Partnership"><li>Partnership</li></Link>
            </ul>
        </div>
    )
}