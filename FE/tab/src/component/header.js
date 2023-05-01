import Logo from "../img/dogelogo.png"
import React, { useEffect } from "react";
import { useState, useRef } from "react";
import { Link, Outlet } from "react-router-dom";
import axios from 'axios';


export default function Header(){
    const[allLink , setLink] = useState([])
    const ShowLink = () => {
        axios
            .get('http://sndg.local/api/Sndg/link')
            .then((res)=> {
                setLink(res.data.dataLink)
            })
    }
    useEffect(()=>{
        ShowLink()
    },[])
    return (
        <>
            <div className="header-left">
                <p className="logo-team">SNOPE DOGE</p>
                {allLink.map((key)=>(
                    <ul className="list-header" key={key.id}>
                        <a target={'_blank'} href={key.Swaps}>
                            <li>
                            <i className="fa-solid fa-link"></i> Swaps
                            </li>
                        </a>
                        <a target={'_blank'} href={key.Contract}>
                            <li>
                            <i className="fa-solid fa-phone"></i> Contract Us
                            </li>
                        </a>
                        <a target={'_blank'} href={key.Market}>
                            <li>
                            <i className="fa-solid fa-store"></i> MarketPlace
                            </li>
                        </a>
                    </ul>
                ))}

            </div>
            <div className="header-right">
                <div className="logo"><img  src={Logo}></img></div>
                <div className="info-header">
                    <Link to="/home"> <p className="title">Snope Doge Team</p></Link>
                    <p>SNDG</p>
                </div>
            </div>
            </>

    )
}
